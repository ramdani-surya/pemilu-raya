@extends('admin.layouts.master')

@section('subtitle')
Manajemen Akun
@endsection

@section('subtitle-in')
<li class="breadcrumb-item active">Edit Password</li>
@endsection

@section('content')
<!-- start form -->
<form action="{{ route('users.updatePassword', $user->id) }}" method="post">
    @csrf

    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="wrap d-flex justify-content-between">
                    <h4 class="header-title">UBAH PASSWORD</h4>
                    <span class="badge badge-light font-15 ">@if(Auth::user()->role == 'admin')akses admin @else akses panitia @endif</span>
                </div>
                <p class="sub-header">
                    Di halaman ini anda dapat mengubah password dari akun yang anda pakai.
                </p>

                @if(Auth::user()->role == 'panitia')
                <div class="form-group">
                    <label for="passwordLama">Password Lama<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" name="password_lama" parsley-trigger="change"
                            placeholder="Masukkan Nomor Kandidat"
                            class="form-control @error('password_lama') is-invalid @enderror" id="password_lama"
                            value="{{ old('password_lama') }}">
                        <div class="input-group-append">
                            <button
                                class="btn btn-secondary fas fa-eye @error('password_lama') btn-danger @enderror toggle-password-lama"
                                type="button"></button>
                        </div>
                    </div>
                    @error('password_lama')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                @endif

                <div class="form-group">
                    <label for="passwordBaru">Password Baru<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" name="password_baru" parsley-trigger="change"
                            placeholder="Masukkan Password Baru"
                            class="form-control @error('password_baru') is-invalid @enderror" id="password_baru"
                            value="{{ old('password_baru') }}">
                        <div class="input-group-append">
                            <button
                                class="btn btn-secondary fas fa-eye @error('password_baru') btn-danger @enderror toggle-password-baru"
                                type="button"></button>
                        </div>
                    </div>

                    @error('password_baru')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="konfirmasiPasswordBaru">Konfirmasi Password Baru<span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="password" name="konfirmasi_password_baru" parsley-trigger="change"
                            placeholder="Masukkan Konfirmasi Password Baru"
                            class="form-control @error('konfirmasi_password_baru') is-invalid @enderror"
                            id="konfirmasi_password_baru" value="{{ old('konfirmasi_password_baru') }}">
                        <div class="input-group-append">
                            <button
                                class="btn btn-secondary fas fa-eye @error('konfirmasi_password_baru') btn-danger @enderror toggle-konfirmasi-password-baru"
                                type="button"></button>
                        </div>
                    </div>

                    @error('konfirmasi_password_baru')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group text-left mt-4">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Ubah
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-light waves-effect">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <!-- end form -->
    @endsection

    @section('js')
    <!-- Toggle Show/Hide Password -->
    <script>
        $(".toggle-password-lama").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var passwordLama = document.getElementById("password_lama");

            if (passwordLama.type === "password") {
                passwordLama.type = "text";
            } else {
                passwordLama.type = "password";
            }

           
        });
        $(".toggle-password-baru").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var password = document.getElementById("password_baru");

            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        });
        
        $(".toggle-konfirmasi-password-baru").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var konfirmasiPassword = document.getElementById("konfirmasi_password_baru");

            if (konfirmasiPassword.type === "password") {
                konfirmasiPassword.type = "text";
            } else {
                konfirmasiPassword.type = "password";
            }
        });

    </script>
    @endsection