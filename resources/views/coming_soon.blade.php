@extends('layouts.master')

@section('title')
Cooming Soon
@endsection

@section('content')
<main>
    <section class="section-countdown">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1 class="text-besar text-center">
                    Portal Pemilu Raya <br>
                    Akan Dibuka Dalam Waktu
                </h1>
                <div class="row mt-4">
                    <div class="col">
                        <div class="countdown-hari">
                            <h1 class="text-center py-4 px-3 hari">04</h1>
                        </div>
                        <p class="text-center text-muted">
                            Hari
                        </p>
                    </div>
                    <div class="col">
                        <div class="countdown-hari">
                            <h1 class="text-center py-4 px-3 jam">12</h1>
                        </div>
                        <p class="text-center text-muted">
                            Jam
                        </p>
                    </div>
                    <div class="col">
                        <div class="countdown-hari">
                            <h1 class="text-center py-4 px-3 menit">38</h1>
                        </div>
                        <p class="text-center text-muted">
                            Menit
                        </p>
                    </div>
                    <div class="col">
                        <div class="countdown-hari">
                            <h1 class="text-center py-4 px-3 detik">55</h1>
                        </div>
                        <p class="text-center text-muted">
                            Detik
                        </p>
                    </div>
                </div>
                
                <h5 class="mt-3 text-center text-kecil">
                    Build with passion by <a href="http://instagram.com/tahungoding" style="all:unset;cursor:pointer"><font class="tahu">TAHU</font><font class="ngoding">NGODING</font></a> 
                </h5>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
</main>
@endsection

@section('js')

@endsection
