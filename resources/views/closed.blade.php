@extends('layouts.master')

@section('title')
Cooming Soon
@endsection

@section('content')
<main>
    <section class="section-countdown">
        <div class="row">
            <div class="col-md-12 clearfix text-center">
                <img src="{{asset('front/assets/image/unsap1.png')}}" class="img-candidate float-left" alt="">
                <span class="text-besar">DITUTUP</span>
            </div>
            <h5 class="mt-5 text-center text-kecil">
                Build with passion by <a href="http://instagram.com/tahungoding" style="all:unset;cursor:pointer"><font class="tahu">TAHU</font><font class="ngoding">NGODING</font></a> 
            </h5>
        </div>
    </section>
</main>
@endsection

