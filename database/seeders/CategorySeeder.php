<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Смартфоны', 'Ноутбуки', 'Книги', 'Одежда', 'Аксессуары'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
