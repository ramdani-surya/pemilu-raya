<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pemilu Raya | @yield('subtitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('highdmin/images/favicon.ico') }}">
    --}}
    {{-- additional css --}}
    @yield('css')

    <link href="{{ asset('highdmin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('highdmin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('highdmin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('highdmin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo">
                        <span class="logo-lg p-1">
                            <img src="{{ asset('images/admin_component/tahu.png') }}" alt="" height="52">
                            <!-- <span class="logo-lg-text-light">Highdmin</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">H</span> -->
                            <img src="{{ asset('images/admin_component/tahu.png') }}" alt="" height="24">
                        </span>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="dropdown">
                        <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                            data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    </div>
                    <p class="text-muted text-capitalize">{{ Auth::user()->role }}</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fe-grid"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('elections.index') }}">
                                <i class="fe-edit"></i>
                                <span> Pemilu </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faculty.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Fakultas </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.index') }}">
                                <i class="fe-users"></i>
                                <span> Kandidat </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('voters.index') }}">
                                <i class="fe-user"></i>
                                <span> Daftar Pemilih Tetap </span>
                            </a>
                        </li>
                        @if(Auth::user()->role == 'saksi')

                        @else
                        <li class="menu-title">Lainnya</li>

                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="fe-settings"></i>
                                <span> Manajemen Akun </span>
                            </a>
                        </li>
                        @endif
                        {{-- Grafik hasil pemilu dari tiap penyelenggaraan tahun ke tahun --}}
                        {{-- <li>
                            <a href="widgets.html">
                                <i class="fe-trending-up"></i>
                                <span> Laporan </span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i> <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile disable-btn">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <h4 class="page-title-main">Pemilu Raya</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Pemilu Raya</a></li>
                            <li class="breadcrumb-item"><a href="#">@yield('subtitle')</a></li>
                            @yield('subtitle-in')
                        </ol>
                    </li>

                </ul>
            </div>
            <!-- end Topbar -->

            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- end container-fluid -->
            </div> <!-- end content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            2021 &copy; Made by <a href="#" style="color:#f9bc0b;">TAHUNGODING STMIK Sumedang</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END  wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('highdmin/js/vendor.min.js') }}"></script>

    {{-- additional js --}}
    @yield('js')
    @include('sweetalert::alert')

    <script src="{{ asset('highdmin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('highdmin/js/app.min.js') }}"></script>
</body>

</html>
