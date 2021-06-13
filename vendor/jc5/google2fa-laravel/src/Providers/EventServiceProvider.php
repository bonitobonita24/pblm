<?php
declare(strict_types=1);


namespace PragmaRX\Google2FALaravel\Providers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use PragmaRX\Google2FALaravel\Events\LoggedOut;
use PragmaRX\Google2FALaravel\Listeners\DeleteDBToken;

/**
 * Class EventServiceProvider
 */
class EventServiceProvider extends ServiceProvider
{

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen
        = [
            Logout::class    => [
                DeleteDBToken::class,
            ],
        ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }

}
