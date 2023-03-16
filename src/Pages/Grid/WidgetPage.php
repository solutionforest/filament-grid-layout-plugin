<?php

namespace SolutionForest\GridLayoutPlugin\Pages\Grid;

use Filament\Pages\Page;

abstract class WidgetPage extends Page
{
    protected static string $view = 'grid-layout-plugin::pages.grid.widgets';

    protected function getWidgets(): array
    {
        return [];
    }

    protected function getColumns(): int | array
    {
        return 2;
    }
}
