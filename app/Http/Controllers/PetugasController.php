<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $petugas =Petugas::paginate(5);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            # code...
            $petugas = Petugas::where('nama','LIKE',"%$filterKeyword%")->paginate(5);
        }
        return view('petugas.index',compact('petugas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('petugas.create');
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
        
       $this->Validate($request,[
            'username'=>'required|max:100|',
            'nama'=>'required|max:255',
        ]);
        
        $petugas = new Petugas();
        $petugas->username = $request->username;
        $petugas->nama = $request->nama;
        $petugas->password = \Hash::make($request->username);
        $petugas->api_token = Str::random(80);
        $petugas->save();
        
         return redirect()->route('petugas.index')->with('status','petugas berhasil ditambah, password default username');
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
        $petugas = Petugas::findOrfail($id);
        return view('petugas.edit',compact('petugas'));
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
        $petugas= Petugas::findOrfail($id);
        $data = $request->all();

        $validasi = Validator::make($data,[
            'nama' => 'required|max:255',
        ]);
        if ($validasi->fails()) {
            # code...
            return redirect()->route('petugas.edit')->withErrors($validasi);
        }
        $petugas->update($data);
        return redirect()->route('petugas.index')->with('status','petugas berhasil di edit');
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
        $data= Petugas::findOrfail($id);
        $data->delete();
        return redirect()->route('petugas.index')->with('status','akun petugas berhasil di hapus');
    }
    
    public function reset(Petugas $petugas)
    {
        $petugas->password = bcrypt($petugas->username);
        $petugas->update();
        return redirect()->route('petugas.index')->with('status','akun petugas berhasil di reset');

    }
}
