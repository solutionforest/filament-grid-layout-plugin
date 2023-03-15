<?php

namespace SolutionForest\GridLayoutPlugin\Pages;

use SolutionForest\GridLayoutPlugin\Components;
use Filament\Pages\Page;

abstract class Grid extends Page
{
    protected static string $view = 'grid-layout-plugin::pages.grid';

    protected Components\Grid $grid;

    public function mount(): void
    {
        $this->grid = $this->getGrid();
    }

    public static function grid(Components\Grid $grid): Components\Grid
    {
        return $grid;
    }

    protected function getGridSchema(): array
    {
        return [];
    }

    protected function getGrid(): Components\Grid
    {
        $schema = $this->getGridSchema();

        if (count($schema) > 0) {
            return Components\Grid::make()
                ->schema($schema);
        }


        return static::grid(Components\Grid::make());
    }

    protected function isFullWidth(): bool
    {
        return false;
    }
}
