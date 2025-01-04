<?php

namespace MattYeend\Logger;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the Logger model if necessary
    }

    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . 'Database/Migrations');

        // Publish the logger model
        $this->publishes([
            __DIR__ . 'src/Models/Logger.php' => app_path('Models/Logger.php'),
        ], 'logger-model');
    }
}