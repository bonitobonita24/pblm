<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel;

use Closure;
use PragmaRX\Google2FALaravel\Support\Authenticator;

/**
 * Class MiddlewareStateless
 */
class MiddlewareStateless
{
    /**
     * @param         $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authenticator = app(Authenticator::class)->bootStateless($request);

        if ($authenticator->isAuthenticated()) {
            return $next($request);
        }

        return $authenticator->makeRequestOneTimePasswordResponse();
    }
}
