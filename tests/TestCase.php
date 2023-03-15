<?php

namespace SolutionForest\GridLayoutPlugin\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use SolutionForest\GridLayoutPlugin\GridLayoutPluginServiceProvider;


class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            GridLayoutPluginServiceProvider::class
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
