<?php

namespace App\Providers;

use App\Models\Dashboard\Setting\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;


class SmsConfigServiceProvider extends ServiceProvider
{
    public function boot():void
    {
        try {
            // Cache settings to avoid repeated database queries
            $settings = cache()->remember('settings', 3600, function () {
                return Setting::firstOrfail();
            });

            // sms configuration
            Config::set('services.Sms', [
                'sender_name' => $settings['sms_sender_name'] ?? null,
                'app_id' => $settings['sms_app_id'] ?? null,
                'app_sec' => $settings['sms_app_sec'] ?? null,
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to load sms settings: ' . $e->getMessage());
        }
    }
}
