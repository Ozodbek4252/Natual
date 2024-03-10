<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project1 = Project::query()->create([
            'image' => 'projects/Property 1=Default.png',
            'date' => '2022',
            'name' => 'Yangi O’zbekiston',
            'is_finished' => true,
            'category_id' => 1,
        ]);

        // Ru Translation for project1
        $project1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Мирзо-Улугбек район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project1
        $project1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Mirzo-Ulug‘bek tumani',
            'column_name' => 'address',
        ]);

        $project1->facilities()->attach(1, ['value' => '165.000 m2']);
        $project1->facilities()->attach(2, ['value' => '560.000 m2']);
        $project1->facilities()->attach(3, ['value' => '8.000 шт']);
        $project1->facilities()->attach(4, ['value' => '400.000 шт']);
        $project1->facilities()->attach(5, ['value' => '190.000 m2']);
        $project1->facilities()->attach(6, ['value' => '85.000 m2']);


        $project2 = Project::query()->create([
            'image' => 'projects/Property 1=Variant3.png',
            'date' => '2019',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 1,
        ]);

        // Ru Translation for project2
        $project2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project2
        $project2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);

        $project2->facilities()->attach(1, ['value' => '165.000 m2']);
        $project2->facilities()->attach(2, ['value' => '560.000 m2']);
        $project2->facilities()->attach(3, ['value' => '8.000 шт']);
        $project2->facilities()->attach(4, ['value' => '400.000 шт']);
        $project2->facilities()->attach(5, ['value' => '190.000 m2']);
        $project2->facilities()->attach(6, ['value' => '85.000 m2']);
    }
}
