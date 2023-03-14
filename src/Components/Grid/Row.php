<?php

namespace SolutionForest\GridLayoutPlugin\Components\Grid;

use Closure;
use Filament\Support\Components\ViewComponent;
use Illuminate\Support\HtmlString;
use SolutionForest\GridLayoutPlugin\Components;

class Row extends ViewComponent
{
    protected string $view = 'components.grid.row';

    /** @var Components\Grid\Column[] */
    protected array $columns = [];

    /**
     * @param Components\Grid\Column[]|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public function __construct(array|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema = null)
    {
        if ($schema) {

            $this->schema($schema);
        }

        $this->configure();
    }

    /**
     * @param Components\Grid\Column[]|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public static function make(array|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema = null): static
    {
        return app(static::class, ['schema' => $schema]);
    }

    /**
     * @param Components\Grid\Column[]|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public function schema(array|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema): static
    {
        if (is_array($schema)) {

            foreach ($schema as $item) {

                $this->addColumn($item);
            }
        } else {

            $this->column(12, $schema);
        }

        return $this;
    }

    public function column(array|int|null $columnSpan = 12, \Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $callback): static
    {
        if ($callback instanceof Closure) {

            $column = Components\Grid\Column::make($columnSpan);

            call_user_func($callback, $column);

            $this->addColumn($column);

        } else {

            $this->addColumn(Components\Grid\Column::make($columnSpan, $callback));
        }

        return $this;
    }

    protected function addColumn(Components\Grid\Column $column): static
    {
        array_push($this->columns, $column);

        return $this;
    }

    /**
     * @return Components\Grid\Column[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }
}
