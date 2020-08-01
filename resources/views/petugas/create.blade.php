@extends('layouts.template')
@section('title')
    tambah data petugas
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border"> 
                      @include('alert.error')
                </div>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{route('petugas.store')}}">
                        {{csrf_field()}}
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">UserName</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="minimal 6 karakter tanpa spasi" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,12}$" class="form-control" id="username" name="username" value="{{old('username')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama Petugas</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Tulis Nama" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Tulis Password" class="form-control" id="password" name="password" value="">
                                </div>
                            </div> --}}

                           
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection