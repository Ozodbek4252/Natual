<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\File;
use App\Models\Lang;
use Illuminate\Database\Seeder;

class AboutCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = About::query()->create([
            'image' => 'about/Rectangle_1.png',
        ]);

        // Ru Translation for about
        $about->translations()->create([
            'lang_id' => Lang::where('code', 'ru')->first()->id,
            'content' => 'Natural Peyzaj входит в число компаний, которые формируют сектор с его
                    завершенными и в настоящее время действующими зарубежными и отечественными проектами
                    и приложениями для промышленности, дорог, туристических объектов, торговых центров,
                    жилищного строительства. Основанная в 1996 году, наша компания предоставляет услуги
                    в ландшафтном секторе с архитектурным офисом, теплицами и питомником, расположенными
                    на 16 акрах в Эйюпе Кемербургазе.
                    Наш опытный технический персонал предоставляет услуги по проектированию и внедрению в
                    различных масштабах в стране и за рубежом, от городского до жилого, а также услуги по
                    техническому обслуживанию после внедрения. Помимо нашего питомника, расположенного в
                    Кемербургазе, у нас есть завод по производству саженцев площадью 220 000 м2 в Биледжик
                    Османели. Кроме того, в нашем бизнесе за рубежом активно октябре продолжается наше
                    партнерство с отраслевыми компаниями.',
            'column_name' => 'description',
        ]);

        // Uz Translation for about
        $about->translations()->create([
            'lang_id' => Lang::where('code', 'uz')->first()->id,
            'content' => 'Natural Peyzaj, sanoat, yo‘l, turizm, savdo markazlari va turar joylar, turar joylar
                    uchun tayyorlangan va hozirgi kunda faoliyat ko‘rsatayotgan chet va ichki loyihalari va
                    dasturlari bilan sektorini shakllantiradigan kompaniyalarning soniga kiradi. 1996 yilda
                    tashkil etilgan, bizning kompaniyamiz 16 hektar maydonida joylashgan Eyupe Kemerbuzada
                    joylashgan arxitektura ofisi, o‘simlikxonasi va o‘simlikxonasi bilan peyzaj sohasida
                    xizmat ko‘rsatadi.
                    Bizning tajribali texnik xodimlarimiz mamlakatimizda va chet elda, shaharcha va turar
                    joylar, shuningdek, amaliyotdan so‘nggi texnik xizmat ko‘rsatish bo‘yicha dizayn va
                    amalga oshirish xizmatlarini taklif etadi. Kemerbuzada joylashgan o‘simlikxonamizning
                    yanada, Bizning Biledjik Osmaneli viloyatida joylashgan 220 000 m2 maydonli o‘simlik
                    ekinlari ishlab chiqarish zavodi mavjud. Shuningdek, bizning chet eldagi biznesimiz
                    sohalardagi kompaniyalar bilan hamkorlik faoliyati oktabrda davom etmoqda.',
            'column_name' => 'description',
        ]);

        // Add images to about
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/Rectangle_11.png',
            'extension' => 'png',
            'type' => 'image',
        ]);
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/Rectangle_12.png',
            'extension' => 'png',
            'type' => 'image',
        ]);

        // Add certificates to about
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/certificates/Rectangle41.pdf',
            'extension' => 'pdf',
            'type' => 'certificate',
        ]);
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/certificates/Rectangle45.pdf',
            'extension' => 'pdf',
            'type' => 'certificate',
        ]);
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/certificates/Rectangle42.pdf',
            'extension' => 'pdf',
            'type' => 'certificate',
        ]);
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/certificates/Rectangle43.pdf',
            'extension' => 'pdf',
            'type' => 'certificate',
        ]);
        File::create([
            'fileable_id' => $about->id,
            'fileable_type' => About::class,
            'name' => 'about/certificates/Rectangle44.pdf',
            'extension' => 'pdf',
            'type' => 'certificate',
        ]);
    }
}
