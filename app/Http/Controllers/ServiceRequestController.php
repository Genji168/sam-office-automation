<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone'         => 'required|string|max:50',
        'machine_model' => 'required|string|max:255',
        'error_code'    => 'nullable|string|max:50',
        'description'   => 'required|string',
        'latitude'      => 'nullable|numeric',
        'longitude'     => 'nullable|numeric',
    ]);

    // 1. Save to Database
    DB::table('service_requests')->insert($validated);

    // 2. Telegram Notifications
    $botToken = env('TELEGRAM_BOT_TOKEN');
    $chatId   = env('TELEGRAM_CHAT_ID');

    if ($botToken && $chatId) {
        $errorCode = !empty($request->error_code) ? $request->error_code : 'None';

        // Text Message (No location text needed here)
        $message = "🚨 *NEW SERVICE TICKET*\n\n"
                 . "👤 *Customer:* {$request->customer_name}\n"
                 . "📞 *Phone:* {$request->phone}\n"
                 . "🖨️ *Machine:* {$request->machine_model}\n"
                 . "⚠️ *Error Code:* {$errorCode}\n"
                 . "📝 *Issue:* {$request->description}";
                 

        // Send Text Message First
        Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id'    => $chatId,
            'text'       => $message,
            'parse_mode' => 'Markdown',
        ]);

        // Send Interactive Map Second (If coordinates exist)
        if ($request->filled('latitude') && $request->filled('longitude')) {
            Http::post("https://api.telegram.org/bot{$botToken}/sendLocation", [
                'chat_id'   => $chatId,
                'latitude'  => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        }
    }

    return back()->with('success', 'Service ticket submitted successfully!');
}
}