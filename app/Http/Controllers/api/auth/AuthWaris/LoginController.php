<?php

namespace App\Http\Controllers\api\auth\AuthWaris;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Resources\WarisResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:waris')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nik'=>'required',
            'password' => 'required'
        ]);

        $credential = [
            'nik' => $request->nik,
            'password' => $request->password,
        ];

       
            if(Auth::guard('waris')->attempt($credential)){
                $user = Auth::guard('waris')->user();
                return response()->json([
                    'status' => true,
                    'message' => 'berhasil login',
                    'data' => new WarisResource($user)
                ], 201);
            }
    
            return response()->json([
                'status'=>false,
                'message'=> "Login Gagal",
                'data'=>(object) []
            ], 401);
    
       
    }
}
