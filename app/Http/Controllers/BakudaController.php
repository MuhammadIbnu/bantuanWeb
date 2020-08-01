<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bakuda;
use Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BakudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $bakuda = Bakuda::paginate(5);
        $fillterKeyword =$request->get('keyword');
        if ($fillterKeyword) {
            # code...
            $bakuda = Bakuda::where('nama','LIKE',"%$fillterKeyword%")->paginate(5);
        }
        return view('bakuda.index',compact('bakuda'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bakuda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'username'=>'required|max:100|unique:bakuda',
            'nama'=>'required|max:255',
            'api_token'=>'max|80'
        ]);
            $petugas = new Bakuda();
            $petugas->username = $request->username;
            $petugas->nama = $request->nama;
            $petugas->password = \Hash::make($request->username);
            $petugas->api_token = Str::random(80);
            $petugas->save();
        
            

        return redirect()->route('bakuda.index')->with('status','petugas bakuda berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bakuda= Bakuda::findOrfail($id);
        return view('bakuda.edit',compact('bakuda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $bakuda= Bakuda::findOrfail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'nama' => 'required|max:255',
            'password'=>'required|max:255'
        ]);
        if ($validasi->fails()) {
            # code...
            return redirect()->route('bakuda.edit')->withErrors($validasi);
        }
        if ($request->input('password')) {
            # code...
            $data['password']=password_hash($request->input('password'),PASSWORD_DEFAULT);
        } else {
            # code...
            $data=Arr::except($data['password']);
        }
        $bakuda->update($data);
        return redirect()->route('bakuda.index')->with('status','petugas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Bakuda::findOrfail($id);
        $data->delete();
        return redirect()->route('bakuda.index')->with('status','akun berhasil dihapus');
    }

    public function reset(Bakuda $bakuda){
        $bakuda->password = bcrypt($bakuda->username);
        $bakuda->update();
        return redirect()->route('bakuda.index')->with('status','akun dinkes berhasil direset');
    }
}
