<?php

namespace MattYeend\Logger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class LoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register bindings or configurations if necessary
    }

    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');

        // Publish the logger model stub with a tag
        $this->publishes([
            __DIR__ . '/Models/Logger.stub' => app_path('Logger.php'), // Publish directly to ./app
        ], 'logger-model');

        // Perform namespace replacement in the published stub
        $this->replaceNamespaceInPublishedStub();
    }

    /**
     * Replaces the namespace placeholder in the published Logger model.
     */
    protected function replaceNamespaceInPublishedStub()
    {
        $filesystem = app(Filesystem::class);
        $loggerPath = app_path('Logger.php'); // Updated to match the new path

        if ($filesystem->exists($loggerPath)) {
            try {
                $contents = $filesystem->get($loggerPath);

                // Only replace the namespace if the placeholder exists
                if (strpos($contents, '{{ namespace }}') !== false) {
                    $contents = str_replace('{{ namespace }}', 'App', $contents);
                    $filesystem->put($loggerPath, $contents);
                }
            } catch (\Exception $e) {
                // Log an error for debugging purposes
                logger()->error('Failed to replace namespace in Logger model: ' . $e->getMessage());
            }
        }
    }
}
