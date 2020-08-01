<?php

namespace App\Http\Controllers\api\auth\AuthDinkes;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Resources\DinkesResource;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:dinkes')->except('logout');
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

       
            if(Auth::guard('dinkes')->attempt($credential)){
                $user = Auth::guard('dinkes')->user();
                return response()->json([
                    'status' => true,
                    'message' => 'berhasil login',
                    'data' => new DinkesResource($user) 
                ], 201);
            }
    
            return response()->json([
                'status'=> false,
                'message'=> "Login Gagal",
                'data'=> (object) []
            ], 401);
    
       
    }
}
