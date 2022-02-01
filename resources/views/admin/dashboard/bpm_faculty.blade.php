    @extends('layouts.master')

    @section('title_menu')
        Dashboard
    @endsection

    @section('title')
        Dashboard
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css') }}">
        <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endsection



    @section('content')

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="card" style="width: 100%;">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <h4 class="text-black ">BPM</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Teknik Informasi</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fti_chart"
                            data-bpm-fti-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fti-votings="{{ implode(',', $ftiCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Ekonomi dan Bisnis</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="feb_chart"
                            data-bpm-feb-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-feb-votings="{{ implode(',', $febCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Ilmu Sosial dan Ilmu Politik</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fisip_chart"
                            data-bpm-fisip-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fisip-votings="{{ implode(',', $fisipCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Keguruan dan Ilmu Pendidikan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fkip_chart"
                            data-bpm-fkip-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fkip-votings="{{ implode(',', $fkipCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Ilmu Budaya</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fib_chart"
                            data-bpm-fib-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fib-votings="{{ implode(',', $fibCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Ilmu Kesehatan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fik_chart"
                            data-bpm-fik-candidates="{{ implode(',', $bpmCandidates) }}"
                            data-bpm-fik-votings="{{ implode(',', $fikCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
        </div>

    @endsection

    @section('js')
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('js/deznav-init.js') }}"></script>
        <script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

        <!-- Chart piety plugin files -->
        <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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
                    "rgba(11, 42, 151, .9)",
                    "rgba(11, 42, 151, .7)",
                    "rgba(11, 42, 151, .5)",
                    "rgba(0,0,0,0.07)"
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


        </script>
    @endsection