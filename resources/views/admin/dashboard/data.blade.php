@extends('admin.layouts.master')

@section('subtitle')
Dashboard
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@section('content')
<!-- start row -->

<div class="row text-center">
    <div class="col-sm-6 col-xl-3">
        <div class="card-box widget-flat border-primary bg-primary text-white">
            <i class="fas fa-poll"></i>
            <h3 class="text-white" id="total-voter"></h3>
            <p class="text-uppercase font-13 mb-2 font-weight-bold">Jumlah Pemilih</p>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card-box bg-blue widget-flat border-blue text-white">
            <i class="fas fa-vote-yea"></i>
            <h3 class="text-white" id="has-voted"></h3>
            <p class="text-uppercase font-13 mb-2 font-weight-bold">Sudah Memilih</p>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card-box widget-flat border-success bg-success text-white">
            <i class="fab fa-snapchat-ghost"></i>
            <h3 class="text-white" id="unvoted"></h3>
            <p class="text-uppercase font-13 mb-2 font-weight-bold">Belum Memilih</p>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card-box bg-warning widget-flat border-danger text-white">
            <i class="fas fa-poll-h"></i>
            <h3 class="text-white" id="total-candidate"></h3>
            <p class="text-uppercase font-13 mb-2 font-weight-bold">Jumlah Kandidat</p>
        </div>
    </div>
</div>
<!-- end row -->

<div class="card-box d-flex justify-content-center">
    <div style="width:60%;">
        {!! $chartjs->render() !!}
    </div>
</div>


@endsection

@section('js')
<!-- Flot chart -->
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.time.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.crosshair.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/curvedLines.js') }}"></script>
<script src="{{ asset('highdmin/libs/flot-charts/jquery.flot.axislabels.js') }}"></script>

<!-- KNOB JS -->
<script src="{{ asset('highdmin/libs/jquery-knob/jquery.knob.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('highdmin/js/pages/dashboard.init.js') }}"></script>

<!-- ChartJs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"
    integrity="sha512-RGbSeD/jDcZBWNsI1VCvdjcDULuSfWTtIva2ek5FtteXeSjLfXac4kqkDRHVGf1TwsXCAqPTF7/EYITD0/CTqw=="
    crossorigin="anonymous"></script>

<script>
    setInterval(() => {
        $.getJSON('{{ route('dashboard_api') }}', null,
            function (data, textStatus, jqXHR) {
                $('#total-voter').text(data.total_voter);
                $('#has-voted').text(`${data.has_voted.total} (${data.has_voted.percentage})`);
                $('#unvoted').text(`${data.unvoted.total} (${data.unvoted.percentage})`);
                $('#total-candidate').text(data.total_candidate);
            }
        );

    }, 1000);
</script>
@endsection
