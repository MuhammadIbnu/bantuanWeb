<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PetugasResource;
use App\Http\Resources\BerkasResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Data;
use App\Waris;
use Validator;

class PetugasController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:api_petugas');
    }
    public function profile(){
       
        $user = Auth::guard('api_petugas')->user();
        return response()->json([
            'status'=> true,
            'message'=>"profile tampil",
            'data'=> new PetugasResource($user)
        ], 200);
   }

   public function update(Request $request){
    $user = Auth::user();
    $rules = [
        'password' => 'required|min:8'
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) {
        # code...
        return response()->json([
            'status'=> false,
            'message' => $validator->errors()
        ], 400);
    }
    $user ->password = bcrypt($request->password);
    $user->update();
    return response()->json([
        'status' => true,
        'message' => 'berhasil Update',
        'data'=> new PetugasResource($user)
    ], 200);
   }

//    public function search(Request $request){
//        $data = $request->get('filter');
//        $waris = Data::where('kd_waris','like',"%$data%")->where('confirmed_I')->where('kd_berkas', auth()->user()->id)->get();
       
//            # code...
//            return response()->json([
//                'status'=> true,
//                'message' =>"ketemu",
//                 'data' => $waris,
//            ], 200);
       
//    }
}
