<html>
<head>
	<title>Laporan</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Daftar Pengesahan Bantuan Uang Duka Kota Tegal</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>nomor nik</th>
				<th>nomor kk</th>
				<th>nama</th>
				<th>Tanggal pengesahan data</th>
				<th>Pengesahan data</th>
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
				<td>@if ($row->confirmed_III == 1)<i>sukses</if>   
                    @endif</td>
                <td>{{$row->petugas->nama}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>