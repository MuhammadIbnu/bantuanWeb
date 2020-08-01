<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SurveyResource;
use App\Survey;
use Auth;

class SurveyController extends Controller
{
    public function create(Request $request){
        $exist = Survey::where('kd_waris', auth()->user()->id)->first();
        if($exist) {
            $exist->delete();
        }
        $survey = new Survey();
        $survey->kd_waris = auth()->user()->id;
        $survey->nilai = $request->nilai;
        $survey->save();
    
        return response()->json([
            'status' => true,
            'message' => 'menilai',
            'data' => new SurveyResource($survey),
        ], 200);
    
    }

    public function index(){
        // $data = Survey::count('nilai');
        $surveys = Survey::all()->groupBy('nilai');
        $data = (array) null;
        foreach ($surveys as $key => $item) {
            $data[$key] = $item->count();
        }
        
        
        // return 
        return response()->json([
            'status'=>true,
            'message'=>'nilai',
            'data'=> $data
        ], 200);
    }
}
