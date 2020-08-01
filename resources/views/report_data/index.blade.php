@extends('layouts.template')

@section('title')
   Report Data 
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    @if( Request::get('start_date') != "" && Request::get('end_date') != "")
                    <a class="btn btn-success"  href="{{ route('report_data') }}">Back</a>
                    @endif
                    <br/>
                    <br/>
                    <form method="get" action="{{route('report_data')}}">
                        <div class="form-group">
                        <label for="nama_produk" class="col-sm-2 control-label">Search By Date</label>
                        <div class="col-sm-4">
                        <input type="text" readonly name="start_date" value="{{$start_date}}" placeholder="Start Date" class="form-control datepicker"/>
                        </div>
                        <div class="col-sm-4">
                        <input type="text" readonly name="end_date" value="{{$end_date}}" placeholder="Finish Date" class="form-control datepicker"/>
                        </div>
                        <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                        </div>
                    </form>

                    <form method="get" action="{{route('cetak_pdf')}}" target="_blank">
                        <input type="hidden" name="start_date" value="{{$start_date}}"/>
                            <input type="hidden" name="end_date" value="{{$end_date}}"/>
                            <button type="submit" class="btn btn-success">PDF</button>
                    </form>
                </div>
                <div class="box-body">
                    @if( Request::get('start_date') != "" && Request::get('end_date') != "")
                    <div class="alert alert-success alert-block">
                    Hasil Pencarian Transaksi Masuk Dari Tanggal :  {{ $start_date }} s/d  {{$end_date}} 
                    </div>            
                    @endif
                    @include('alert.success')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nik</th>
                                <th>KK</th>
                                <th>Nama</th>
                                <th>Tanggal Pengesahan</th>
                                <th>Status berkas</th>
                                <th width="30%">Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report_data as $row)
                                <tr>
                                    <td>{{$loop->iteration + ($report_data->perPage() *($report_data->currentPage()-1))}} </td>
                                    <td>{{$row->waris->nik}}</td>
                                    <td>{{$row->waris->kk}}</td>
                                    <td>{{$row->waris->nama}}</td>
                                    <td>{{$row->updated_at->format('d/m/Y')}}</td>
                                    <td>@if ($row->confirmed_III == 1)<button type="button" class="btn btn-primary">sukses</button>   
                                    @endif</td>
                                    <td>{{$row->petugas->nama}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$report_data->appends(Request::All())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection