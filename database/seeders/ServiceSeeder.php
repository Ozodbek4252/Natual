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
            'icon' => 'services/Group_34.png',
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
            'content' => '<p>-Разработка растительного грунта</p>
                        <p>-Система полива</p>
                        <p>-Система грунтового дренажа</p>
                        <p>-Система кровельного дренажа</p>
                        <p>-Посадка деревьев</p>
                        <p>-Посадка кустарников</p>
                        <p>-Установка рулонного газона</p>
                        <p>-Установка Гидропосева</p>
                        <p>-Укладка декоративного камня</p>
                        <p>-Установка разделителей</p>',
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
            'content' => "<p>-O'simliklar tayyorlash</p>
                        <p>-Suqilish tizimi</p>
                        <p>-Yer suqilish tizimi</p>
                        <p>-Dachadagi suqilish tizimi</p>
                        <p>-Daraxtlar ekip qo'yish</p>
                        <p>-O'simliklar ekip qo'yish</p>
                        <p>-Rulon gazonni o'rnatish</p>
                        <p>-Gidro ekip qo'yish</p>
                        <p>-Dekorativ toshni o'rnatish</p>
                        <p>-Bo'limlovchilarni o'rnatish</p>",
            'column_name' => 'description',
        ]);

        $service2 = Service::query()->create([
            'icon' => 'services/Vector_(1).png',
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
            'content' => "<p>-Разработка дизайн проекта</p>
                        <p>-Разработка 3D проекта</p>
                        <p>-Разработка чертежей</p>
                        <p>-Разработка сметы</p>
                        <p>-Разработка плана</p>",
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
            'content' => "<p>-Dizayn loyihasini ishlab chiqish</p>
                        <p>-3D loyiha ishlab chiqish</p>
                        <p>-Chizmalar ishlab chiqish</p>
                        <p>-Smetani ishlab chiqish</p>
                        <p>-Rejani ishlab chiqish</p>",
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
            'content' => "<p>-Разработка проекта</p>
                        <p>-Установка системы полива</p>
                        <p>-Установка системы капельного полива</p>
                        <p>-Установка системы автоматического полива</p>
                        <p>-Установка системы полива газона</p>
                        <p>-Установка системы полива цветников</p>
                        <p>-Установка системы полива деревьев</p>
                        <p>-Установка системы полива кустарников</p>",
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
            'content' => "<p>-Loyiha ishlab chiqish</p>
                        <p>-Suqilish tizimini o'rnatish</p>
                        <p>-Qatiq suqilish tizimini o'rnatish</p>
                        <p>-Avtomatik suqilish tizimini o'rnatish</p>
                        <p>-Gazon suqilish tizimini o'rnatish</p>
                        <p>-Gulxona suqilish tizimini o'rnatish</p>
                        <p>-Daraxtlar suqilish tizimini o'rnatish</p>
                        <p>-O'simliklar suqilish tizimini o'rnatish</p>",
            'column_name' => 'description',
        ]);
    }
}
