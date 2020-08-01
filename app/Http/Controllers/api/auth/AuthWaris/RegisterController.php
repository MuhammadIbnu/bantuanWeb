<?php

namespace App\Http\Controllers\api\auth\AuthWaris;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Waris;
use Illuminate\Support\Str;

class RegisterController extends Controller
{   
    public function __construct()
    {
        $this->middleware('guest:api_waris');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|unique:waris',
            'kk' => 'required|unique:waris',
            'nama'=> 'required',
            'jk'=>'required',
            'tmpt_lhr'=>'required',
            'tgl_lhr'=>'required',
            'nama_ibu'=>'required',
            'nama_ayah'=>'required',
            'kota'=>'required',
            'kec'=>'required',
            'kel'=>'required',
            'alamat'=>'required',
            'rt'=>'required',
            'rw'=>'required',
        ]);

        $user = new Waris();
        $user->nik = $request->nik;
        $user->kk = $request->kk;
        $user->nama = $request->nama;
        $user->jk = $request->jk;
        $user->tmpt_lhr = $request->tmpt_lhr;
        $user->tgl_lhr = $request->tgl_lhr;
        $user->nama_ibu = $request->nama_ibu;
        $user->nama_ayah = $request->nama_ayah;
        $user->kota = $request->kota;
        $user->kec = $request->kec;
        $user->kel = $request->kel;
        $user->alamat = $request->alamat;
        $user->rt = $request->rt;
        $user->rw = $request->rw;
        $user->password = Hash::make($request->kk);
        $user->api_token = Hash::make($request->nik);
        $user->fcm_token = $request->fcm_token;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil register',
            'data' => $user,
        ], 201);

    }
}
