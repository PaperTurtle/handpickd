<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ImageService;
use App\Services\ProductQueryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * ProductController handles operations related to products and their images,
 * including listing, displaying, creating, updating, and deleting.
 */
class ProductController extends Controller
{
    const MAX_IMAGES = 4; // Maximum number of images allowed per product

    /**
     * @var ImageService
     */
    protected ImageService $imageService;

    /**
     * @var ProductQueryService
     */
    protected ProductQueryService $productQueryService;
    /**
     * ProductController constructor.
     *
     * @param ImageService $imageService Service for handling image-related operations.
     */
    public function __construct(ImageService $imageService, ProductQueryService $productQueryService)
    {
        $this->imageService = $imageService;
        $this->productQueryService = $productQueryService;
    }

    /**
     * Display a listing of all products.
     * This method retrieves all products from the database and passes them to the products index view.
     *
     * @param Request $request The request object containing the fetched product data.
     * @return Factory|View Returns a view with a list of all products.
     */
    public function index(Request $request): Factory|View
    {
        $searchTerm = $request->query('search', '');
        $selectedCategories = is_array($request->query('categories', [])) ? $request->query('categories', []) : [$request->query('categories', [])];
        $sort = $request->query('sort');

        $products = Product::query();
        $products = $this->productQueryService->applySearch($products, $searchTerm);
        $products = $this->productQueryService->applyCategoryFilter($products, $selectedCategories);
        $products = $this->productQueryService->applySorting($products, $sort);

        return view("products.index", ['products' => $products->get()]);
    }

    /**
     * Display a specific product.
     * This method returns the view for displaying detailed information about a specific product.
     *
     * @param Product $product The product instance to display.
     * @return Factory|View Returns a view with the specified product details.
     */
    public function show(Product $product): Factory|View
    {
        $product->load(['reviews' => function ($query) {
            $query->orderBy('created_at', 'desc')->with('user.profile');
        }]);


        return view('products.show', [
            'product' => $product,
            'averageRating' => $product->averageRating(),
            'totalReviews' => $product->totalReviews(),
        ]);
    }

    /**
     * Show the form for creating a new product.
     * This method returns the view for creating a new product.
     *
     * @return Factory|View Returns a view for creating a new product.
     * @throws AuthorizationException
     */
    public function create(): Factory|View
    {
        $this->authorize('create', Product::class);
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     * This method validates and stores a new product in the database, along with its images.
     * It returns a JSON response with the result of the operation.
     *
     * @param StoreProductRequest $request The request object containing product data.
     * @return RedirectResponse Returns JSON response with the status of product creation.
     * @throws AuthorizationException
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->authorize('create', Product::class);

        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        $this->imageService->processAndStoreImages($product, $request->file('images'), $validatedData['name']);

        return redirect()->route('products.show', $product->id)->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing an existing product.
     * This method returns the view for editing an existing product if the authenticated user is authorized.
     *
     * @param Product $product The product instance to edit.
     * @return Factory|View Returns a view for editing the specified product.
     * @throws AuthorizationException
     */
    public function edit(Product $product): Factory|View
    {
        $this->authorize('edit', $product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     * This method validates and updates the given product in the database.
     * It returns a redirect response to the updated product's page.
     *
     * @param UpdateProductRequest $request The request object containing updated product data.
     * @param Product $product The product instance to update.
     * @return RedirectResponse Returns a redirect response to the product's detail page.
     * @throws AuthorizationException
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $this->authorize('update', $product);

        $validatedData = $request->validated();
        $product->update($validatedData);

        if ($request->hasFile('images')) {
            $currentImageCount = $product->images()->count();
            $allowedNewImages = ProductController::MAX_IMAGES - $currentImageCount;

            if ($allowedNewImages > 0) {
                $images = array_slice($request->file('images'), 0, $allowedNewImages);
                $this->imageService->processAndStoreImages($product, $images, $validatedData['description']);
            }
        }
        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from the database.
     *
     * @param Product $product The product instance to delete.
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Remove the specified image from a product.
     * This method deletes a specified product image if the authenticated user is authorized.
     * It returns a JSON response with the result of the deletion operation.
     *
     * @param Product $product The product owning the image.
     * @param ProductImage $productImage The product image to be deleted.
     * @return JsonResponse Returns JSON response with the status of image deletion.
     * @throws AuthorizationException
     */
    public function destroyImage(Product $product, ProductImage $productImage): JsonResponse
    {
        $this->authorize('deleteImage', [$product, $productImage]);

        $this->imageService->deleteImage($productImage);

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully.'
        ]);
    }

    /**
     * Retrieve and display the top three rated products.
     * This method fetches the top three products based on their average ratings.
     *
     * @return Factory|View Returns a view with the top three rated products.
     */
    public function topRatedProducts(): Factory|View
    {
        $topRatedProducts = Product::with('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->get();

        return view('welcome', ['topRatedProducts' => $topRatedProducts]);
    }
}
