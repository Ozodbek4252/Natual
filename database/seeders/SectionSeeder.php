<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section1 = Section::query()->create([
            'image' => 'sections/Group_41.png',
            'link' => 'services',
        ]);

        // Ru Translation for section1
        $section1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $section1->id,
            'translationable_type' => Section::class,
            'content' => 'Профессиональные ландшафтные услуги более',
            'column_name' => 'title',
        ]);
        $section1->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $section1->id,
            'translationable_type' => Section::class,
            'content' => "Natural Peyzaj входит в число компаний, которые формируют сектор с его
                            завершенными и в настоящее время действующими зарубежными и отечественными
                            проектами и приложениями для промышленности, дорог, туристических объектов,
                            торговых центров, жилищного строительства. Основанная в 1996 году, наша
                            компания предоставляет услуги в ландшафтном секторе с архитектурным офисом,
                            теплицами и питомником, расположенными на 16 акрах в Эйюпе Кемербургазе.",
            'column_name' => 'description',
        ]);

        // Uz Translation for section1
        $section1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $section1->id,
            'translationable_type' => Section::class,
            'content' => 'Professional peyzaj xizmatlari',
            'column_name' => 'title',
        ]);
        $section1->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $section1->id,
            'translationable_type' => Section::class,
            'content' => "Natural Peyzaj, sanoat, yo‘l, turizm obyektlari, savdo markazlari va
                            yashash joylariga mo‘ljallangan chet el va o‘zbekiston bo‘yicha amalga
                            oshirilayotgan loyihalari va dasturlari bilan birgalikda sohasini shakllantiradigan
                            kompaniyalar qatoriga kiradi. 1996 yilda tashkil etilgan, bizning kompaniyamiz
                            Eyup Kemerburgazda joylashgan 16 hektar maydonli arxitektura ofisi, o‘simlikxona
                            va gulxona bilan peyzaj sohasida xizmat ko‘rsatadi.",
            'column_name' => 'description',
        ]);


        $section2 = Section::query()->create([
            'image' => 'sections/Group_41.png',
            'link' => 'http://localhost:9003/banners',
        ]);

        // Ru Translation for section2
        $section2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $section2->id,
            'translationable_type' => Section::class,
            'content' => 'Наши проекты за границей',
            'column_name' => 'title',
        ]);
        $section2->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'translationable_id' => $section2->id,
            'translationable_type' => Section::class,
            'content' => "Наш опытный технический персонал предоставляет услуги по проектированию
                        и внедрению в различных масштабах в стране и за рубежом, от городского до
                        жилого, а также услуги по техническому обслуживанию после внедрения.",
            'column_name' => 'description',
        ]);

        // Uz Translation for section2
        $section2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $section2->id,
            'translationable_type' => Section::class,
            'content' => 'Chet eldagi loyihalarimiz',
            'column_name' => 'title',
        ]);
        $section2->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'translationable_id' => $section2->id,
            'translationable_type' => Section::class,
            'content' => "Bizning tajribali texnik xodimlarimiz mamlakatimizda va chet elda
                        shahardan yashayotgan joylarga qadar har xil masshtablarda loyihalarni
                        shakllantirish va amalga oshirish xizmatlarini taqdim etadi, shuningdek,
                        amalga oshirilgandan so‘ng texnik xizmat ko‘rsatish.",
            'column_name' => 'description',
        ]);
    }
}
