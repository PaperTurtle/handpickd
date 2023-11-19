<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * A Laravel console command to update the database with paths for show, resized, and thumbnail images.
 *
 * This command interfaces with the ProductImage model to update image paths in the database for different
 * image types (show, resized, thumbnail). It's useful for ensuring the database holds correct references
 * to image files stored in the system, especially after batch processing or migration.
 *
 * Usage: Run the command using the Laravel Artisan command line tool.
 * Command: `php artisan images:update-thumbnails`.
 */
class UpdateThumbnailPaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:update-thumbnails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the database with paths for show, resized, and thumbnail images.';

    /**
     * Execute the console command.
     * Iterates through different image types and updates their paths in the database.
     *
     * @return void
     */
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
