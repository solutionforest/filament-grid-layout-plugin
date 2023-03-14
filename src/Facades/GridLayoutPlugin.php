<?php

namespace SolutionForest\GridLayoutPlugin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SolutionForest\GridLayoutPlugin\GridLayoutPlugin
 */
class GridLayoutPlugin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SolutionForest\GridLayoutPlugin\GridLayoutPlugin::class;
    }
}
