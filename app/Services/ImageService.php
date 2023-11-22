<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for handling image-related operations for products.
 * This includes processing, storing, resizing, and deleting images.
 */
class ImageService
{
    public function processAndStoreImages(Product $product, array $images, $name)
    {
        foreach ($images as $imageFile) {
            $this->storeImage($product, $imageFile, $name);
        }
    }

    private function storeImage(Product $product, UploadedFile $imageFile, $name)
    {
        $timestamp = time();
        $originalFilename = 'product_' . $timestamp . '_original.webp';
        $originalImagePath = 'product_images/' . $originalFilename;

        $resizedFilename = 'product_' . $timestamp . '_resized.webp';
        $resizedImagePath = 'product_images/' . $resizedFilename;

        $showFilename = 'product_' . $timestamp . '_show.webp';
        $showImagePath = 'product_images/' . $showFilename;

        $thumbnailFilename = 'product_' . $timestamp . '_thumbnail.webp';
        $thumbnailImagePath = 'product_images/' . $thumbnailFilename;

        // Save the original image
        $imageFile->storeAs('product_images', $originalFilename, 'public');

        // Process images (resizing, thumbnail creation, etc.)
        $this->processImage($originalImagePath, $resizedImagePath, 'imageProcessor.js');
        $this->processImage($originalImagePath, $showImagePath, 'imageProcessorShow.js');
        $this->processImage($originalImagePath, $thumbnailImagePath, 'imageProcessorThumbnail.js');

        // Create or update the ProductImage record
        ProductImage::updateOrCreate(
            [
                'product_id' => $product->id,
                'image_path' => $originalImagePath
            ],
            [
                'resized_image_path' => $resizedImagePath,
                'show_image_path' => $showImagePath,
                'thumbnail_image_path' => $thumbnailImagePath,
                'alt_text' => $name,
            ]
        );
    }

    private function processImage($sourcePath, $destinationPath, $processorScript)
    {
        $nodeCommand = "node " . escapeshellarg(base_path('resources/js/' . $processorScript)) . " " .
            escapeshellarg(storage_path('app/public/' . $sourcePath)) . " " .
            escapeshellarg(storage_path('app/public/' . $destinationPath));

        exec($nodeCommand);
    }

    /**
     * Delete a product image from storage.
     * Removes the image file and its resized versions from the storage.
     *
     * @param ProductImage $productImage The ProductImage instance to delete.
     * @return void
     */
    public function deleteImage(ProductImage $productImage): void
    {
        Storage::delete($productImage->image_path);
        Storage::delete($productImage->resized_image_path);
        Storage::delete($productImage->show_image_path);
        Storage::delete($productImage->thumbnail_image_path);
        $productImage->delete();
    }
}
