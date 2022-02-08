    @extends('admin.layouts.master')

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
                    <div class="col-sm-12">
                        <div class="card" style="width: 100%;">
                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                <h4 class="text-black ">BEM</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faktultas Teknologi Informasi</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="fti_chart"
                            data-bem-fti-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-fti-votings="{{ implode(',', $ftiCandidateVotings) }}"></canvas>
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
                            data-bem-feb-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-feb-votings="{{ implode(',', $febCandidateVotings) }}"></canvas>
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
                            data-bem-fisip-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-fisip-votings="{{ implode(',', $fisipCandidateVotings) }}"></canvas>
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
                            data-bem-fkip-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-fkip-votings="{{ implode(',', $fkipCandidateVotings) }}"></canvas>
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
                            data-bem-fib-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-fib-votings="{{ implode(',', $fibCandidateVotings) }}"></canvas>
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
                            data-bem-fik-candidates="{{ implode(',', $bemCandidates) }}"
                            data-bem-fik-votings="{{ implode(',', $fikCandidateVotings) }}"></canvas>
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
            labels: ftiChartArea.data('bem-fti-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: ftiChartArea.data('bem-fti-votings').split(',')
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
            labels: febChartArea.data('bem-feb-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: febChartArea.data('bem-feb-votings').split(',')
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
            labels: fisipChartArea.data('bem-fisip-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: fisipChartArea.data('bem-fisip-votings').split(',')
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
            labels: fkipChartArea.data('bem-fkip-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: fkipChartArea.data('bem-fkip-votings').split(',')
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
            labels: fibChartArea.data('bem-fib-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: fibChartArea.data('bem-fib-votings').split(',')
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
            labels: fikChartArea.data('bem-fik-candidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#27BC48",
                    "#A02CFA",
                    "#FF3282",
                    "#FFBC11"
                ],
            
                data: fikChartArea.data('bem-fik-votings').split(',')
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
        $.getJSON('{{ route('bem_filter_api') }}', null,
            function (data, textStatus, jqXHR) {
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