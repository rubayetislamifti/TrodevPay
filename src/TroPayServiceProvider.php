<?php

namespace TrodevIT\Trodevpay;

use Illuminate\Support\ServiceProvider;
use TrodevIT\Trodevpay\Helpers\BkashClinet;

class TroPayServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration file
        $this->mergeConfigFrom(__DIR__ . '/config/bkash.php', 'bkash');

        // Bind BkashClient as a singleton
        $this->app->singleton('tropay.bkash', function ($app) {
            return new BkashClinet();
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes from the package
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        // Publish the config file
        $this->publishes([
            __DIR__ . '/config/bkash.php' => config_path('bkash.php'),
        ], 'tropay-config');
    }
}

