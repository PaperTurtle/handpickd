<?php

namespace App\Console\Commands;

use App\Http\Controllers\ProductController;
use Illuminate\Console\Command;

/**
 * To use = php artisan app:coi (clean-orphaned-images)
 * Gets rid of images that are not stored in the database from the storage
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
    protected $description = 'Command description';

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
