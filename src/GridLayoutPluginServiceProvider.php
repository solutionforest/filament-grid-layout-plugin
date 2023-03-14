<?php

namespace SolutionForest\GridLayoutPlugin;

use Filament\PluginServiceProvider;
use SolutionForest\GridLayoutPlugin\Commands;
use SolutionForest\GridLayoutPlugin\Components;
use SolutionForest\GridLayoutPlugin\Pages;
use Spatie\LaravelPackageTools\Package;

class GridLayoutPluginServiceProvider extends PluginServiceProvider
{
    public static string $name = 'grid-layout-plugin';

    protected array $widgets = [
        // 
    ];

    protected array $styles = [
        //
    ];

    protected array $scripts = [
        //
    ];

    protected array $beforeCoreScripts = [
        //
    ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasViews();
    }

    protected function getCommands(): array
    {
        return [
            Commands\MakeGridPageCommand::class,
        ];
    }
}
