<?php

namespace MattYeend\Logger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

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

        // Publish the logger model with dynamic namespace replacement
        $this->publishes([
            __DIR__ . '/Models/Logger.stub' => app_path('Models/Logger.php'),
        ], 'logger-model');

        // Replace namespace dynamically after publishing
        $this->replaceNamespaceInPublishedStub();
    }

    protected function replaceNamespaceInPublishedStub()
    {
        $filesystem = app(Filesystem::class);
        $loggerPath = app_path('Models/Logger.php');

        if ($filesystem->exists($loggerPath)) {
            try {
                $contents = $filesystem->get($loggerPath);
                $contents = str_replace('{{ namespace }}', 'App\Models', $contents);
                $filesystem->put($loggerPath, $contents);
            } catch (\Exception $e) {
                // Log an error or handle it gracefully
                logger()->error('Failed to replace namespace in Logger model: ' . $e->getMessage());
            }
        }
    }
}