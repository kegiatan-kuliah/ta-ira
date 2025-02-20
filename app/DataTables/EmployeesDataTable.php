<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;

class EmployeesDataTable extends DataTable
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
            ->addColumn('email', function($model) {
                return $model->user->email;
            })
            ->addColumn('role', function($model) {
                return $model->user->role;
            })
            ->addColumn('action', function($model){ 
                if(Auth::user()->can('edit petugas') && Auth::user()->can('hapus petugas')) {
                    return '
                        <div class="d-flex gap-2">
                            <a href="'.route('employee.edit', $model->id).'" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="'.route('level.destroy', $model->id).'" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    ';
                } else if(Auth::user()->can('edit petugas') && !Auth::user()->can('hapus petugas')) {
                    return '
                        <div class="d-flex gap-2">
                            <a href="'.route('employee.edit', $model->id).'" class="btn btn-info">
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
    public function query(Employee $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('employees-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('identity_no')->label('NIP'),
            Column::make('rank'),
            Column::make('role')->label('Hak Akses'),
            Column::make('phone_no')->label('No HP'),
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
        return 'Employees_' . date('YmdHis');
    }
}
