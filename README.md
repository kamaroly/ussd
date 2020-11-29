# A Laravel package to work with USSD

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kamaro/ussd.svg?style=flat-square)](https://packagist.org/packages/kamaro/ussd)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/kamaro/ussd/run-tests?label=tests)](https://github.com/kamaro/ussd/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/kamaro/ussd.svg?style=flat-square)](https://packagist.org/packages/kamaro/ussd)


USSD (Unstructured Supplementary Service Data) is a Global System for Mobile Communications (GSM) protocol that is used to send text messages. USSD is similar to Short Message Service (SMS) with interractive flow between mobile phone and the back-end. USSD uses codes made up of the characters that are available on a mobile phone.

## Features

* Can create unlimited linked flows.
* Can consume API  flow display.
* Support multiple languages. 
* Support user profile. 
* Can do dynamic USSD.
* Can do Static USSD.
* Can do USSD Push.
* Collect and dump Ussd data to URL.

* Can bill per session 
* Can bill per period 


## Installation

You can install the package via composer:

```bash
composer require kamaro/ussd
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Kamaro\Ussd\UssdServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Kamaro\Ussd\UssdServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

``` php
$ussd = new Kamaro\Ussd();
echo $ussd->echoPhrase('Hello, Kamaro!');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kamaro](https://github.com/kamaroly)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
