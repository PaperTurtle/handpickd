<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * ImageService is a service class responsible for handling image-related operations for products.
 * It provides functionalities for processing, storing, resizing, and deleting images associated with a product.
 */
class ImageService
{

    /**
     * Process and store multiple images for a given product.
     * Iterates through each image file, processes, and stores them in the specified location.
     *
     * @param Product $product The product to associate the images with.
     * @param array $images An array of UploadedFile objects representing the images.
     * @param string $name The name used for alternative text in images.
     * @return void
     */
    public function processAndStoreImages(Product $product, array $images, $name)
    {
        foreach ($images as $imageFile) {
            $this->storeImage($product, $imageFile, $name);
        }
    }

    /**
     * Store an individual image associated with a product.
     * Processes the image and creates various versions (original, resized, show, thumbnail).
     * Updates or creates a ProductImage record with the image paths.
     *
     * @param Product $product The product to associate the image with.
     * @param UploadedFile $imageFile The image file to be processed and stored.
     * @param string $name The name used for alternative text in images.
     * @return void
     */
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

    /**
     * Process an image using a specified processor script.
     * Applies a node.js script to perform operations like resizing on the image.
     *
     * @param string $sourcePath Path of the source image.
     * @param string $destinationPath Path to store the processed image.
     * @param string $processorScript The script used to process the image.
     * @return void
     */
    private function processImage($sourcePath, $destinationPath, $processorScript)
    {
        $nodeCommand = "node " . escapeshellarg(base_path('resources/js/' . $processorScript)) . " " .
            escapeshellarg(storage_path('app/public/' . $sourcePath)) . " " .
            escapeshellarg(storage_path('app/public/' . $destinationPath));

        exec($nodeCommand);
    }

    /**
     * Delete a product image from storage.
     * Removes the image file and its resized versions from the storage and deletes the corresponding ProductImage record.
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
