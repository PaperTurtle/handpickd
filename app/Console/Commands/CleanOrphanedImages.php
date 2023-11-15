<?php

namespace App\Console\Commands;

use App\Http\Controllers\ProductController;
use Illuminate\Console\Command;

/**
 * A Laravel console command to clean orphaned images.
 *
 * This command interfaces with the ProductController to remove images
 * from the storage that are no longer linked to any records in the database.
 * It helps in maintaining the storage and ensuring that only relevant
 * images are retained.
 *
 * Usage: Run the command using the Laravel Artisan command line tool.
 * Command: `php artisan app:coi` (clean-orphaned-images).
 */
class CleanOrphanedImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:coi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes images from the storage that are not in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new ProductController();
        $controller->cleanOrphanedImages();
        $this->info('Orphaned images cleaned successfully.');
    }
}
