@props([
    'row' => null,
    'columns' => [],
])
@php
    $components = $row?->getColumns() ?? [];
@endphp
<!-- row -->
<x-filament-support::grid 
    :default="$columns['default'] ?? 12" 
    :sm="$columns['sm'] ?? null" 
    :md="$columns['md'] ?? null" 
    :lg="$columns['lg'] ?? 12" 
    :xl="$columns['xl'] ?? null"
    :two-xl="$columns['2xl'] ?? null" 
    class="gap-4 lg-gap-8"
    >
    @foreach ($components as $column)
        <x-grid-layout-plugin::grid.column :column="$column" />
    @endforeach
</x-filament-support::grid>
