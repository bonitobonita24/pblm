<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel\Support;

/**
 * Trait Input
 */
trait Input
{
    /**
     * Check if the request input has the OTP.
     *
     * @return mixed
     */
    protected function inputHasOneTimePassword()
    {
        return $this->getRequest()->has($this->config('otp_input'));
    }

    /**
     * @return mixed
     */
    protected function getInputOneTimePassword()
    {
        return $this->getRequest()->input($this->config('otp_input'));
    }

    /**
     * @return mixed
     */
    abstract public function getRequest();

    /**
     * @param       $string
     * @param array $children
     *
     * @return mixed
     */
    abstract protected function config($string, $children = []);
}
