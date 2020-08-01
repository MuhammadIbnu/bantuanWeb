<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DinkesResource;
use Auth;
use Validator;

class DinkesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api_dinkes');
    }
    public function profile(){
       
        $user = Auth::guard('api_dinkes')->user();
        return response()->json([
            'status'=> true,
            'message'=>"profile tampil",
            'data'=> new DinkesResource($user)
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
        'data'=> new DinkesResource($user)
    ], 200);
   }
}
