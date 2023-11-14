<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * The ProductController controller handles listing, showing, creating, updating, and deleting products and their images.
 */
class ProductController extends Controller
{

    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    /**
     * Display a specific product.
     *
     * @param Product $product Product instance to display.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view("products.show", compact("product"));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     *
     * @param Request $request The request object containing product data.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
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
                $resizedFilename = 'product_' . $timestamp . '_resized.webp';
                $originalImagePath = 'product_images/' . $originalFilename;
                $resizedImagePath = 'product_images/' . $resizedFilename;

                // Save original image
                $imageFile->storeAs('product_images', $originalFilename, 'public');

                $nodeCommand = "node C:\Users\Seweryn\OneDrive\Desktop\handpickd\resources\js\imageProcessor.js " . escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " . escapeshellarg(storage_path('app/public/' . $resizedImagePath));
                exec($nodeCommand);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $originalImagePath,
                    'resized_image_path' => $resizedImagePath,
                    'alt_text' => $validatedData['description'],
                ]);

                $uploadedImages[] = [
                    'original_path' => $originalImagePath,
                    'resized_path' => $resizedImagePath,
                    'original_url' => asset('storage/' . $originalImagePath),
                    'resized_url' => asset('storage/' . $resizedImagePath),
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
     *
     * @param Product $product Product instance to edit.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        if (auth()->id() !== $product->artisan_id) {
            abort(403);
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     *
     * @param Request $request The request object containing updated product data.
     * @param Product $product Product instance to update.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
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
                    $resizedFilename = 'product_' . $timestamp . '_resized.webp';
                    $originalImagePath = 'product_images/' . $originalFilename;
                    $resizedImagePath = 'product_images/' . $resizedFilename;

                    $imageFile->storeAs('product_images', $originalFilename, 'public');

                    $nodeScriptPath = base_path('resources/js/imageProcessor.js');

                    $nodeCommand = "node " . escapeshellarg($nodeScriptPath) . " " .
                        escapeshellarg(storage_path('app/public/product_images/' . $originalFilename)) . " " .
                        escapeshellarg(storage_path('app/public/' . $resizedImagePath));

                    exec($nodeCommand);

                    ProductImage::updateOrCreate(
                        ['product_id' => $product->id, 'image_path' => $originalImagePath],
                        ['resized_image_path' => $resizedImagePath, 'alt_text' => $validatedData['description']]
                    );
                }
            }
        }

        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified image from the product.
     *
     * @param Product $product The product owning the image.
     * @param ProductImage $productImage The product image to be deleted.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyImage(Product $product, ProductImage $productImage)
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
     * Clean up orphaned images that are not linked to any products in the storage folder
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function cleanOrphanedImages()
    {
        // Get all image paths from storage
        $allImagePaths = Storage::disk('public')->files('product_images');

        // Get all image paths from the database (both original and resized)
        $dbImagePaths = ProductImage::pluck('image_path')->toArray();
        $dbResizedImagePaths = ProductImage::pluck('resized_image_path')->toArray();

        // Merge the two arrays and remove duplicates
        $allDbImagePaths = array_unique(array_merge($dbImagePaths, $dbResizedImagePaths));

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
