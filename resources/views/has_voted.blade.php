@extends('layouts.master')

@section('title')
    Sudah Memilih
@endsection

@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 mt-md-5 mt-4 order-md-1 order-2 text-md-left text-center">
                    <h1 class="font-weight-bold title titleSection">
                        Pemilu
                        <br>
                        Raya SEMA
                    </h1>
                    <h3 class="fSMBL1C2 font-weight-bold mt-md-5 mt-3" style="font-style: italic;">
                        Anda sudah menggunakan hak suara, tidak bisa masuk kembali.
                    </h3>
                    <a href="{{ route('logout') }}" type="submit" class="btn login mtMd0c4">Masuk dengan akun lain</a>
                    <p class="textCopy mt-md-5 mt-3">
                        Build with passion by
                        <img src="{{ asset('images/admin_component/Logo_Tahu_Ngoding.png') }}" class="logoTahuNgoding" />
                    </p>
                </div>
                <div class="col-md-6 d-md-block d-flex justify-content-center order-md-2 order-1">
                    <img src="{{ asset('images/admin_component/Ilustrator.png') }}" class="ilustratorImg" />
                </div>
            </div>
        </div>
    </section>
@endsection
