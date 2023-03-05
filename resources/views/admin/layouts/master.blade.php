<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pemilu Raya - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets/image/unsap1.png')}}">
	<link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/admin_component/logo_pemira.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                <span class="brand-title" style="font-weight: bold; color: rgb(150, 155, 160);">Pemilu Raya</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								@yield('title_menu')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							{{-- <li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
									<input type="text" class="form-control" placeholder="Search here...">
								</div>
							</li>
						 --}}
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    @if(!empty(Auth::user()->image) && Storage::exists(Auth::user()->image))
                                    
                                    <img src="{{ Storage::url(Auth::user()->image) }}" width="20" style="object-fit: cover;" alt=""/>

                                    @else 
                                    <img src="{{ asset('images/admin_component/user.png') }}" width="20" style="object-fit: cover;" alt=""/>
                                    @endif
									<div class="header-info">
										<span class="text-black"><strong>{{ Auth::user()->username }}</strong></span>
										<p class="fs-12 mb-0">{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('admin.setting') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll mm-active">
				<ul class="metismenu mm-show" id="menu">
                    <li class="
								@if(request()->routeIs('dashboard.index') || request()->routeIs('dashboard.create'))
								'mm-active'
								@else
								''
								@endif
						"><a class="ai-icon" href="{{ route('admin.dashboard') }}" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li class="{{ request()->routeIs('elections.index') ? 'mm-active' : '' }}"><a class="ai-icon" href="{{ route('elections.index') }}" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Pemilu</span>
						</a>
                    </li>
                    <li class="{{ request()->routeIs('faculties.index') ? 'mm-active' : '' }}"><a class="ai-icon" href="{{ route('faculties.index') }}" aria-expanded="false">
							<i class="flaticon-381-home-2"></i>
							<span class="nav-text">Fakultas</span>
						</a>
                    </li>
                    <li class="{{ request()->routeIs('candidate-types.index') ? 'mm-active' : '' }}"><a class="ai-icon" href="{{ route('candidate-types.index') }}" aria-expanded="false">
							<i class="flaticon-381-id-card"></i>
							<span class="nav-text">Tipe Kandidat</span>
						</a>
                    </li>
                    <li class="{{ request()->routeIs('candidates.index') ? 'mm-active' : ''}} 
							   {{  request()->routeIs('candidates.create') ? 'mm-active' : ''}}
							   @isset($slug)
							   {{  request()->routeIs('candidates.createIn', $slug) ? 'mm-active' : ''}}
							   @endisset
							   @isset($slug)
							   {{  request()->routeIs('candidates.show', $slug) ? 'mm-active' : ''}}
							   @endisset
								"><a class="ai-icon" href="{{ route('candidates.index') }}" aria-expanded="false">
							<i class="flaticon-381-user-7"></i>
							<span class="nav-text">Kandidat</span>
						</a>
                    </li>
                    <li class="{{ request()->routeIs('voters.index') ? 'mm-active' : '' }}"><a class="ai-icon" href="{{ route('voters.index') }}" aria-expanded="false">
							<i class="flaticon-381-id-card-2"></i>
							<span class="nav-text">Daftar Pemilih Tetap</span>
						</a>
                    </li>
                    @if (Auth::user()->role == 'super_admin')
                        <li class="{{ request()->routeIs('users.index') ? 'mm-active' : '' }}"><a href="{{ route('users.index') }}" class="ai-icon" aria-expanded="false">
                                <i class="flaticon-381-settings-2"></i>
                                <span class="nav-text">Manajemen Akun</span>
                            </a>
                        </li>
                    @endif
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://instagram.com/tahungoding" target="_blank"><i><b>TAHU</b>NGODING</i></a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    @include('sweetalert::alert')

    @yield('js')
</body>
</html>