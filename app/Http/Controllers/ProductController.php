<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * ProductController handles operations related to products and their images,
 * including listing, displaying, creating, updating, and deleting.
 */
class ProductController extends Controller
{
    const MAX_IMAGES = 3; // Maximum number of images allowed per product

    /**
     * @var ImageService
     */
    protected $imageService;

    /**
     * ProductController constructor.
     * 
     * @param ImageService $imageService Service for handling image-related operations.
     */
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of all products.
     * This method retrieves all products from the database and passes them to the products index view.
     *
     * @return Factory|View Returns a view with a list of all products.
     */
    public function index(): Factory|View
    {
        $products = Product::all();

        return view("products.index", compact("products"));
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
        $product->load('reviews.user');

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
     */
    public function create(): Factory|View
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     * This method validates and stores a new product in the database, along with its images.
     * It returns a JSON response with the result of the operation.
     *
     * @param Request $request The request object containing product data.
     * @return RedirectResponse Returns JSON response with the status of product creation.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $product = Product::create($validatedData);

        if ($request->hasFile('images')) {
            $this->imageService->processAndStoreImages($product, $request->file('images'), $validatedData['name']);
        }
        return redirect()->route('products.show', $product->id)->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing an existing product.
     * This method returns the view for editing an existing product if the authenticated user is authorized.
     *
     * @param Product $product The product instance to edit.
     * @return Factory|View Returns a view for editing the specified product.
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
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
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
     * Remove the specified image from a product.
     * This method deletes a specified product image if the authenticated user is authorized.
     * It returns a JSON response with the result of the deletion operation.
     *
     * @param Product $product The product owning the image.
     * @param ProductImage $productImage The product image to be deleted.
     * @return JsonResponse Returns JSON response with the status of image deletion.
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
}
