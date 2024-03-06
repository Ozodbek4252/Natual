<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::create([
            'logo' => 'partners/Rectangle 25.png',
            'name' => 'KOC',
        ]);
        Partner::create([
            'logo' => 'partners/Rectangle 27.png',
            'name' => 'Agrobank',
        ]);
        Partner::create([
            'logo' => 'partners/Rectangle 26.png',
            'name' => 'Discover Invest',
        ]);
        Partner::create([
            'logo' => 'partners/Rectangle 28.png',
            'name' => 'Seoul mun',
        ]);
    }
}
