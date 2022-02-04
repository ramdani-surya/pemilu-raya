@extends('layouts.master')

@section('title')
    Result
@endsection

@section('css')
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .btn-faculty {
            background-color: #7A1F31;
            color: white;
        }

        .btn-faculty:hover {
            background-color: #852d3f;
            color: white;
        }

        @media screen and (max-width: 455px) {
            .title-bpm {
               font-size: 19px;
            }

            .mobile-search-card {
                display: block !important;
            }
        }
    </style>
@endsection
@section('content')
    <section class="section-header" style="margin-top: 90px;">
        <div class="container">
            <h2 class="text-center mt-5 title-bpm">HASIL VOTING BPM PER FAKULTAS</h2>
            <div class="row mt-5">
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Teknologi Informatika</h1>
                    <div class="card-body">
                        <canvas id="fti_chart" data-bpm-fti-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fti-votings="{{ implode(',', $ftiCandidateVotings) }}"></canvas>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Ekonomi dan Bisnis</h6>
                    <div class="card-body">
                        <canvas id="feb_chart" data-bpm-feb-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-feb-votings="{{ implode(',', $febCandidateVotings) }}"></canvas>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Ilmu Sosial dan Ilmu Politik</h6>
                    <div class="card-body">
                        <canvas id="fisip_chart" data-bpm-fisip-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fisip-votings="{{ implode(',', $fisipCandidateVotings) }}"></canvas>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Keguruan dan Ilmu Pendidikan</h6>
                    <div class="card-body">
                        <canvas id="fkip_chart" data-bpm-fkip-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fkip-votings="{{ implode(',', $fkipCandidateVotings) }}"></canvas>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Ilmu Budaya</h6>
                    <div class="card-body">
                        <canvas id="fib_chart" data-bpm-fib-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fib-votings="{{ implode(',', $fibCandidateVotings) }}"></canvas>
                    </div>
                </div>
                <div class="col-md-6 pt-5">
                    <h6 class="text-center">Faktultas Ilmu Kesehatan</h6>
                    <div class="card-body">
                        <canvas id="fik_chart" data-bpm-fik-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fik-votings="{{ implode(',', $fikCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Apex Chart -->

    <!-- Dashboard 1 -->
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script>
        // FTI
        const ftiChartArea = $('#fti_chart');

        let dataFti = {
            labels: ftiChartArea.data('bpm-fti-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: ftiChartArea.data('bpm-fti-votings').split(',')
            }]
        };

        var myFtiChart = new Chart(ftiChartArea, {
            type: 'pie',
            data: dataFti,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        // FEB
        const febChartArea = $('#feb_chart');

        let dataFeb = {
            labels: febChartArea.data('bpm-feb-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: febChartArea.data('bpm-feb-votings').split(',')
            }]
        };

        var myFebChart = new Chart(febChartArea, {
            type: 'pie',
            data: dataFeb,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        // FISIP
        const fisipChartArea = $('#fisip_chart');

        let dataFisip = {
            labels: fisipChartArea.data('bpm-fisip-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: fisipChartArea.data('bpm-fisip-votings').split(',')
            }]
        };

        var myFisipChart = new Chart(fisipChartArea, {
            type: 'pie',
            data: dataFisip,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        // FKIP
        const fkipChartArea = $('#fkip_chart');

        let dataFkip = {
            labels: fkipChartArea.data('bpm-fkip-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: fkipChartArea.data('bpm-fkip-votings').split(',')
            }]
        };

        var myFikipChart = new Chart(fkipChartArea, {
            type: 'pie',
            data: dataFkip,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        // FIB
        const fibChartArea = $('#fib_chart');

        let dataFib = {
            labels: fibChartArea.data('bpm-fib-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: fibChartArea.data('bpm-fib-votings').split(',')
            }]
        };

        var myFibChart = new Chart(fibChartArea, {
            type: 'pie',
            data: dataFib,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });

        // FIK
        const fikChartArea = $('#fik_chart');

        let dataFik = {
            labels: fikChartArea.data('bpm-fik-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: fikChartArea.data('bpm-fik-votings').split(',')
            }]
        };

        var myFikChart = new Chart(fikChartArea, {
            type: 'pie',
            data: dataFik,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
        });


        function addFtiData(data) {
            myFtiChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFtiChart.update();
        }

        function addFebData(data) {
            myFebChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFebChart.update();
        }

        function addFisipData(data) {
            myFisipChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFisipChart.update();
        }

        function addFkipData(data) {
            myFikipChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFikipChart.update();
        }

        function addFibData(data) {
            myFibChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFibChart.update();
        }

        function addFikData(data) {
            myFikChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myFikChart.update();
        }

        setInterval(() => {
            $.getJSON('{{ route('bpm_filter_api') }}', null,
                function(data, textStatus, jqXHR) {
                    // removeBpmData()
                    // removeBemData()
                    addFtiData(data.ftiCandidateVotingApi)
                    addFebData(data.febCandidateVotingApi)
                    addFisipData(data.fisipCandidateVotingApi)
                    addFkipData(data.fkipCandidateVotingApi)
                    addFibData(data.fibCandidateVotingApi)
                    addFikData(data.fikCandidateVotingApi)
                });
        }, 1000);
    </script>
@endsection
