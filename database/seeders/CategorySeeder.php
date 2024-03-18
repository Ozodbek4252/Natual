<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lang;
use App\Models\Translation;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::query()->create([
            'image' => 'categories/Rectangle_1.png',
            'is_local' => true,
        ]);

        // Ru Translation for category1
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $category1->id,
            'translationable_type' => Category::class,
            'content' => 'Наши проекты в Узбекистане',
            'column_name' => 'name',
        ]);

        // Uz Translation for category1
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $category1->id,
            'translationable_type' => Category::class,
            'content' => 'O\'zbekistondagi loyihalarimiz',
            'column_name' => 'name',
        ]);


        $category2 = Category::query()->create([
            'image' => 'categories/Rectangle_2.png',
            'is_local' => false,
        ]);

        // Ru Translation for category2
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $category2->id,
            'translationable_type' => Category::class,
            'content' => 'Наши проекты за границей',
            'column_name' => 'name',
        ]);

        // Uz Translation for category2
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $category2->id,
            'translationable_type' => Category::class,
            'content' => 'Chet eldagi loyihalarimiz',
            'column_name' => 'name',
        ]);
    }
}
