# Affili.net PHP SDK

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/affilinet-php-sdk
```

## Usage

```php
$client = new BrianFaust\Affilinet\Client($username, $password);

$response = $client->service('product')->getShopList($parameters);

if($response->hasErrors()) {
    dd($response->errors());
} else {
    dd($response->body());
}
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.de. All security vulnerabilities will be promptly addressed.

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.de)
