<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for handling image-related operations for products.
 * This includes processing, storing, resizing, and deleting images.
 */
class ImageService
{
    /**
     * Process and store images for a product.
     * Uploads, resizes, and stores multiple images for a given product.
     * Also creates ProductImage records for each uploaded image.
     *
     * @param array $images Array of UploadedFile objects representing the images.
     * @param int $productId The ID of the product these images belong to.
     * @param string $description The description of the product for alt text.
     * @return array Array of uploaded image details including paths and URLs.
     */
    public function processAndStoreImages(array $images, int $productId, string $description): array
    {
        $uploadedImages = [];
        foreach ($images as $imageFile) {
            $timestamp = time();
            $paths = $this->storeImage($imageFile, $timestamp);

            ProductImage::create([
                'product_id' => $productId,
                'image_path' => $paths['original'],
                'resized_image_path' => $paths['resized'],
                'show_image_path' => $paths['show'],
                'thumbnail_image_path' => $paths['thumbnail'],
                'alt_text' => $description,
            ]);

            $uploadedImages[] = $this->generateImageUrls($paths);
        }
        return $uploadedImages;
    }

    /**
     * Store an individual image and return its paths for various sizes.
     * Uploads the original image and generates resized versions for different use cases.
     *
     * @param UploadedFile $imageFile The image file to be stored.
     * @param int $timestamp A timestamp for generating unique file names.
     * @return array Array containing paths to the original and resized images.
     */
    private function storeImage(UploadedFile $imageFile, int $timestamp): array
    {
        // Store the original image
        $originalFilename = 'product_' . $timestamp . '_original.webp';
        $imageFile->storeAs('product_images', $originalFilename, 'public');
        $originalImagePath = 'product_images/' . $originalFilename;

        // Resize the image for different sizes
        $sizes = ['resized', 'show', 'thumbnail'];
        $paths = ['original' => $originalImagePath];

        foreach ($sizes as $size) {
            $sizeSpecificPaths = $this->resizeImage($originalImagePath, $size, $timestamp);
            $paths[$size] = $sizeSpecificPaths['size_specific'];
        }

        return $paths;
    }

    /**
     * Generate filenames for different image sizes based on a timestamp.
     * Creates unique filenames for an original image and its resized versions.
     *
     * @param int $timestamp A timestamp for generating unique filenames.
     * @return array Array containing filenames for the original and resized images.
     */
    private function generateFilenames(int $timestamp): array
    {
        return [
            'original' => 'product_' . $timestamp . '_original.webp',
            'resized' => 'product_' . $timestamp . '_resized.webp',
            'show' => 'product_' . $timestamp . '_show.webp',
            'thumbnail' => 'product_' . $timestamp . '_thumbnail.webp',
        ];
    }

    /**
     * Generate URLs for stored images based on their file paths.
     * Converts local storage paths to publicly accessible URLs.
     *
     * @param array $paths An array containing file paths of the images.
     * @return array Array containing URLs for the original and resized images.
     */
    private function generateImageUrls(array $paths): array
    {
        return [
            'original_path' => $paths['original'],
            'resized_path' => $paths['resized'],
            'show_path' => $paths['show'],
            'thumbnail_path' => $paths['thumbnail'],
            'original_url' => asset('storage/' . $paths['original']),
            'resized_url' => asset('storage/' . $paths['resized']),
            'thumbnail_url' => asset('storage/' . $paths['thumbnail']),
            'show_url' => asset('storage/' . $paths['show']),
        ];
    }

    /**
     * Resize an image based on a specified size label.
     * Processes an image file to create a resized version as per the size label.
     *
     * @param string $filePath Path to the original image file.
     * @param string $sizeLabel Label indicating the size type (e.g., 'thumbnail').
     * @param int $timestamp A timestamp for generating unique filenames.
     * @return array Array containing the original and resized image paths.
     * @throws \Exception If an invalid size label is provided.
     */
    private function resizeImage(string $filePath, string $sizeLabel, int $timestamp): array
    {
        $baseDirectory = storage_path('app/public/product_images/');
        $originalFilename = 'product_' . $timestamp . '_original.webp';
        $originalImagePath = $baseDirectory . $originalFilename;

        $sizeSpecificFilename = 'product_' . $timestamp . '_' . $sizeLabel . '.webp';
        $sizeSpecificImagePath = $baseDirectory . $sizeSpecificFilename;

        // Determine which Node.js script to use based on the size label
        switch ($sizeLabel) {
            case 'resized':
                $nodeScript = base_path('resources/js/imageProcessor.js');
                break;
            case 'show':
                $nodeScript = base_path('resources/js/imageProcessorShow.js');
                break;
            case 'thumbnail':
                $nodeScript = base_path('resources/js/imageProcessorThumbnail.js');
                break;
            default:
                throw new \Exception("Invalid size label for image processing");
        }

        // Execute the Node.js script for image processing
        $nodeCommand = "node " . escapeshellarg($nodeScript) . " " .
            escapeshellarg($originalImagePath) . " " .
            escapeshellarg($sizeSpecificImagePath);
        exec($nodeCommand);

        return [
            'original' => 'product_images/' . $originalFilename,
            'size_specific' => 'product_images/' . $sizeSpecificFilename,
        ];
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
    }
}
