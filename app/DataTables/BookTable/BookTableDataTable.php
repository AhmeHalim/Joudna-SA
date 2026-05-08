<?php

namespace App\DataTables\BookTable;

use App\Models\Website\BookTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BookTableDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('checkbox', function($row) {
                return '<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input type="checkbox" name="checkbox" class="form-check-input" value="' . $row->id . '" />
                </div>';
            })

            ->addColumn('actions', fn($row) => $this->renderActions($row))

            ->rawColumns(['checkbox', 'actions']);
    }

    public function query(BookTable $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('book-tables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->parameters([
                'scrollX' => true,
                'order'   => [[0, 'desc']],
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('checkbox')->title('<div class="form-check form-check-sm form-check-custom form-check-solid me-3"><input class="form-check-input" type="checkbox" id="checkAll" /></div>')->orderable(false)->searchable(false),
            Column::make('id')->title(__('dash.id')),
            Column::make('name')->title(__('dash.name')),
            Column::make('email')->title(__('dash.email')),
            Column::make('phone')->title(__('dash.phone')),
            Column::make('date')->title(__('home.book_date')),
            Column::make('time')->title(__('home.book_time')),
            Column::make('guests')->title(__('home.book_guests')),
            Column::make('message')->title(__('dash.message')),
            Column::make('created_at')->title(__('dash.created_at')),
            Column::make('actions')->title(__('dash.actions'))->orderable(false)->searchable(false),
        ];
    }

    protected function filename(): string
    {
        return 'BookTables_' . date('YmdHis');
    }

    private function renderActions($row): string
    {
        return '
            <div class="d-flex gap-2">
                <button type="button"
                    class="btn btn-sm btn-light-danger delete-btn"
                    data-id="' . $row->id . '"
                    data-url="' . route('book-tables.destroy') . '">
                    <i class="ki-outline ki-trash fs-4"></i>
                </button>
            </div>
        ';
    }
}
