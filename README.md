# Grid Layout Plugin

[![Latest Version on Packagist](https://img.shields.io/packagist/v/solution-forest/grid-layout-plugin.svg?style=flat-square)](https://packagist.org/packages/solution-forest/grid-layout-plugin)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/solution-forest/grid-layout-plugin/run-tests?label=tests)](https://github.com/solution-forest/grid-layout-plugin/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/solution-forest/grid-layout-plugin/Check%20&%20fix%20styling?label=code%20style)](https://github.com/solution-forest/grid-layout-plugin/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/solution-forest/grid-layout-plugin.svg?style=flat-square)](https://packagist.org/packages/solution-forest/grid-layout-plugin)

This is a grid layout plugin for Filament Admin

## Installation

You can install the package via composer:

```bash
composer require solution-forest/grid-layout-plugin
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="grid-layout-plugin-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="grid-layout-plugin-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$grid-layout-plugin = new SolutionForest\GridLayoutPlugin();
echo $grid-layout-plugin->echoPhrase('Hello, SolutionForest!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Carly](https://github.com/n/a)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
