<html>
<head>
    <title>Laporan </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<table align="center">
    <tr>
        <td><img src="https://3.bp.blogspot.com/-1IY6AO8ROAk/WlzLoJL7iiI/AAAAAAAAAjs/6al4o9a6J5QScWJCqKv3DGTdlcdDYXRZQCLcBGAs/s1600/logo%2Bkota%2Btegal%2Bhitam%2Bputih.jpg" width="70" height="70"></td>
        <td><center>
                <font size="4">PEMERINTAH KOTA TEGAL</font><BR>
                <font size="5"><b>DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</b></font><BR>
                <font size="2">Jl. Lele No.14 Tegal (0283) 353744 Fax.(0283) 356131</font><BR>
                <font size="2">TEGAL<BR></font>
            </center>
        </td>
    </tr>
    <tr>
        <td colspan="2"> <hr> </td>
    </tr>
</table>
<body>
<center>
    <font size="3"><b>Report Data Pengajuan</b></font>
</center>

<br>
<table id="example1"  class="table table-bordered dt-responsive nowrap"
       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>nomor nik</th>
            <th>nomor kk</th>
            <th>nama</th>
            <th>Tanggal pengesahan data</th>
            <th>Petugas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($report_data as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->waris->nik}}</td>
            <td>{{$row->waris->kk}}</td>
            <td>{{$row->waris->nama}}</td>
            <td>{{$row->updated_at->format('d/m/Y')}}</td>
            <td>{{$row->petugas->nama}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<table align=right border="0" cellpadding="1" style="width: 250px;">
    <tbody>
        <tr>
             <td valign="top">
                 
                     <div align="left">
                        <span style="font-size: x-small;">Tegal</span>
                     <span style="font-size: x-small;">{{now()->format('d-M-Y')}}</span>
                        <br>
                            <span style="font-size: x-small;">Kepala Dinas Penduduk dan Pencatatan Sipil Kota Tegal</span>
                    </div>
                
            <div align="left" style="margin: 50px "></div>
            <div align="left">
                    <span style="font-size: 12px;">E.Sulyati Dra,M.pd.</span></div>
            </td>   
        </tr>
    </tbody>
</body>
</html>