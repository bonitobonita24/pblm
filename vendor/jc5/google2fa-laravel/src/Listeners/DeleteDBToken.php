<?php
declare(strict_types=1);


namespace PragmaRX\Google2FALaravel\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class DeleteDBToken
 */
class DeleteDBToken
{
    /**
     * @param Logout $event
     */
    public function handle(Logout $event): void
    {
        $storeInCookie = config('google2fa.store_in_cookie', false);
        if (false === $storeInCookie) {
            return;
        }
        // delete token from DB, making cookie worthless.
        $cookieName = config('google2fa.cookie_name', 'google2fa_token');
        $token      = request()->cookies->get($cookieName);

        // check DB for token.
        try {
            DB::table('2fa_tokens')
                       ->where('token', $token)
                       ->where('user_id', $event->user->id)->delete();
        } catch (QueryException $e) {
            Log::error('Could not delete user token from database.');
        }
    }

}