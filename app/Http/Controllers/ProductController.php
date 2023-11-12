<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    public function show(Product $product)
    {
        return view("products.show", compact("product"));
    }

    public function create()
    {
        return view('products.create');
    }

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
                $imagePath = $imageFile->store('product_images', 'public');

                $productImage = ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                    'alt_text' => $validatedData['description'],
                ]);

                $uploadedImages[] = [
                    'path' => $imagePath,
                    'url'  => asset('storage/' . $imagePath),
                ];
            }
        }
        return response()->json([
            'message' => 'Product created successfully.',
            'product_id' => $product->id,
            'uploaded_images' => $uploadedImages,
        ]);
    }

    public function edit(Product $product)
    {
        if (auth()->id() !== $product->artisan_id) {
            abort(403);
        }

        return view('products.edit', compact('product'));
    }

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
                    $imagePath = $imageFile->store('product_images', 'public');

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                        'alt_text' => $product->name,
                    ]);
                }
            }
        }

        return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
    }

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
}
