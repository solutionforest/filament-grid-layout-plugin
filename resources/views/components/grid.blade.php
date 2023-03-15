@foreach ($getRows() as $row)
    <x-grid-layout-plugin::grid.row :row="$row" />
@endforeach
