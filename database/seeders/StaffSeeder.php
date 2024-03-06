<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::query()->create([
            'name' => 'Mustafa Fedai Ozaslan',
            'position' => 'Regional director',
            'image' => '/staffs/Rectangle 22.png',
            'number' => '+998971567494',
            'email' => 'mustafa@naturalpeyzaj.com.tr',
            'website' => 'naturalpeyzaj.com.tr',
        ]);
    }
}
