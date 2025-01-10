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
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        // Publish the logger model with dynamic namespace replacement
        $this->publishes([
            __DIR__ . '/Models/Logger.stub' => app_path('Models/Logger.php'),
        ], 'logger-model');

        // Replace namespace dynamically
        $this->replaceNamespaceInPublishedStub();
    }

    protected function replaceNamespaceInPublishedStub()
    {
        $filesystem = app(Filesystem::class);
        $loggerPath = app_path('Models/Logger.php');

        if ($filesystem->exists($loggerPath)) {
            $contents = $filesystem->get($loggerPath);
            $contents = str_replace('{{ namespace }}', 'App\Models', $contents);
            $filesystem->put($loggerPath, $contents);
        }
    }
}