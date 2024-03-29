<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            LangSeeder::class,
            LogoSeeder::class,
            ContactSeeder::class,
            PartnerSeeder::class,
            StaffSeeder::class,
            CategorySeeder::class,
            ServiceSeeder::class,
            BannerSeeder::class,
            SectionSeeder::class,
            RequestSeeder::class,
            FacilitySeeder::class,
            ProjectSeeder::class,
            AboutCompanySeeder::class,
            CatalogSeeder::class,
        ]);
    }
}
