<?php

namespace App\DataTables;

use App\Models\OutLetter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;
use Carbon\Carbon;

class OutLettersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('entry', function($model) {
                return Carbon::parse($model->created_at)->translatedFormat('Y-m-d');
            })
            ->addColumn('action', function($model){ 
                if(Auth::user()->can('edit surat keluar') && Auth::user()->can('hapus surat keluar')) {
                    return '
                        <div class="d-flex gap-2">
                            <a href="'.route('out.edit', $model->id).'" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="'.route('out.destroy', $model->id).'" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    ';
                } else if(Auth::user()->can('edit surat keluar') && !Auth::user()->can('hapus surat keluar')) {
                    return '
                        <div class="d-flex gap-2">
                            <a href="'.route('out.edit', $model->id).'" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    ';
                }

                return '-';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(OutLetter $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('outletters-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->title('#')
                ->width(20),
            Column::make('letter_no')->title('No Surat'),
            Column::make('letter_date')->title('Tanggal Surat'),
            Column::make('entry')->title('Tanggal Entry'),
            Column::make('recipient')->title('Penerima'),
            Column::make('subject')->title('Perihal'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'OutLetters_' . date('YmdHis');
    }
}
