<?php

namespace SolutionForest\GridLayoutPlugin\Commands;

use Illuminate\Console\Command;

class GridLayoutPluginCommand extends Command
{
    public $signature = 'grid-layout-plugin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
