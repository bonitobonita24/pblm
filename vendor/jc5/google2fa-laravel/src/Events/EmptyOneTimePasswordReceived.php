<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class EmptyOneTimePasswordReceived
 */
class EmptyOneTimePasswordReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
