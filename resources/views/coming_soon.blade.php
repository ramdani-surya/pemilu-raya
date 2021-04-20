@extends('layouts.master')

@section('title')
Cooming Soon
@endsection

@section('content')
<section>
    <div class="mtM10 mt5 container d-flex justify-content-center">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/Logo_Panitia.png') }}" alt="" class="wM80 w60">
                </div>
                <div class="col-md-8 pt-4">
                    <h1 class="title titleSection spacingM0c3 fSM4 font-weight-bold text-md-left text-center"
                        style="font-size:4rem;" id="title">
                        Coming Soon
                    </h1>
                    <h1 class="title titleSection spacingM0c3 font-weight-bold text-md-left text-center" id="countdown">
                    </h1>
                    <input type="hidden" id="running_date" value="{{ getActiveElection()->running_date ?? null }}">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script>
    let running_date = $('#running_date').val();

    if (running_date !== '') {
        // Set the date we're counting down to
        let countDownDate = new Date(running_date).getTime();

        // Update the count down every 1 second
        setInterval(function () {
                // Get today's date and time
                let now = new Date().getTime();

                // Find the distance between now and the count down date
                let distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="countdown"
                $('#countdown').text(`${days}d ${hours}h ${minutes}m ${seconds}s`);

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    $('#countdown').text('');
                    $('#title').text('Pemilu Telah Berakhir');
                }
            },
            1000);
    }

</script>
@endsection
