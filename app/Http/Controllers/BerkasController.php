<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Data;
use App\Waris;
use Carbon\Carbon;

class BerkasController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        global $report_data;
        $report_data = Data::where('confirmed_IV','true')->orderBy('updated_at','DESC')->paginate(20);
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        if ($start_date !="" && $end_date !="") {
            # code...
            $report_data=Data::whereBetween('updated_at',[$start_date,$end_date])->orderBy('updated_at','DESC')->where('confirmed_III','1')->paginate(20);
            $start_date = \Carbon\Carbon::parse($start_date)->format('d-F-Y');
            $end_date = \Carbon\Carbon::parse($end_date)->format('d-F-Y');
            
        }
        // $pdf =PDF::loadview('report_data.data_pdf',compact('report_data'));
        // return $pdf->stream();
        return view('report_data.index',compact('report_data','start_date','end_date'));
    }

    public function cetak_pdf(Request $request){
        $start = Carbon::parse($request->start_date)->format('Y-m-d');
        $end = Carbon::parse($request->end_date)->format('Y-m-d');
        $report_data=Data::whereBetween('updated_at',[$start, $end])->orderBy('updated_at','DESC')->where('confirmed_IV','true')->paginate(20);
        $pdf =PDF::loadview('report_data.data',compact('report_data'));
        return $pdf->stream();
    }

   
    
}
