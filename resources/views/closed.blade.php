@extends('layouts.master')

@section('title')
Closed
@endsection

@section('content')
<section>
    <div class="container mt-5 text-center">
        <img src="{{ asset('images/Logo_Panitia.png') }}" alt="" class="logoDone">
        <h1 class="title titleSection spacingM0c3 font-weight-bold text-center mt-5">
            Sudah Ditutup !
        </h1>
        <h4 class="spacingM0c2 text-center font-weight-bold mt-3">Terimakasih sudah berpartisipasi</h4>
    </div>
</section>

<p class="textCopy mt-5 text-center">
    Build with passion by
    <img src="{{ asset('images/Logo_Tahu_Ngoding.png') }}" class="logoTahuNgoding" />
</p>
@endsection
