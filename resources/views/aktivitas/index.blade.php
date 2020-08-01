@extends('layouts.template')

@section('title')
    Data AKtivitas Petugas
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @if (Request::get('keyword'))
                        <a href="{{route('aktivitas.index')}}" class="btn btn-success">Back</a>
                    @endif
                    <form action="{{route('aktivitas.index')}}" method="get">
                        <div class="fore-group">
                            <label for="keyword" class="col-sm-2 control-label">Search By name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                            </div>
                        </div>
                    </form>
                   
                </div>
                <div class="box-body">
                    @if (Request::get('keyword'))
                        <div class="alert alert-success alert-black">hasil pencarian dangan keyword: <b>{{Request::get('keyword')}}</b></div>
                    @endif
                        @include('alert.success')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama pengaju</th>
                                <th>Tanggal pengajuan</th>
                                <th>Status berkas</th>
                                <th>Petugas</th>
                                <th width="30%">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aktivitas as $row)
                                <tr>
                                    <td>{{$loop->iteration + ($aktivitas->perPage() *($aktivitas->currentPage()-1))}} </td>
                                    <td>{{$row->waris->nama}}</td>
                                    <td>{{$row->created_at->format('d/m/Y')}}</td>
                                    <td>@if ($row->confirmed_I === true)
                                        <button type="button" class="label label-success">Diterima</button> 
                                        @elseif($row->confirmed_I === null)
                                        <button type="button" class="btn btn-warning">Sedang dievaluasi</button>  
                                        @else
                                        <button type="button" class="btn btn-danger">ditolak</button>
                                    @endif</td>
                                    <td>{{$row->petugas->nama}}</td>
                                    <td>
                                        <a href="{{route('aktivitas.show',[$row->kd_berkas])}}" class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$aktivitas->appends(Request::All())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection