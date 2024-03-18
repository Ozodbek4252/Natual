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
            'image' => 'projects/Property 1=Variant4.png',
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

        $project3 = Project::query()->create([
            'image' => 'projects/Property 1=Variant3.png',
            'date' => '2020',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 2,
            'country' => 'Turkey',
        ]);

        // Ru Translation for project3
        $project3->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project3
        $project3->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);

        $project4 = Project::query()->create([
            'image' => 'projects/Property 1=Variant2.png',
            'date' => '2021',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 2,
            'country' => 'Turkey',
        ]);

        // Ru Translation for project4
        $project4->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project4
        $project4->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);

        $project5 = Project::query()->create([
            'image' => 'projects/Property 1=Variant1.png',
            'date' => '2022',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 2,
            'country' => 'Turkey',
        ]);

        // Ru Translation for project5
        $project5->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project5
        $project5->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);

        $project6 = Project::query()->create([
            'image' => 'projects/Property 1=Default.png',
            'date' => '2023',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 2,
            'country' => 'Saudi Arabia',
        ]);

        // Ru Translation for project6
        $project6->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project6
        $project6->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);

        $project7 = Project::query()->create([
            'image' => 'projects/Property 1=Variant4.png',
            'date' => '2024',
            'name' => 'Tashkent city',
            'is_finished' => true,
            'category_id' => 2,
            'country' => 'Saudi Arabia',
        ]);

        // Ru Translation for project7
        $project7->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Ташкент / Шайхантахурский район',
            'column_name' => 'address',
        ]);
        // Uz Translation for project7
        $project7->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Toshkent / Shayxontohur tumani',
            'column_name' => 'address',
        ]);
    }
}
