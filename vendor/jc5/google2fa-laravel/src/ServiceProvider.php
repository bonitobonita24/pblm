<?php
declare(strict_types=1);

namespace PragmaRX\Google2FALaravel;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use PragmaRX\Google2FALaravel\Providers\EventServiceProvider;

/**
 * Class ServiceProvider
 */
class ServiceProvider extends IlluminateServiceProvider
{

    /**
     * Configure package paths.
     */
    private function configurePaths()
    {
        $this->publishes(
            [
                __DIR__ . '/config/config.php' => config_path('google2fa.php'),
            ]
        );
    }

    /**
     * Merge configuration.
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'google2fa'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->singleton(
            'pragmarx.google2fa', static function ($app) {

            return $app->make(Google2FA::class);
        }
        );
    }

    /**
     *
     */
    public function boot(): void
    {
        $this->configurePaths();

        $this->mergeConfig();

        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
