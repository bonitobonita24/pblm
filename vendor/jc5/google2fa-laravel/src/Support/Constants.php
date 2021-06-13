<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel\Support;

/**
 * Class Constants
 */
class Constants
{
    public const CONFIG_PACKAGE_NAME = 'google2fa';

    public const SESSION_AUTH_PASSED = 'auth_passed';

    public const SESSION_AUTH_TIME = 'auth_time';

    public const SESSION_OTP_TIMESTAMP = 'otp_timestamp';

    public const QRCODE_IMAGE_BACKEND_EPS = 'eps';

    public const QRCODE_IMAGE_BACKEND_SVG = 'svg';

    public const QRCODE_IMAGE_BACKEND_IMAGEMAGICK = 'imagemagick';

    public const OTP_EMPTY = 'empty';

    public const OTP_VALID = 'valid';

    public const OTP_INVALID = 'invalid';

    public const SESSION_TOKEN = 'google2fa_token';
}
