<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ResizeProductImages extends Command
{
    protected $signature = 'images:resize';
    protected $description = 'Resize all product images and update paths in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $images = ProductImage::all();

        foreach ($images as $image) {
            $originalPath = $image->image_path;

            if (Storage::disk('public')->exists($originalPath)) {
                $fileContents = Storage::disk('public')->get($originalPath);
                $resizedImage = Image::make($fileContents)->resize(264, 144)->encode('webp', 100);
                $resizedFilename = 'resized_' . basename($originalPath, '.' . $image->image_path->getClientOriginalExtension()) . '.webp';
                $resizedImagePath = 'product_images/' . $resizedFilename;

                Storage::disk('public')->put($resizedImagePath, (string) $resizedImage);

                // Update the database entry
                $image->update(['resized_image_path' => $resizedImagePath]);
            }
        }

        $this->info('All images have been resized and updated.');
    }
}
