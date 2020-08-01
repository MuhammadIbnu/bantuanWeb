<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dinkes;
use Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class DinkesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dinkes = Dinkes::paginate(5);
        $filterKeyword = $request->get('keyword');
        if($filterKeyword){
            $dinkes= Dinkes::where('nama','LIKE',"%$filterKeyword%")->paginate(5);
        }
        return view('dinkes.index',compact('dinkes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dinkes.create');
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
            'username'=>'required|min:6|max:100|unique:dinkes',
            'nama'=>'required|max:255',
            'api_token'=>'max|80'
        ]);
            $petugas = new Dinkes();
            $petugas->username = $request->username;
            $petugas->nama = $request->nama;
            $petugas->password = \Hash::make($request->username);
            $petugas->api_token = Str::random(80);
            $petugas->save();
        
            return redirect()->route('dinkes.index')->with('status','petugas dinkes berhasil ditambah, password default username');
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
        $dinkes = Dinkes::findOrfail($id);
        return view('dinkes.edit',compact('dinkes'));
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
        $dinkes = Dinkes::findOrfail($id);
        $data = $request->all();
        
        $validasi= Validator::make($data,[
            'nama'=>'required|max:255',
        ]);

        if ($validasi->fails()) {
            # code...
            return redirect()->route('dinkes.edit')->withErrors($validasi);
        }
       
        $dinkes->update($data);
        return redirect()->route('dinkes.index')->with('status','petugas berhasil di edit');
        
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
        $data=Dinkes::findOrfail($id);
        $data->delete();
        return redirect()->route('dinkes.index')->with('status','akum berhasil di hapus');
    }

    public function reset(Dinkes $dinkes){
        $dinkes->password = bcrypt($dinkes->username);
        $dinkes->update();
        return redirect()->route('dinkes.index')->with('status','akun dinkes berhasil direset');
    }
}
