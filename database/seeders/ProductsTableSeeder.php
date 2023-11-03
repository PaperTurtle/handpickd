<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'artisan_id' => 1, // Replace with actual user ID
            'category_id' => 1, // Replace with actual category ID
            'name' => 'Handmade Wooden Bowl',
            'description' => 'A beautifully carved wooden bowl that serves as a centerpiece.',
            'price' => 59.99,
            'quantity' => 10,
        ]);
    }
}
