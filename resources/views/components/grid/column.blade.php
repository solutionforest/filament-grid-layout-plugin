@props([
    'column' => null,
])
@php
    $columns = $column?->getGridColumns() ?? [];
    $components = $column?->getComponents() ?? [];
@endphp
<x-filament-support::grid.column 
    :default="$columns['default'] ?? 12" 
    :sm="$columns['sm'] ?? null" 
    :md="$columns['md'] ?? null" 
    :lg="$columns['lg'] ?? null"
    :xl="$columns['xl'] ?? null" 
    :two-xl="$columns['2xl'] ?? null"
    @class([
        'grid gap-4 lg-gap-8' => in_array(\SolutionForest\GridLayoutPlugin\Components\Grid\Row::class, array_map(fn ($component) => get_class($component), $components))
    ])
    >
    @foreach ($components as $component)
        @if (!$component)
            <div></div>
        @elseif ($component instanceof \Filament\Widgets\Widget || $component instanceof \Filament\Tables\Table)
            @if ($component->canView())
                @livewire(\Livewire\Livewire::getAlias(get_class($component)))
            @endif
        @elseif ($component instanceof \SolutionForest\GridLayoutPlugin\Components\Grid\Row)
            <x-grid-layout-plugin::grid.row :row="$component" />
        @else
            {{ $component }}
        @endif
    @endforeach
</x-filament-support::grid.column>
