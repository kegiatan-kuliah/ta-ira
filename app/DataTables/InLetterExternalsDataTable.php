<?php

namespace App\DataTables;

use App\Models\InLetter;
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

class InLetterExternalsDataTable extends DataTable
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
            ->addColumn('category', function($model) {
                return $model->category->name ?? '-';
            })
            ->addColumn('level', function($model) {
                return $model->level->name ?? '-';
            })
            ->addColumn('entry', function($model) {
                return Carbon::parse($model->created_at)->translatedFormat('Y-m-d');
            })
            ->addColumn('action', function($model){
                if(isset($model->disposition)) {
                    $html = '<div class="d-flex gap-2">
                        <a href="'.route('disposition.print', $model->disposition->id).'" class="btn btn-info">
                            <i class="fas fa-print"></i>
                        </a>
                    ';
                    if(Auth::user()->can('edit surat masuk')) {
                        $html .= '<a href="'.route('in_ex.edit', $model->id).'" class="btn btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
                    }
                     if(Auth::user()->can('hapus surat masuk')) {
                        $html .= '<a href="'.route('in_ex.destroy', $model->id).'" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>';
                    }

                    $html .= '</div>';
    
                    return $html;
                } else {
                    $html = '<div class="d-flex gap-2">';
                    if(Auth::user()->can('disposisi surat masuk')) {
                        $html .= '<a href="'.route('disposition.new', $model->id).'" class="btn btn-info">
                                <i class="fas fa-share"></i>
                            </a>
                        ';
                    }
                    if(Auth::user()->can('edit surat masuk')) {
                        $html .= '<a href="'.route('in_ex.edit', $model->id).'" class="btn btn-info">
                            <i class="fas fa-pencil-alt"></i>
                        </a>';
                    }
                    if(Auth::user()->can('hapus surat masuk')) {
                        $html .= '<a href="'.route('in_ex.destroy', $model->id).'" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>';
                    }

                    $html .= '</div>';
    
                    return $html;
                    
                }
                return '-';
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(InLetter $model): QueryBuilder
    {
        if(Auth::user()->can('lihat semua surat masuk')) {
            return $model->where('type','OUT')->newQuery();
        } else {

            return $model->where('type','OUT')->whereHas('disposition', function ($query) {
                $query->where('employee_id', Auth::user()->employee->id);
            })->newQuery();
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('inletters-table')
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
            Column::make('sender')->title('Pengirim'),
            Column::make('subject')->title('Perihal'),
            Column::make('category')->title('Jenis'),
            Column::make('level')->title('Sifat'),
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
        return 'InLetters_' . date('YmdHis');
    }
}
