<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'name' => 'Наши проекты в Узбекистане',
            'image' => 'categories/Rectangle 1.png',
        ]);

        Category::query()->create([
            'name' => 'Наши проекты за границей ',
            'image' => 'categories/Rectangle 2.png',
        ]);
    }
}
