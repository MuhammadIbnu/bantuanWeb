@extends('layouts.template')
@section('title')
    Dashboard    
@endsection
@section('content')
<link rel="stylesheet" href="{{asset('chartjs/Chart.min.css')}}">
<script src="{{ asset('chartjs/Chart.min.js')}}"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Aktivasi User</span>
                        <span class="info-box-number">{{$waris}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-list-outline"></i></span>
                  
                        <div class="info-box-content">
                          <span class="info-box-text">Jumlah Pengajuan</span>
                        <span class="info-box-number">{{$data}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                  
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-person-outline"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Petugas Disdukcapil</span>
                        <span class="info-box-number">{{$petugas}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-person-outline"></i></span>
                  
                        <div class="info-box-content">
                          <span class="info-box-text">Petugas Dinkes</span>
                        <span class="info-box-number">{{$dinkes}}</span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                  </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
             <h3>Grafik Kecamatan</h3>         
      </div>
      <div class="box-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
             <h3>Data baru</h3>         
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th width="5%">No</th>
                  <th>Nama pengaju</th>
                  <th>Tanggal pengajuan</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($data_masuk as $row)
                  <tr>
                      <td>{{$loop->iteration + ($data_masuk->perPage() *($data_masuk->currentPage()-1))}} </td>
                      <td>{{$row->waris->nama}}</td>
                      <td>{{$row->created_at->format('d/m/Y')}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      {{$data_masuk->appends(Request::All())->links()}}
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
             <h3>Aktivasi Ahli Waris</h3>         
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th width="5%">No</th>
                  <th>Nama </th>
                  <th>Tanggal Aktivasi</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($aktivasi_baru as $row)
                  <tr>
                      <td>{{$loop->iteration + ($aktivasi_baru->perPage() *($aktivasi_baru->currentPage()-1))}} </td>
                      <td>{{$row->nama}}</td>
                      <td>{{$row->created_at->format('d/m/Y H:i:s')}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      {{$aktivasi_baru->appends(Request::All())->links()}}
      </div>
    </div>
  </div>
</div>
    

<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @php echo json_encode($kecamatan); @endphp,
      datasets: [{
        label: 'Grafik pengajuan',
        data: @php echo json_encode($jumlah_pengajuan); @endphp,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255,99,132,1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>

@endsection