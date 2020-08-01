<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li>
      <a href="{{route('home')}}">
        <i class="fa fa-th"></i> <span>home</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Kontrol Akun</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li ><a href="{{route('petugas.index')}}"><i class="fa fa-circle-o"></i> pegawai disdukcapil</a></li>
          <li ><a href="{{route('dinkes.index')}}"><i class="fa fa-circle-o"></i> pegawai dinkes</a></li>
          <li ><a href="{{route('bakuda.index')}}"><i class="fa fa-circle-o"></i> pegawai bakuda</a></li>
      </ul>
    </li>
    <li>
      <a  href="{{route('aktivitas.index')}}">
      <i class="fa fa-th"></i> <span>activitas petugas</span>
      </a>
    </li>
    <li>
      <a href="{{route('report_data')}}">
        <i class="fa fa-th"></i> <span>report pengesahan data</span>
      </a>
    </li>
  </ul>