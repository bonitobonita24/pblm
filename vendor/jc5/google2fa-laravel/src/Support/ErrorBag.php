<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel\Support;

use Exception;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

/**
 * Trait ErrorBag
 */
trait ErrorBag
{
    /**
     * Create an error bag and store a message on int.
     *
     * @param $message
     *
     * @return MessageBag
     */
    protected function createErrorBagForMessage($message): MessageBag
    {
        if (is_object($message)) {
            try {
                $message = (string)$message;
            } catch (Exception $e) {
                $message = (string)$e->getMessage();
            }
        }
        if (is_array($message)) {
            $message = (string)$message;
        }

        return new MessageBag(
            [
                'message' => $message,
            ]
        );
    }

    /**
     * Get a message bag with a message for a particular status code.
     *
     * @param $statusCode
     *
     * @return MessageBag
     */
    protected function getErrorBagForStatusCode($statusCode)
    {
        $errorMap = [
            SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY => 'google2fa.error_messages.wrong_otp',
            SymfonyResponse::HTTP_BAD_REQUEST          => 'google2fa.error_messages.cannot_be_empty',
        ];

        return $this->createErrorBagForMessage(
            trans(
                config(
                    array_key_exists($statusCode, $errorMap) ? $errorMap[$statusCode] : 'google2fa.error_messages.unknown'
                )
            )
        );
    }
}
