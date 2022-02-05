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
<script>
    const countdown = () => {
    const countDate = new Date("Feb 8, 2022 09:00:00").getTime();
    const now = new Date().getTime();
    const gap = countDate - now;

    const second = 1000;
    const minute = second * 60;
    const hour = minute * 60;
    const day = hour * 24;

    const textDay = Math.floor(gap / day);
    const textHour = Math.floor((gap % day) / hour);
    const textMinute = Math.floor((gap % hour) / minute);
    const textSecond = Math.floor((gap % minute) / second);

    document.querySelector(".hari").innerText = textDay;
    document.querySelector(".jam").innerText = textHour;
    document.querySelector(".menit").innerText = textMinute;
    document.querySelector(".detik").innerText = textSecond;
};

setInterval(countdown,1000);
</script>
@endsection
