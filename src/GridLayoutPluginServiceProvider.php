<?php

namespace SolutionForest\GridLayoutPlugin;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class GridLayoutPluginServiceProvider extends PluginServiceProvider
{
    public static string $name = 'grid-layout-plugin';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-grid-layout-plugin' => __DIR__.'/../resources/dist/grid-layout-plugin.css',
    ];

    protected array $scripts = [
        'plugin-grid-layout-plugin' => __DIR__.'/../resources/dist/grid-layout-plugin.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-grid-layout-plugin' => __DIR__ . '/../resources/dist/grid-layout-plugin.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
