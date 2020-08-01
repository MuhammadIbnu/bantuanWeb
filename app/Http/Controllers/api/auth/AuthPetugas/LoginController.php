<?php

namespace App\Http\Controllers\api\auth\AuthPetugas;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Resources\PetugasResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:petugas')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
        ];

       
            if(Auth::guard('petugas')->attempt($credential)){
                $user = Auth::guard('petugas')->user();
                return response()->json([
                    'status' => true,
                    'message' => 'berhasil login',
                    'data' => new PetugasResource($user) 
                ], 201);
            }
    
            return response()->json([
                'status'=> false,
                'message'=> "Login Gagal",
                'data'=>(object) []
            ], 401);
    
       
    }
}
