<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ADMINISTRATION OL | @yield('title')</title>
  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> --}}
  <!-- Favicon -->
  <link href="{{url('/assets')}}/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Icons -->
  <link href="{{url('/assets')}}/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="{{url('/assets')}}/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />

  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="{{url('/assets/datatables')}}/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="{{url('/assets/datatables')}}/Responsive-2.2.2/css/responsive.bootstrap4.min.css" />


  <!-- CSS Files -->
  <link href="{{url('/assets')}}/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />

  <style>


    .card-bagian{
      animation: bagian_animation 1s;
    }

    @keyframes bagian_animation{
      0%{transform: translateX(400%)}
      50%{transform: translateX(-10%)}
      100%{transform: translateX(0%)}
    }
    
    .date-animation{
      animation: date_animation 1s  infinite;
      color: beige;
      padding: 5px 10px;
      border-radius: 5px;
    }

    @keyframes date_animation{
      0%{background-color:#8c81d4}
      50%{background-color:#5441d1}
      100%{background-color:#8c81d4}
    }
  </style>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{url('')}}">
        <h1 class="">AD-O</h1>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="{{url('assets/img/users')}}/{{Auth::user()->image}}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Selamat Datang!</h6>
            </div>
            <a href="{{url('/user')}}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="{{url('user/ubah_password')}}" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Ubah Password</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{url('/')}}">
                <h1 class="text-primary"> AD-O</h1>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  @if($sidebar == 'Dashboard') active @endif" >
          <a class=" nav-link @if($sidebar == 'Dashboard') active @endif " href="{{url('')}}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item @if($sidebar == 'Karyawan') active @endif">
            <a class="nav-link @if($sidebar == 'Karyawan') active @endif" href="{{url('/karyawan')}}">
              <i class="ni ni-badge text-orange "></i> Karyawan
            </a>
          </li>
          <li class="nav-item @if($sidebar == 'Roster') active @endif">
            <a class="nav-link @if($sidebar == 'Roster') active @endif" href="{{url('/roster')}}">
              <i class="ni ni-bullet-list-67 text-info"></i> Roster Karyawan
            </a>
          </li>
          <li class="nav-item @if($sidebar == 'APD') active @endif">
            <a class="nav-link @if($sidebar == 'APD') active @endif" href="{{url('/apd')}}">
              <i class="ni ni-planet text-yellow"></i> Pengeluaran APD
            </a>
          </li>
          <li class="nav-item @if($sidebar == 'Merge') active @endif">
              <a class="nav-link @if($sidebar == 'Merge') active @endif" href="{{url('/merge')}}">
              <i class="ni ni-collection text-green"></i> Rekap Merge & JC
            </a>
          </li>
         @if (Auth::user()->role != 'User')
         <li class="nav-item @if($sidebar == 'Kontrak') active @endif">
            <a class="nav-link @if($sidebar == 'Kontrak') active @endif " href="{{url('/perpanjang_kontrak')}}">
              <i class="ni ni-books text-red"></i> Perpanjang Kontrak
            </a>
          </li>
          <li class="nav-item @if($sidebar == 'Laporan Surat') active @endif">
            <a class="nav-link @if($sidebar == 'Laporan Surat') active @endif" href="{{url('/laporan/perpanjang_kontrak')}}">
              <i class="ni ni-folder-17 text-blue"></i> Laporan Surat
            </a>
          </li>
         @else
             
         @endif
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('/')}}">@yield('title')</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{url('assets/img/users/')}}/{{Auth::user()->image}}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Selamat Datang!</h6>
              </div>
              <a href="{{url('/user')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Profilku</span>
              </a>
              <a href="{{url('user/ubah_password')}}" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Ubah Password</span>
              </a>
              <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      
      <div class="container-fluid">

        @yield('content_header')
        
      </div>
 </div>


    <div class="container-fluid mt--7">
      
      @yield('content')


      <!-- Footer -->
      <footer class="footer mt-7">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; {{date('Y')}} <a href="https://www.chairulanam.ga" class="font-weight-bold ml-1" target="_blank">Chairul Anam</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">TimCode</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    
  </div>
  <!--   Core   -->
  <script src="{{url('/assets')}}/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="{{url('/assets')}}/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  
  
<!-- datatables -->

<script type="text/javascript" src="{{url('assets/datatables')}}/Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('assets/datatables')}}/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{url('assets/datatables')}}/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{{url('assets/datatables')}}/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{url('assets/datatables')}}/Responsive-2.2.2/js/responsive.bootstrap4.min.js"></script>
<!-- end datatables -->

  <!--   Optional JS   -->
  <script src="{{url('/assets')}}/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="{{url('/assets')}}/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="{{url('/assets')}}/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  
  <script>
     $('.datatables').DataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "responsive":true
      });

    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

  </script>
  @yield('script')
</body>

</html>