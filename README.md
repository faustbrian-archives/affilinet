# Affilinet PHP

[![Build Status](https://img.shields.io/travis/plients/Affilinet-PHP-Client/master.svg?style=flat-square)](https://travis-ci.org/plients/Affilinet-PHP-Client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/plients/affilinet.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/plients/Affilinet-PHP-Client.svg?style=flat-square)](https://github.com/plients/Affilinet-PHP-Client/releases)
[![License](https://img.shields.io/packagist/l/plients/Affilinet-PHP-Client.svg?style=flat-square)](https://packagist.org/packages/plients/Affilinet-PHP-Client)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require plients/affilinet-php
```

## Usage

```php
$client = new Plients\Affilinet\Client($username, $password);

$response = $client->service('product')->getShopList($parameters);

if($response->hasErrors()) {
    dd($response->errors());
} else {
    dd($response->body());
}
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://basecode.sh)
