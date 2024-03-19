<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public static function sendMessageToGroup(Request $request)
    {
        $botToken = env('TG_BOT_TOKEN');
        $chatId = env('TG_CHAT_ID');

        $name = $request->input('name');
        $phone = $request->input('number');
        $ip = $request->ip();
        $time = now()->format('d.m.Y - H:i');

        $message = "👨‍💻 Имя: {$name}\n📞 Телефон: {$phone}\nIP: {$ip}\n⏰ Время заказа: {$time}";

        $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
        Http::post($url, [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }
}
