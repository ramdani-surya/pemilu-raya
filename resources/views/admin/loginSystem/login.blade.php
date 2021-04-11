@extends('admin.layouts.loginSystem')

@section('subtitle')
Login User
@endsection

@section('content')
 <!-- Begin page -->
 <body class="account-pages">

<!-- Begin page -->
<div class="accountbg" style="background: url( {{ url('highdmin/images/bg-1.jpg') }} ); background-size: cover;background-position: center;"></div>

<div class="wrapper-page account-page-full">

    <div class="card shadow-none">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box shadow-none p-4 mt-2">
                    <h2 class="text-uppercase text-center pb-3">
                        <a href="index.html" class="text-success">
                            <span><img src="{{ asset('highdmin/images/logo-dark.png') }}" alt="" height="26"></span>
                        </a>
                    </h2>

                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="Masukan username anda" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukan password anda" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">

                                <div class="checkbox checkbox-primary">
                                    <input id="remember" type="checkbox" name="remember" checked="">
                                    <label for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <div class="col-12">
                                <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <div class="text-center">
        <p class="account-copyright">2018 - 2019 © Highdmin. <span class="d-none d-sm-inline-block"> - Coderthemes.com</span></p>
    </div>

</div>
@endsection

