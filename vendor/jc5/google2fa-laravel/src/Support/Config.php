<?php

declare(strict_types=1);

namespace PragmaRX\Google2FALaravel\Support;

/**
 * Trait Config
 */
trait Config
{
    /**
     * Get a config value.
     *
     * @param $string
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function config($string, $default = null)
    {
        if (is_null(config($config = Constants::CONFIG_PACKAGE_NAME))) {
            throw new \Exception("Config ({$config}.php) not found. Have you published it?");
        }

        return config(
            implode('.', [Constants::CONFIG_PACKAGE_NAME, $string]),
            $default
        );
    }
}
