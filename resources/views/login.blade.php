@extends('layouts.master')

@section('title')
    Login
@endsection

@section('css')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<style>
    .text-danger {
        float: left;
    }

</style>
@endsection

@section('content')
<main>
    <section class="section-login">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{asset('front/assets/image/Group112.png')}}" class="img-fluid mb-4" alt="">
                    <h1 class="text-besar mb-5 overflow">
                        Pemilihan Umum Raya Mahasiswa<br>
                        Universitas Sebelas April 2022/2023
                    </h1>
                    <div class="mb-3 d-sm-block d-md-none">
                        <img src="{{asset('front/assets/image/Illustrasi.png')}}" class="img-fluid" alt="">
                    </div>
                    <form action="{{route('authenticate')}}" method="POST">
                        @csrf
                        @error('wrong')
                            <small class="text-danger mr-2 mb-2 text-center">{{$message}}</small><br>
                        @enderror
                        <div class="mb-3 input-group">
                            <input type="text" name="nim" class="form-control form-control-lg form-style" value="{{old('nim', $nim)}}" placeholder="Masukan NIM">
                            <i class="bi bi-person input-group-text form-style"></i>
                        </div>
                        @error('nim')
                            <small class="text-danger mr-2 mb-2">{{$message}}</small><br>
                        @enderror
                        <div class="mb-3 input-group">
                            <input type="password" name="token" value="{{old('token', $token)}}" class="form-control form-control-lg form-style" placeholder="Masukan Token">
                            <i class="bi bi-eye-slash input-group-text form-style"></i>
                        </div>
                        @error('token')
                            <small class="text-danger">{{$message}}</small><br>
                        @enderror
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="text-decoration-none text-white btn btn-masuk btn-lg">Masuk</button>
                        </div>
                        <div id="emailHelp" class="form-text ps-4 mb-3">
                            Tidak dapat token? 
                        </div>
                        <h5 class="text-center text-kecil">
                            Build with passion by <a href="https://instagram.com/tahungoding" style="all:unset;cursor: pointer;"><font class="tahu">TAHU</font><font class="ngoding">NGODING</font></a> 
                        </h5>
                    </form>
                </div>
                <div class="col-md-7 text-end d-none d-md-block">
                    <img src="{{asset('front/assets/image/Illustrasi.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
