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
        // Cache key
        $cacheKey = 'products_index';

        // Cache duration in minutes
        $cacheDuration = 60;

        $products = Cache::remember($cacheKey, $cacheDuration, function () {
            return Product::with('category')->get();
        });
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
     * @param StoreProductRequest $request The request object containing product data.
     * @return JsonResponse Returns JSON response with the status of product creation.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $this->authorize('create', Product::class);

        $validatedData = $request->validated();

        DB::beginTransaction();

        try {
            $product = Product::create($validatedData);

            if ($request->hasFile('images')) {
                $uploadedImages = $this->imageService->processAndStoreImages(
                    $request->file('images'),
                    $product->id,
                    $validatedData['description']
                );
            }

            $this->clearProductCache();

            DB::commit();

            return response()->json([
                'message' => 'Product created successfully.',
                'product_id' => $product->id,
                'uploaded_images' => $uploadedImages,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred while creating the product.'], 500);
        }
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
     * @param Request $request The request object containing updated product data.
     * @param Product $product The product instance to update.
     * @return RedirectResponse Returns a redirect response to the product's detail page.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        // $this->authorize('update', $product);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|between:0,999999.99',
            'images' => 'sometimes|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $product->update($validatedData);
        if ($request->hasFile('images')) {

            $currentImageCount = $product->images()->count();
            $allowedNewImages = 3 - $currentImageCount;
            if ($allowedNewImages > 0) {
                $images = array_slice($request->file('images'), 0, $allowedNewImages);

                foreach ($images as $imageFile) {
                    $timestamp = time();
                    $originalFilename = 'product_' . $timestamp . '_original.webp';
                    $originalImagePath = 'product_images/' . $originalFilename;

                    $resizedFilename = 'product_' . $timestamp . '_resized.webp';
                    $resizedImagePath = 'product_images/' . $resizedFilename;

                    $showFilename = 'product_' . $timestamp . '_show.webp';
                    $showImagePath = 'product_images/' . $showFilename;

                    $thumbnailFilename = 'product_' . $timestamp . '_thumbnail.webp';
                    $thumbnailImagePath = 'product_images/' . $thumbnailFilename;

                    $imageFile->storeAs('product_images', $originalFilename, 'public');

                    $nodeCommand = "node " . escapeshellarg(base_path('resources/js/imageProcessor.js')) . " " .
                        escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                        escapeshellarg(storage_path('app/public/' . $resizedImagePath));

                    exec($nodeCommand);

                    $nodeCommandForShow = "node " . escapeshellarg(base_path('resources/js/imageProcessorShow.js')) . " " .
                        escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                        escapeshellarg(storage_path('app/public/' . $showImagePath));
                    exec($nodeCommandForShow);

                    $nodeCommandForThumbnail = "node " . escapeshellarg(base_path('resources/js/imageProcessorThumbnail.js')) . " " .
                        escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                        escapeshellarg(storage_path('app/public/' . $thumbnailImagePath));
                    exec($nodeCommandForThumbnail);

                    ProductImage::updateOrCreate(
                        ['product_id' => $product->id, 'image_path' => $originalImagePath],
                        [
                            'resized_image_path' => $resizedImagePath, 'alt_text' => $validatedData['description'],
                            'thumbnail_image_path' => $thumbnailImagePath,
                            'show_image_path' => $showImagePath,
                        ]
                    );
                }
            }
            return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
        }
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

        $this->clearProductCache();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully.'
        ]);
    }

    /**
     * Clears the products cache.
     * 
     * @return void
     */
    private function clearProductCache(): void
    {
        Cache::forget('products_index');
    }
}
