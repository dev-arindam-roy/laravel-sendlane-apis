<?php

namespace Arindam\SendlaneApis;

use Illuminate\Support\ServiceProvider;
use Arindam\SendlaneApis\Sendlane\SendlaneClass;

class SendlaneApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/sendlane-config.php', 'sendlaneapis'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind('sendlaneclass', function() {
            return new SendlaneClass();
        });

        $this->publishes([
            __DIR__ . '/config/sendlane-config.php' => config_path('sendlane.php')
        ], 'sendlaneapis:config');

        //php artisan vendor:publish --provider="Arindam\SendlaneApis\SendlaneApiServiceProvider" --force
        //php artisan vendor:publish --tag="sendlaneapis:config"
    }
}