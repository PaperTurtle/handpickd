<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Creating a sample category
        Category::create([
            'name' => 'Handmade Crafts',
            'description' => 'Beautifully crafted handmade items.'
        ]);
    }
}
