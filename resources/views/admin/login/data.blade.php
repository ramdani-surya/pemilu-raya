@extends('admin.layouts.login_system')

@section('subtitle')
Login User
@endsection

@section('content')

<!-- Begin page -->

<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg">
        <img src="{{ asset('images/login_bg.jpg') }}"
        style="width: 67%; height: 100vh; object-fit:cover;" class="thumb-img img-fluid"
        alt="Default Image">
    </div>

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

                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" id="username"
                                        placeholder="Masukan username anda" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <a href="page-recoverpw.html" class="text-muted float-right"><small>Forgot your
                                            password?</small></a>
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input class="form-control" type="password" name="password" id="passwordId"
                                            placeholder="Masukan Password Anda">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary fas fa-eye toggle-password"
                                                type="button"></button>
                                        </div>
                                    </div>
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
                                    <button class="btn btn-block btn-primary waves-effect waves-light"
                                        type="submit">Sign In</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <p class="account-copyright">2021 &copy; Made by <a href="#">TAHUNGODING STMIK Sumedang</a></p>
        </div>

    </div>

    @endsection

    @section('js')
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var password = document.getElementById("passwordId");

            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }

        });
    </script>
    @endsection