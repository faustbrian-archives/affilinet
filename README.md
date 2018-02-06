# Affilinet PHP

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/affilinet-php
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

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to Brian Faust at hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
