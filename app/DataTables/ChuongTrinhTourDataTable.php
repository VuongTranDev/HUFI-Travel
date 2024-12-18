<?php

namespace App\DataTables;

use App\Models\ChuongTrinhTour;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;

use Yajra\DataTables\Html\Builder as HtmlBuilder;

class ChuongTrinhTourDataTable extends DataTable
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

            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('chuongtrinhtour.edit', $query->machuongtrinhtour) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='" . route('chuongtrinhtour.destroy', $query->machuongtrinhtour) . "' class='btn btn-danger ml-2 delete-item' data-id='{$query->machuongtrinhtour}'><i class='far fa-trash-alt'></i></a>";
                return $editBtn . $deleteBtn;
            })
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('d-m-Y'); // Định dạng ngày
            })

            ->editColumn('updated_at', function ($query) {
                return Carbon::parse($query->updated_at)->format('d-m-Y'); // Định dạng ngày
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ChuongTrinhTour $model): QueryBuilder
    {
        $tourid = request()->tour_id;
        return $model->newQuery()
        ->where('matour', $tourid)
        ->select('chuongtrinhtour.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('chuongtrinhtour-table')
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
            Column::computed('DT_RowIndex')
            ->title('STT')
            ->exportable(false)
            ->printable(false)
            ->width(30)
            ->addClass('text-center'),
            Column::make('tieude')->width(300)->title('Tiêu đề'),
            Column::make('ngay')->width(100)->title('Ngày'),
            Column::make('created_at')->width(150)->title('Ngày tạo'),
            Column::make('updated_at')->width(150)->title('Ngày cập nhật'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ChuongTrinhTour_' . date('YmdHis');
    }
}
