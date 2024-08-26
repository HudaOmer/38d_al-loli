<?php

// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Define categories and colors
        $categories = [
            'ring',
            'necklace',
            'earring',
            'bracelet',
            'home-accessories',
            'head-accessories',
        ];

        $colors = [
            'Red', 'Blue', 'Green', 'Yellow', 'Black', 'White', 'Purple', 'Orange', 'Pink', 'Brown'
        ];

        foreach ($categories as $category) {
            for ($i = 1; $i <= 20; $i++) {
                Product::create([
                    'name' => $colors[array_rand($colors)] . ' ' . $category,
                    'description' => $faker->sentence,
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'category' => $category,
                    'stock_quantity' => $faker->numberBetween(1, 100),
                ]);
            }
        }
    }
}
