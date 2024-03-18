<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banner1 = Banner::query()->create([
            'image' => 'banners/Rectangle_36.png',
            'link' => 'https://www.youtube.com/watch?v=Oy_63HYsvhQ&t=944s',
            'is_published' => true,
        ]);

        // Ru Translation for banner1
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Каталог',
            'column_name' => 'button',
        ]);
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Измените ландшафтный дизайн вокруг себя - подчеркните индивидуальность',
            'column_name' => 'description',
        ]);
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Natural Peyzaj',
            'column_name' => 'title',
        ]);


        // Uz Translation for banner1
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Katalog',
            'column_name' => 'button',
        ]);
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'O\'zingizning atrofingizdagi landshaft dizaynini o\'zgartiring - shaxsiylikni belgilang',
            'column_name' => 'description',
        ]);
        $banner1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Natural Peyzaj',
            'column_name' => 'title',
        ]);


        $banner2 = Banner::query()->create([
            'image' => 'banners/Rectangle_2.png',
            'link' => 'https://www.youtube.com/watch?v=7akI0rgBbE0',
            'is_published' => true,
        ]);

        // Ru Translation for banner2
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Каталог',
            'column_name' => 'button',
        ]);
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Natural Peyzaj входит в число компаний, которые формируют',
            'column_name' => 'description',
        ]);
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Natural Peyzaj 2',
            'column_name' => 'title',
        ]);

        // Uz Translation for banner2
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Katalog',
            'column_name' => 'button',
        ]);
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Natural Peyzaj kompaniyasiga kiradigan kompaniyalarning ichida',
            'column_name' => 'description',
        ]);
        $banner2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Natural Peyzaj 2',
            'column_name' => 'title',
        ]);
    }
}
