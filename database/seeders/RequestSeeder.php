<?php

namespace Database\Seeders;

use App\Models\RequestModel;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestModel::query()->create([
            'name' => 'Jane Doe',
            'number' => '0987654321',
        ]);

        RequestModel::query()->create([
            'name' => 'John Smith',
            'number' => '1230984567',
        ]);

        RequestModel::query()->create([
            'name' => 'Jane Smith',
            'number' => '0984561230',
        ]);

        RequestModel::query()->create([
            'name' => 'John Johnson',
            'number' => '1237894560',
        ]);
    }
}
