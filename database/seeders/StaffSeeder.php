<?php

namespace Database\Seeders;

use App\Models\Lang;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff1 = Staff::query()->create([
            'name' => 'Mustafa Fedai Ozaslan',
            'image' => '/staffs/Rectangle 22.png',
            'number' => '+998971567494',
            'email' => 'mustafa@naturalpeyzaj.com.tr',
            'website' => 'naturalpeyzaj.com.tr',
        ]);
        // 'position' => 'Regional director',

        // Ru Translation for staff1
        $staff1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Региональный директор',
            'column_name' => 'position',
        ]);

        // Uz Translation for staff1
        $staff1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Regional direktor',
            'column_name' => 'position',
        ]);
    }
}
