<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class UpdateThumbnailPaths extends Command
{
    protected $signature = 'images:update-thumbnails';
    protected $description = 'Updates the database with paths for show, resized, and thumbnail images.';

    public function handle()
    {
        $this->info('Updating image paths...');

        $types = ['show', 'resized', 'thumbnail'];

        foreach ($types as $type) {
            $this->updateImagePathsForType($type);
        }

        $this->info('All image paths updated successfully.');
    }

    protected function updateImagePathsForType($type)
    {
        $columnName = "{$type}_image_path";
        ProductImage::whereNull($columnName)->chunk(100, function ($images) use ($columnName, $type) {
            foreach ($images as $image) {
                $path = str_replace('_original', "_{$type}", $image->image_path);

                if (Storage::disk('public')->exists($path)) {
                    $image->$columnName = $path;
                    $image->save();
                    $this->info("{$type} path updated for image: {$image->id}");
                } else {
                    $this->error("{$type} image does not exist for image: {$image->id}");
                }
            }
        });
    }
}
