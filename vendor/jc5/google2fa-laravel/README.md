# Google2FA for Laravel

This is a slightly edited version of [this package](https://packagist.org/packages/pragmarx/google2fa-laravel) by [Antonio Carlos Ribeiro](https://github.com/antonioribeiro). In this version of the package, the 2FA authentication state is stored in a table + cookie, so the 2FA state can survive the end of the session. 

**This package is not yet ready for production.**

I've chosen to remove most of the instructions from this readme, and I invite you to checkout the original readme file. I've done this to make sure that there won't be outdated instructions in this readme file.

<p align="center">
    <a href="https://packagist.org/packages/jc5/google2fa-laravel"><img alt="Latest Stable Version" src="https://img.shields.io/packagist/v/jc5/google2fa-laravel.svg?style=flat-square"></a>
    <a href="LICENSE"><img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square"></a>
    <a href="https://scrutinizer-ci.com/g/jc5/google2fa-laravel/?branch=master"><img alt="Code Quality" src="https://img.shields.io/scrutinizer/g/jc5/google2fa-laravel.svg?style=flat-square"></a>
    <a href="https://travis-ci.org/jc5/google2fa-laravel"><img alt="Build" src="https://img.shields.io/travis/jc5/google2fa-laravel.svg?style=flat-square"></a>
</p>
<p align="center">
    <a href="https://packagist.org/packages/jc5/google2fa-laravel"><img alt="Downloads" src="https://img.shields.io/packagist/dt/jc5/google2fa-laravel.svg?style=flat-square"></a>
    <a href="https://scrutinizer-ci.com/g/jc5/google2fa-laravel/?branch=master"><img alt="Coverage" src="https://img.shields.io/scrutinizer/coverage/g/jc5/google2fa-laravel.svg?style=flat-square"></a>
    <!--<a href="https://styleci.io/repos/94630851"><img alt="StyleCI" src="https://styleci.io/repos/94630851/shield"></a>-->
    <a href="https://travis-ci.org/jc5/google2fa-laravel"><img alt="PHP" src="https://img.shields.io/badge/PHP-7.3-brightgreen.svg?style=flat-square"></a>
</p>

### Google Two-Factor Authentication Package for Laravel

Google2FA is a PHP implementation of the Google Two-Factor Authentication Module, supporting the HMAC-Based One-time Password (HOTP) algorithm specified in [RFC 4226](https://tools.ietf.org/html/rfc4226) and the Time-based One-time Password (TOTP) algorithm specified in [RFC 6238](https://tools.ietf.org/html/rfc6238).

This package is a Laravel bridge to [Google2FA](https://github.com/antonioribeiro/google2fa)'s PHP package.

The intent of this package is to create QRCodes for Google2FA and check user typed codes. If you need to create backup/recovery codes, please check below.

### Recovery/Backup codes

if you need to create recovery or backup codes to provide a way for your users to recover a lost account, you can use the [Recovery Package](https://github.com/antonioribeiro/recovery). 

## Documentation

Check the ReadMe file in the main [Google2FA](https://github.com/antonioribeiro/google2fa) repository.

## Tests

The package tests were written with [phpspec](http://www.phpspec.net/en/latest/).

## Author

[Antonio Carlos Ribeiro](http://twitter.com/iantonioribeiro) and [James Cole](https://github.com/jc5).

## License

Google2FA is licensed under the MIT License - see the `LICENSE` file for details

## Contributing

Pull requests and issues are more than welcome.
