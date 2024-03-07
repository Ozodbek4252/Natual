<?php

namespace Database\Seeders;

use App\Models\Lang;
use App\Models\Service;
use App\Models\Translation;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service1 = Service::query()->create([
            'icon' => 'services/Group 34.png',
        ]);

        // Ru Translation for service1
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service1->id,
            'translationable_type' => Service::class,
            'content' => 'Озеленение',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service1->id,
            'translationable_type' => Service::class,
            'content' => '-Разработка растительного грунта
                        -Система полива
                        -Система грунтового дренажа
                        -Система кровельного дренажа
                        -Посадка деревьев
                        -Посадка кустарников
                        -Установка рулонного газона
                        -Установка Гидропосева
                        -Укладка декоративного камня
                        -Установка разделителей',
            'column_name' => 'description',
        ]);

        // Uz Translation for service1
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service1->id,
            'translationable_type' => Service::class,
            'content' => 'Maydon',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service1->id,
            'translationable_type' => Service::class,
            'content' => "-O'simliklar tayyorlash
                        -Suqilish tizimi
                        -Yer suqilish tizimi
                        -Dachadagi suqilish tizimi
                        -Daraxtlar ekip qo'yish
                        -O'simliklar ekip qo'yish
                        -Rulon gazonni o'rnatish
                        -Gidro ekip qo'yish
                        -Dekorativ toshni o'rnatish
                        -Bo'limlovchilarni o'rnatish",
            'column_name' => 'description',
        ]);

        $service2 = Service::query()->create([
            'icon' => 'services/Vector (1).png',
        ]);

        // Ru Translation for service2
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service2->id,
            'translationable_type' => Service::class,
            'content' => 'Ландшафтный дизайн',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service2->id,
            'translationable_type' => Service::class,
            'content' => "-Разработка дизайн проекта
                        -Разработка 3D проекта
                        -Разработка чертежей
                        -Разработка сметы
                        -Разработка плана",
            'column_name' => 'description',
        ]);

        // Uz Translation for service2
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service2->id,
            'translationable_type' => Service::class,
            'content' => 'Loyiha',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service2->id,
            'translationable_type' => Service::class,
            'content' => "-Dizayn loyihasini ishlab chiqish
                        -3D loyiha ishlab chiqish
                        -Chizmalar ishlab chiqish
                        -Smetani ishlab chiqish
                        -Rejani ishlab chiqish",
            'column_name' => 'description',
        ]);

        $service3 = Service::query()->create([
            'icon' => 'services/Vector.png',
        ]);

        // Ru Translation for service3
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service3->id,
            'translationable_type' => Service::class,
            'content' => 'Установка системы полива',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $service3->id,
            'translationable_type' => Service::class,
            'content' => "-Разработка проекта
                        -Установка системы полива
                        -Установка системы капельного полива
                        -Установка системы автоматического полива
                        -Установка системы полива газона
                        -Установка системы полива цветников
                        -Установка системы полива деревьев
                        -Установка системы полива кустарников",
            'column_name' => 'description',
        ]);

        // Uz Translation for service3
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service3->id,
            'translationable_type' => Service::class,
            'content' => 'Suqilish tizimini o\'rnatish',
            'column_name' => 'title',
        ]);
        Translation::query()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $service3->id,
            'translationable_type' => Service::class,
            'content' => "-Loyiha ishlab chiqish
                        -Suqilish tizimini o'rnatish
                        -Qatiq suqilish tizimini o'rnatish
                        -Avtomatik suqilish tizimini o'rnatish
                        -Gazon suqilish tizimini o'rnatish
                        -Gulxona suqilish tizimini o'rnatish
                        -Daraxtlar suqilish tizimini o'rnatish
                        -O'simliklar suqilish tizimini o'rnatish",
            'column_name' => 'description',
        ]);
    }
}
