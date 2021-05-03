@extends('admin.layouts.master')

@section('subtitle')
Dashboard
@endsection

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
        <canvas id="myChart" data-candidates="{{ implode(',', $candidates) }}"
            data-votings="{{ implode(',', $candidateVotings) }}"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const chartArea = $('#myChart')

    let data = {
        labels: chartArea.data('candidates').split(','),
        datasets: [{
            label: 'Perolehan Suara',
            backgroundColor: [
                'rgba(237, 174, 73, 1)',
                'rgba(209, 73, 91, 1)',
                'rgba(0, 121, 140, 1)',
                'rgba(48, 99, 142, 1)'
            ],
            borderColor: ['#EDAE49', '#D1495B', '#00798C', '#30638E'],
            data: chartArea.data('votings').split(',')
        }]
    };

    const config = {
        type: 'bar',
        data
    };

    let myChart = new Chart(
        chartArea,
        config
    );

    myChart.options.animation = false;

    function addData(chart, data) {
        chart.data.datasets.forEach((dataset) => {
            dataset.data = data;
        });

        chart.update();
    }

    function removeData(chart) {
        chart.data.datasets.forEach((dataset) => {
            dataset.data = null;
        });

        chart.update();
    }


    setInterval(() => {
        $.getJSON('{{ route('dashboard_api') }}', null,
            function (data, textStatus, jqXHR) {
                $('#total-voter').text(data.total_voter);
                $('#has-voted').text(`${data.has_voted.total} (${data.has_voted.percentage})`);
                $('#unvoted').text(`${data.unvoted.total} (${data.unvoted.percentage})`);
                $('#total-candidate').text(data.total_candidate);

                removeData(myChart)
                addData(myChart, data.votings)
            }
        );

    }, 1000);

</script>
@endsection
