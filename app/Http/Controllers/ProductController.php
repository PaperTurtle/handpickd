<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

/**
 * ProductController handles operations related to products and their images,
 * including listing, displaying, creating, updating, and deleting.
 */
class ProductController extends Controller
{

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
        $product = Product::with('reviews.user')->find($product->id);
        $averageRating = $product->reviews->avg('rating');
        $totalReviews = $product->reviews->count();

        return view('products.show', compact('product', 'averageRating', 'totalReviews'));
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
     * @return JsonResponse Returns JSON response with the status of product creation.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'artisan_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|between:0,999999.99',
            'quantity' => 'required|integer|min:0',
            'images' => 'sometimes|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $product = Product::create($validatedData);
        $uploadedImages = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $timestamp = time();
                $originalFilename = 'product_' . $timestamp . '_original.webp';
                $originalImagePath = 'product_images/' . $originalFilename;

                $resizedFilename = 'product_' . $timestamp . '_resized.webp';
                $resizedImagePath = 'product_images/' . $resizedFilename;

                $showFilename = 'product_' . $timestamp . '_show.webp';
                $showImagePath = 'product_images/' . $showFilename;

                $thumbnailFilename = 'product_' . $timestamp . '_thumbnail.webp';
                $thumbnailImagePath = 'product_images/' . $thumbnailFilename;

                // Save original image
                $imageFile->storeAs('product_images', $originalFilename, 'public');

                // Resize for general view
                $nodeCommand = "node " . escapeshellarg(base_path('resources/js/imageProcessor.js')) . " " .
                    escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                    escapeshellarg(storage_path('app/public/' . $resizedImagePath)); // 255
                exec($nodeCommand);

                // Resize for show view
                $nodeCommandForShow = "node " . escapeshellarg(base_path('resources/js/imageProcessorShow.js')) . " " .
                    escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                    escapeshellarg(storage_path('app/public/' . $showImagePath));
                exec($nodeCommandForShow);

                $nodeCommandForThumbnail = "node " . escapeshellarg(base_path('resources/js/imageProcessorThumbnail.js')) . " " .
                    escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                    escapeshellarg(storage_path('app/public/' . $thumbnailImagePath));
                exec($nodeCommandForThumbnail);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $originalImagePath,
                    'resized_image_path' => $resizedImagePath,
                    'show_image_path' => $showImagePath,
                    'thumbnail_image_path' => $thumbnailImagePath,
                    'alt_text' => $validatedData['description'],
                ]);

                $uploadedImages[] = [
                    'original_path' => $originalImagePath,
                    'resized_path' => $resizedImagePath,
                    'show_path' => $showImagePath,
                    'thumbnail_path' => $thumbnailImagePath,
                    'original_url' => asset('storage/' . $originalImagePath),
                    'resized_url' => asset('storage/' . $resizedImagePath),
                    'thumbnail_url' => asset('storage/' . $thumbnailImagePath),
                    'show_url' => asset('storage/' . $showImagePath),
                ];
            }
        }
        return response()->json([
            'message' => 'Product created successfully.',
            'product_id' => $product->id,
            'uploaded_images' => $uploadedImages,
        ]);
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
        if (auth()->id() !== $product->artisan_id) {
            abort(403);
        }

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
        if (auth()->id() !== $product->artisan_id) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|between:0,999999.99',
            'images' => 'sometimes|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // Update product details
        $product->update($validatedData);

        // Handle image uploads
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
        if ($productImage->product_id !== $product->id) {
            abort(403, 'Unauthorized action.');
        }

        Storage::delete($productImage->image_path);

        $productImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image deleted successfully.'
        ]);
    }

    /**
     * Clean up orphaned images that are not linked to any products.
     * This method removes images from storage that are not associated with any product in the database.
     * It returns a JSON response with the result of the cleanup operation.
     *
     * @return JsonResponse Returns JSON response with the status of the cleanup operation.
     */
    public function cleanOrphanedImages(): JsonResponse
    {
        // Get all image paths from storage
        $allImagePaths = Storage::disk('public')->files('product_images');

        // Get all image paths from the database (both original and resized)
        $dbImagePaths = ProductImage::pluck('image_path')->toArray();
        $dbResizedImagePaths = ProductImage::pluck('resized_image_path')->toArray();
        $dbShowImagePaths = ProductImage::pluck('show_image_path')->toArray();
        $dbThumbnailImagePaths = ProductImage::pluck('thumbnail_image_path')->toArray();

        // Merge the two arrays and remove duplicates
        $allDbImagePaths = array_unique(array_merge($dbImagePaths, $dbResizedImagePaths, $dbShowImagePaths, $dbThumbnailImagePaths));

        // Calculate the orphaned images by diffing storage and database paths
        $orphanedImages = array_diff($allImagePaths, $allDbImagePaths);

        // Delete orphaned images from storage
        foreach ($orphanedImages as $orphanedImage) {
            Storage::disk('public')->delete($orphanedImage);
        }

        return response()->json([
            'message' => 'Orphaned images cleaned successfully.',
            'orphaned_images_count' => count($orphanedImages),
        ]);
    }
}
