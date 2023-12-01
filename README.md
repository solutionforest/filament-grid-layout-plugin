> [!IMPORTANT]
> We will archive this project since filament3 supports Grid now.
> https://beta.filamentphp.com/docs/3.x/infolists/layout/grid

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

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="grid-layout-plugin-views"
```

## Usage

To create grid layout page :
```bash
php artisan make:filament-grid-page
```
The `getGridSchema()` method is used to define the structure of grid layout. It is an array of fields, in the order they should appear in the layout.


The following components are available for grid layout:
<ul>
    <li>\SolutionForest\GridLayoutPlugin\Components\Grid\Row</li>
    <li>\Livewire\Component</li>
    <li>\Illuminate\View\Component</li>
    <li>\Illuminate\Support\HtmlString</li>
</ul>

```php
use SolutionForest\GridLayoutPlugin\Pages\Grid as BasePage;
use SolutionForest\GridLayoutPlugin\Components\Grid;
use SolutionForest\GridLayoutPlugin\Components\Grid\Row;
use SolutionForest\GridLayoutPlugin\Components\Grid\Column;

protected function getGridSchema(): array
{
    return [
        Components\Grid\Row::make([
            Components\Grid\Column::make(
                6,
                \Filament\Widgets\StatsOverviewWidget\Card::make('Revenue', '$192.1k')
                    ->description('32k increase')
                    ->descriptionIcon('heroicon-s-trending-up')
                    ->chart([7, 2, 10, 3, 15, 4, 17])
                    ->color('success'),
            ),
            Components\Grid\Column::make(
                6,
                \Filament\Widgets\StatsOverviewWidget\Card::make('Revenue', '$192.1k')
                    ->description('3% decrease')
                    ->descriptionIcon('heroicon-s-trending-down')
                    ->chart([17, 16, 14, 15, 14, 13, 12])
                    ->color('danger')
            ),
        ]),
        \Filament\Widgets\StatsOverviewWidget\Card::make('Revenue', '$192.1k')
            ->description('7% increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([15, 4, 10, 2, 12, 4, 12])
            ->color('success'),
        new \Illuminate\Support\HtmlString("<div>Dummy Html Element</div>"),
        view('welcome'),
    ];
}
```

Or you can create grid layout which only support widgets similar with `\Filament\Pages\Dashboard`:

```bash
php artisan make:filament-grid-page --type=widget
```

```php
protected function getWidgets(): array
{
    return [
        \Filament\Widgets\AccountWidget::class,
        \Filament\Widgets\FilamentInfoWidget::class,
    ];
}
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
