<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BakudaResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Validator;

class BakudaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api_bakuda');
    }
    public function profile(){
       
        $user = Auth::guard('api_bakuda')->user();
        return response()->json([
            'status'=> true,
            'message'=>"profile tampil",
            'data'=> new BakudaResource($user)
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
        'data'=> new BakudaResource($user)
    ], 200);
   }

}
