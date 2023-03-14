<?php

namespace SolutionForest\GridLayoutPlugin\Components\Grid;

use Closure;
use Filament\Support\Components\ViewComponent;
use Filament\Tables\Table;
use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;
use SolutionForest\GridLayoutPlugin\Components;

class Column extends ViewComponent
{
    protected string $view = 'components.grid.column';

    protected ?array $columnSpan = [];

    protected array $components = [];

    /**
     * @param array|int|null $columnSpan
     * @param \Livewire\Component[]|\Illuminate\View\Component[]|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public function __construct(array|int|null $columnSpan = 2, array|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema = null)
    {
        $this->columnSpan($columnSpan);

        if ($schema) {

            $this->schema($schema);
        }

        $this->configure();
    }

    /**
     * @param array|int|null $columnSpan
     * @param \Livewire\Component[]|\Illuminate\View\Component[]|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public static function make(array|int|null $columnSpan = 2, array|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema = null): static
    {
        return app(static::class, ['columnSpan' => $columnSpan, 'schema' => $schema]);
    }

    /**
     * @param \Livewire\Component[]|\Illuminate\View\Component[]|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure $schema
     */
    public function schema(array|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure $schema): static
    {
        if (is_array($schema)) {

            foreach ($schema as $item) {

                $this->row($item);
            }
        } else {

            $this->row($schema);
        }

        return $this;
    }

    public function row(Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure $component): static
    {
        if ($component instanceof Closure) {

            $row = Components\Grid\Row::make();

            call_user_func($component, $row);

            $this->addComponent($row);
        } else {

            $this->addComponent($component);
        }

        return $this;
    }

    protected function columnSpan(array|int|null $columnSpan = 2): static
    {
        if (! is_array($columnSpan)) {
            $columnSpan = [
                'lg' => $columnSpan,
            ];
        }

        $this->columnSpan = array_merge($this->columnSpan ?? [], $columnSpan);

        return $this;
    }

    protected function addComponent(\Livewire\Component|\Illuminate\View\Component|Components\Grid\Row|HtmlString $component): static
    {
        array_push($this->components, $component);

        return $this;
    }

    public function getGridColumns(): ?array
    {
        return $this->columnSpan;
    }

    public function getComponents()
    {
        return array_map(function ($component) {
            if ($component instanceof Table ||
                $component instanceof Widget ||
                $component instanceof Components\Grid\Row ||
                $component instanceof HtmlString ||
                is_null($component)
            ) {
                return $component;
            }
            else {
                return $component->render();
            }
        }, $this->components);
    }
}
