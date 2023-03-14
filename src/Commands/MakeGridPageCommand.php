<?php

namespace SolutionForest\GridLayoutPlugin\Commands;

use Filament\Support\Commands\Concerns\CanManipulateFiles;
use Filament\Support\Commands\Concerns\CanValidateInput;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeGridPageCommand extends Command
{
    use CanManipulateFiles;
    use CanValidateInput;

    protected $signature = "make:filament-grid-page {name?}";

    public $description = 'Creates a Filament grid page class';

    public function handle(): int
    {
        $path = config('filament.pages.path', app_path('Filament/Pages/'));
        $namespace = config('filament.pages.namespace', 'App\\Filament\\Pages');

        $page = (string) Str::of($this->argument('name') ?? $this->askRequired('Name (e.g. `Settings`)', 'name'))
            ->trim('/')
            ->trim('\\')
            ->trim(' ')
            ->replace('/', '\\');
        $pageClass = (string) Str::of($page)->afterLast('\\');
        $pageNamespace = Str::of($page)->contains('\\') ?
            (string) Str::of($page)->beforeLast('\\') :
            '';

        $path = (string) Str::of($page)
            ->prepend('/')
            ->prepend($path)
            ->replace('\\', '/')
            ->replace('//', '/')
            ->append('.php');

        $this->copyStubToApp('GridPage', $path, [
            'class' => $pageClass,
            'namespace' => $namespace . ($pageNamespace !== '' ? "\\{$pageNamespace}" : ''),
        ]);

        $this->info("Successfully created {$page}!");

        return static::SUCCESS;
    }
}
