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
    </style>
@endsection
@section('content')
    <section class="section-header" style="margin-top: 90px;">
        <div class="container">
            <h2 class="text-center mt-5">HASIL VOTING</h2>
            <div class="row mt-5">
                <div class="col-md-6 col-xxl-6 text-center">
                    <h2 style="letter-spacing: 8px;">BPM</h2>
                   
                        <div class="card-body">
                            <canvas id="bpm_chart" data-bpmcandidates="{{ implode(',', $bpmCandidates) }}"
                                data-bpmvotings="{{ implode(',', $bpmCandidateVotings) }}"></canvas>
                        </div>
                    <a href="{{ route('result.filter', 'bpm') }}" class="btn btn-sm btn-faculty">Filter Fakultas</a>
                </div>
                <div class="col-md-6 col-xxl-6 text-center">
                    <h2 style="letter-spacing: 8px;">BEM</h2>
                        <div class="card-body">
                            <canvas id="bem_chart" data-bemcandidates="{{ implode(',', $bemCandidates) }}"
                                data-bemvotings="{{ implode(',', $bemCandidateVotings) }}"></canvas>
                        </div>
                    <a href="{{ route('result.filter', 'bem') }}" class="btn btn-sm btn-faculty">Filter Fakultas</a>
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
        // BAR CHART
        const bemChartArea = $('#bem_chart');
        const bpmChartArea = $('#bpm_chart');

        let dataBpm = {
            labels: bpmChartArea.data('bpmcandidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: bpmChartArea.data('bpmvotings').split(',')
            }]
        };

        let dataBem = {
            labels: bemChartArea.data('bemcandidates').split(','),
            datasets: [{
                label: 'PEROLEHAN SUARA',
                backgroundColor: [
                    "#886F6F",
                    "#7A1F31",
                    "#694E4E",
                    "#470D21"
                ],

                data: bemChartArea.data('bemvotings').split(',')
            }]
        };


        var myBpmChart = new Chart(bpmChartArea, {
            type: 'pie',
            data: dataBpm,
            options: {
                responsive: true,
                maintainAspectRatio: true,

            }
        });

        var myBemChart = new Chart(bemChartArea, {
            type: 'pie',
            data: dataBem,
            options: {
                responsive: true,
                maintainAspectRatio: true,

            }
        });

        // myChart.options.animation = false;
        // END BAR CHART

        // PIE CHART
        // CHART FUNCTIONS
        // CHART FUNCTIONS
        function addBpmData(data) {
            myBpmChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myBpmChart.update();
        }

        function removeBpmData() {
            myBpmChart.data.datasets.forEach((dataset) => {
                dataset.data = null;
            });

            myBpmChart.update();
        }

        function addBemData(data) {
            myBemChart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });

            myBemChart.update();
        }

        function removeBemData() {
            myBemChart.data.datasets.forEach((dataset) => {
                dataset.data = null;
            });

            myBemChart.update();
        }

        setInterval(() => {
            $.getJSON('{{ route('dashboard_api') }}', null,
                function(data, textStatus, jqXHR) {
                    $('#bpmTotalVoter').text(data.total_voter);
                    $('#bpmHasVoted').text(`${data.bpm_has_voted.total} (${data.bpm_has_voted.percentage})`);
                    $('#bpmSudahMemilihBar').css({
                        'width': `${data.bpm_has_voted.percentage}`
                    });
                    $('#bpmUnvoted').text(`${data.bpm_unvoted.total} (${data.bpm_unvoted.percentage})`);
                    $('#bpmBelumMemilihBar').css({
                        'width': `${data.bpm_unvoted.percentage}`
                    });
                    $('#bpmTotalCandidate').text(data.total_candidate.bpm);

                    $('#bemTotalVoter').text(data.total_voter);
                    $('#bemHasVoted').text(`${data.bem_has_voted.total} (${data.bem_has_voted.percentage})`);
                    $('#bemSudahMemilihBar').css({
                        'width': `${data.bem_has_voted.percentage}`
                    });
                    $('#bemUnvoted').text(`${data.bem_unvoted.total} (${data.bem_unvoted.percentage})`);
                    $('#bemBelumMemilihBar').css({
                        'width': `${data.bem_unvoted.percentage}`
                    });
                    $('#bemTotalCandidate').text(data.total_candidate.bem);

                    data.bpmVotings.pop()
                    data.bemVotings.pop()

                    // removeBpmData()
                    // removeBemData()
                    addBpmData(data.bpmVotings)
                    addBemData(data.bemVotings)

                }
            );

        }, 1000);
    </script>
@endsection
