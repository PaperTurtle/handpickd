<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * A Laravel console command to process product images and create resized and show versions.
 *
 * This command processes original product images stored in the 'public/product_images' directory.
 * It creates resized and show versions of the images based on predefined Node.js scripts.
 * The command is designed to maintain different versions of product images for various use cases.
 *
 * Usage: Run the command using the Laravel Artisan command line tool.
 * Command: `php artisan images:ppi (process-product-images)`.
 */
class ProcessProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:ppi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process product images to create resized and show versions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $originalImages = Storage::disk('public')->files('product_images');

        foreach ($originalImages as $imagePath) {
            if (str_ends_with($imagePath, '_original.webp')) {
                $this->info("Processing $imagePath");

                $resizedPath = str_replace('_original', '_resized', $imagePath);
                $showPath = str_replace('_original', '_show', $imagePath);
                $thumbnailPath = str_replace('_original', '_thumbnail', $imagePath);

                $this->processImage($imagePath, $resizedPath);
                $this->processImage($imagePath, $showPath, 'show');
                $this->processImage($imagePath, $thumbnailPath, 'thumbnail');
            }
        }

        $this->info('All images processed successfully.');
    }

    /**
     * Process an image using a Node.js script to create resized or show versions.
     *
     * @param string $sourcePath The source image file path.
     * @param string $targetPath The target image file path to store the processed image.
     * @param string $type The type of processing to apply (default, show, or thumbnail).
     * @return void
     */
    protected function processImage($sourcePath, $targetPath, $type = 'default')
    {
        switch ($type) {
            case 'show':
                $nodeScript = 'imageProcessorShow.js';
                break;
            case 'thumbnail':
                $nodeScript = 'imageProcessorThumbnail.js';
                break;
            default:
                $nodeScript = 'imageProcessor.js';
        }

        $nodeCommand = "node " . escapeshellarg(base_path("resources/js/$nodeScript")) . " " .
            escapeshellarg(storage_path("app/public/$sourcePath")) . " " .
            escapeshellarg(storage_path("app/public/$targetPath"));

        exec($nodeCommand);
        $this->info("Processed $targetPath using $nodeScript");
    }
}
