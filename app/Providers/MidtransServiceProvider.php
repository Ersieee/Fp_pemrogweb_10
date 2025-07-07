<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Midtrans\Config;

class MidtransServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Konfigurasi Midtrans dari config/app.php atau .env
        Config::$serverKey = config('app.midtrans_server_key', env('MIDTRANS_SERVER_KEY', ''));
        Config::$clientKey = config('app.midtrans_client_key', env('MIDTRANS_CLIENT_KEY', ''));
        Config::$isProduction = config('app.midtrans_is_production', env('MIDTRANS_IS_PRODUCTION', false));
        Config::$isSanitized = config('app.midtrans_sanity_check', env('MIDTRANS_SANITY_CHECK', true));
        Config::$is3ds = true; // 3DS diaktifkan untuk kartu kredit (keamanan tambahan)

        // Registrasi singleton service (opsional tapi direkomendasikan)
        $this->app->singleton('midtrans.snap', function ($app) {
            return new \Midtrans\Snap();
        });

        $this->app->singleton('midtrans.coreapi', function ($app) {
            return new \Midtrans\CoreApi();
        });

        $this->app->singleton('midtrans.notification', function ($app) {
            return new \Midtrans\Notification();
        });
    }
}
