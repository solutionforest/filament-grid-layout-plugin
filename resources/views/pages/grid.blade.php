<x-filament::page :class="\Illuminate\Support\Arr::toCssClasses(['grid-layout-plugin-view-record-page'])">

    @if ($this->isFullWidth())
        <style>
            .filament-main-content {
                max-width: 100%
            }
        </style>
    @endif


    {{ $this->grid }}
</x-filament::page>
