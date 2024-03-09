<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facility1 = Facility::query()->create([
            'image' => 'facilities/man.png',
        ]);
        // Ru Translation for facility1
        $facility1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Тратуары',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility1
        $facility1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Ko\'cha yo\'llari',
            'column_name' => 'name',
        ]);

        $facility2 = Facility::query()->create([
            'image' => 'facilities/leaf.png',
        ]);
        // Ru Translation for facility2
        $facility2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Объем озеленения',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility2
        $facility2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Yashil zonalar',
            'column_name' => 'name',
        ]);

        $facility3 = Facility::query()->create([
            'image' => 'facilities/tree.png',
        ]);
        // Ru Translation for facility3
        $facility3->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Посаженные деревья',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility3
        $facility3->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Ekinchi daraxtlar',
            'column_name' => 'name',
        ]);

        $facility4 = Facility::query()->create([
            'image' => 'facilities/cloud.png',
        ]);
        // Ru Translation for facility4
        $facility4->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Посаженные кустарники',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility4
        $facility4->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Ekinchi o\'simliklar',
            'column_name' => 'name',
        ]);

        $facility5 = Facility::query()->create([
            'image' => 'facilities/bicycle.png',
        ]);
        // Ru Translation for facility5
        $facility5->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Вело-дороги',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility5
        $facility5->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Velosiped yo\'llari',
            'column_name' => 'name',
        ]);

        $facility6 = Facility::query()->create([
            'image' => 'facilities/car.png',
        ]);
        // Ru Translation for facility6
        $facility6->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Авто-дороги',
            'column_name' => 'name',
        ]);
        // Uz Translation for facility6
        $facility6->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Avtomobil yo\'llari',
            'column_name' => 'name',
        ]);
    }
}
