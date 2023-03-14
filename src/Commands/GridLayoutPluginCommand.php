<?php

namespace SolutionForest\GridLayoutPlugin\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class GridLayoutPluginCommand extends GeneratorCommand
{
    public $signature = 'grid-layout-plugin';

    protected $name = "make:filament-grid-page";

    public $description = 'Creates a Filament grid page class';


    protected function getStub(): string
    {
        return $this->resolveStubPath('/stubs/grid-layout-page.stub');
    }

    protected function resolveStubPath(string $stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\Filament\Pages";
    }
}
