@extends('layouts.template')

@section('title')
    Data Pengajuan
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="{{route('aktivitas.index')}}" class="btn btn-success">Back</a>
                </div>
                <div class="box-body">
                   <table class="table table-bordered">
                       <tr>
                           <td>nik ahli waris</td>
                           <td>:</td>
                           <td>{{$aktivitas->waris->nik}}</td>
                       </tr>
                        <tr>
                            <td>kk ahlis waris</td>
                            <td>:</td>
                            <td>{{$aktivitas->waris->kk}}</td>
                        </tr>
                        <tr>
                            <td>nama ahli waris</td>
                            <td>:</td>
                            <td>{{$aktivitas->waris->nama}}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{$aktivitas->waris->jk}}</td>
                        </tr>
                        <tr>
                            <td>Berkas</td>
                            <td>:</td>
                            <td>
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->ktp_meninggal)}}" target="_blank">
                                                <img src="{{asset($aktivitas->ktp_meninggal)}}" alt="Lights" style="width:100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->kk_meninggal)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->kk_meninggal)}}" alt="Nature" style="width:100%">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->jamkesmas)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->jamkesmas)}}" alt="Fjords" style="width:100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                            <a href="{{asset($aktivitas->ktp_waris)}}" target="_blank">
                                                <img src="{{asset($aktivitas->ktp_waris)}}" alt="Fjords" style="width:100%">
                                            </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                            <a href="{{asset($aktivitas->kk_waris)}}" target="_blank">
                                                <img src="{{asset($aktivitas->kk_waris)}}" alt="Lights" style="width:100%">
                                            </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->akta_kematian)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->akta_kematian)}}" alt="Nature" style="width:100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->pakta_waris)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->pakta_waris)}}" alt="Nature" style="width:100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->pernyataan_ahli_waris)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->pernyataan_ahli_waris)}}" alt="Nature" style="width:100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="{{asset($aktivitas->buku_tabungan)}}" target="_blank">
                                                    <img src="{{asset($aktivitas->buku_tabungan)}}" alt="Nature" style="width:100%">
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>pengecekan Data Masuk</td>
                            <td>:</td>
                            <td>@if ($aktivitas->confirmed_I === true)<button type="button" class="btn btn-primary"> Sukses </button> 
                                @elseif($aktivitas->confirmed_I === null)<button type="button" class="btn btn-warning"> sedang divalidasi </button>
                                @else <button type="button" class="btn btn-danger"> gagal </button>  
                                @endif</td>
                        </tr>
                        <tr>
                            <td>pengecekan dinas sosial</td>
                            <td>:</td>
                            <td>@if ($aktivitas->confirmed_II == true)<button type="button" class="btn btn-primary"> Sukses </button>
                                @elseif($aktivitas->confirmed_II === null)<button type="button" class="btn btn-warning"> sedang divalidasi </button> 
                                @else <button type="button" class="btn btn-danger"> Belum </button>  
                                @endif</td>
                        </tr>
                        <tr>
                            <td>Pengesahan</td>
                            <td>:</td>
                            <td>@if ($aktivitas->confirmed_III == true)<button type="button" class="btn btn-primary"> Sukses </button>
                                @elseif($aktivitas->confirmed_III === null)<button type="button" class="btn btn-warning"> sedang divalidasi </button> 
                                @else <button type="button" class="btn btn-danger"> belum </button>  
                            @endif</td>
                        </tr>
                        <tr>
                            <td>Pencairan dana</td>
                            <td>:</td>
                            <td>@if ($aktivitas->confirmed_IV == true)<button type="button" class="btn btn-primary"> Dana Cair </button>
                                @elseif($aktivitas->confirmed_IV === null)<button type="button" class="btn btn-warning"> sedang divalidasi </button> 
                                @else <button type="button" class="btn btn-danger"> belum </button>  
                            @endif</td>
                        </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection