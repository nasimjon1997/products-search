<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'iPhone 15',         'price' => 899.99, 'category_id' => 1, 'in_stock' => true,  'rating' => 4.7],
            ['name' => 'MacBook Air M2',     'price' => 1199.00, 'category_id' => 2, 'in_stock' => false, 'rating' => 4.8],
            ['name' => 'Чистый код',         'price' => 34.99,  'category_id' => 3, 'in_stock' => true,  'rating' => 4.9],
            ['name' => 'Футболка хлопок',    'price' => 19.99,  'category_id' => 4, 'in_stock' => true,  'rating' => 4.2],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
