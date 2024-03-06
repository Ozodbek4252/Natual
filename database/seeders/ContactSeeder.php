<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'title' => 'email',
            'value' => 'info@naturalpeyzaj.uz',
        ]);
        Contact::create([
            'title' => 'number',
            'value' => '+998787777722',
        ]);
        Contact::create([
            'title' => 'address',
            'value' => 'Узбекистан, г. Ташкент, Шайхантахурский район, улица Фуркат, 1 A'
        ]);
        Contact::create([
            'title' => 'telegram',
            'value' => 'https://t.me/naturalpeyzaj'
        ]);
        Contact::create([
            'title' => 'linkedin',
            'value' => 'https://t.me/naturalpeyzaj'
        ]);
        Contact::create([
            'title' => 'instagram',
            'value' => 'https://www.instagram.com/naturalpeyzaj'
        ]);
        Contact::create([
            'title' => 'facebook',
            'value' => 'https://www.facebook.com/naturalpeyzaj'
        ]);
    }
}
