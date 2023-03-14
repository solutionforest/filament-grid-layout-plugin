@foreach ($getRows() as $row)
    <x-grid.row :row="$row" />
@endforeach
