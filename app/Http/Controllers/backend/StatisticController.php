<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{

    public function viewStatisticKhachHang()
    {
       $data = DB::select('CALL proc_statisticKhachHangTheoTuoi()') ;
       $labels = array_column($data, 'age_group');
       $values = array_column($data, 'total');
        return view('backend.statistic.index',compact('labels', 'values')) ;
    }


    public function statisticKhachHang()
    {
        $data = DB::select('CALL proc_statisticKhachHang()') ;
        return response()->json($data);
    }

    public function  viewstatisticDoanhThu ()
    {
       $data = DB::select('CALL proc_statisticDoanhThu()');
       $tourLabels = array_column($data, 'tentour');
       $tourValues = array_column($data, 'soluong');

       $data = DB::select('CALL proc_statisticKhachHangTheoTuoi()');
       $ageLabels = array_column($data, 'age_group');
       $ageValues = array_column($data, 'total');
       return view('backend.statistic.statistic_doanhthu', compact('tourLabels', 'tourValues', 'ageLabels', 'ageValues'));
    }
}
