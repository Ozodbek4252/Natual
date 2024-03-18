<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catalog::query()->create([
            'file' => 'catalog/Natural_Peyzaj_Katalog_221210_ru.pdf',
        ]);
    }
}
