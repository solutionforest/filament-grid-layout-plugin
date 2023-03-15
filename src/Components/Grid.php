<?php

namespace SolutionForest\GridLayoutPlugin\Components;

use Closure;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\Str;

class Grid extends ViewComponent
{
    protected string $view = 'components.grid';

    /** @var Grid\Row[]*/
    protected array $rows = [];

    public static function make(): static
    {
        $result = app(static::class);

        $result->configure();

        return $result;
    }

    /**
     * @param Grid\Row[]|\Livewire\Component[]|\Illuminate\View\Component[]|\Livewire\Component|\Illuminate\View\Component|string|Closure $schema
     */
    public function schema(array|\Livewire\Component|\Illuminate\View\Component|string|Closure $schema): static
    {
        if (is_array($schema)) {
            foreach ($schema as $item) {
                if ($item instanceof Grid\Row) {

                    $this->addRow($item);
                } else {

                    $this->row($item);
                }
            }
        } else {
            $this->row($schema);
        }

        return $this;
    }

    public function row(\Livewire\Component|\Illuminate\View\Component|string|Closure $callback): static
    {
        if ($callback instanceof Closure) {

            $row = Grid\Row::make();

            call_user_func($callback, $row);

            $this->addRow($row);
        } else if (is_string($callback)) {

            $this->addRow(Grid\Row::make()->column(12, Str::of($callback)->toHtmlString()));
        } else {

            $this->addRow(Grid\Row::make()->column(12, $callback));
        }

        return $this;
    }

    protected function addRow(Grid\Row $row): static
    {
        array_push($this->rows, $row);

        return $this;
    }

    /**
     * @return Grid\Row[]
     */
    public function getRows(): array
    {
        return $this->rows;
    }
}
