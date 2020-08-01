@extends('layouts.template')
@section('title')
    Edit data Petugas bakuda
    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border"> 
                      @include('alert.error')
                </div>
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{route('bakuda.update',[$bakuda->id])}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" disabled value="{{$bakuda->username}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_pegawai" class="col-sm-2 control-label">Nama Petugas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$bakuda->nama}}">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="tombol" class="btn btn-info pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection