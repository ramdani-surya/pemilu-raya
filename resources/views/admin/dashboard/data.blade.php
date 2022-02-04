@extends('admin.layouts.master')

@section('title_menu')
    Dashboard
@endsection

@section('title')
Dashboard
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/chartist/css/chartist.min.css' )}}">
<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        <div class="row">
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3">
                                <i class="fas fa-user-friends" style="color: #27BC48; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Jumlah Pemilih</p>
                                <span class="title text-black font-w600" id="bpmTotalVoter"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                <i class="fas fa-user-plus" style="color: #A02CFA; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Sudah Memilih</p>
                                <span class="title text-black font-w600" id="bpmHasVoted"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-secondary" style="height:5px;" id="bpmSudahMemilihBar" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-secondary"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                <i class="fas fa-user-times" style="color: #FF3282; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Belum Memilih</p>
                                <span class="title text-black font-w600" id="bpmUnvoted"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="height:5px;" id="bpmBelumMemilihBar" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <i class="fas fa-users" style="color: #FFBC11; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Jumlah Kandidat</p>
                                <span class="title text-black font-w600" id="bpmTotalCandidate"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-12">
        <a href="{{ route('admin.dashboard.show', 'bpm') }}">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">BPM Chart</h4>
                </div>
                <div class="card-body">
                    <canvas id="bpm_chart"  data-bpmcandidates="{{ implode(',', $bpmCandidates) }}"
                    data-bpmvotings="{{ implode(',', $bpmCandidateVotings) }}"></canvas>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12">
        <div class="row">
            <div class="card" style="width: 100%;">
                <div class="card-body d-flex flex-column justify-content-center text-center">
                    <h4 class="text-black ">BEM</h4>
                 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3">
                                <i class="fas fa-user-friends" style="color: #27BC48; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Jumlah Pemilih</p>
                                <span class="title text-black font-w600" id="bemTotalVoter"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                <i class="fas fa-user-plus" style="color: #A02CFA; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Sudah Memilih</p>
                                <span class="title text-black font-w600" id="bemHasVoted"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-secondary" style="height:5px;" id="bemSudahMemilihBar" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-secondary"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                <i class="fas fa-user-times" style="color: #FF3282; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Belum Memilih</p>
                                <span class="title text-black font-w600" id="bemUnvoted"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="height:5px;" id="bemBelumMemilihBar" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <i class="fas fa-users" style="color: #FFBC11; font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Jumlah Kandidat</p>
                                <span class="title text-black font-w600" id="bemTotalCandidate"></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-12">
        <a href="{{ route('admin.dashboard.show', 'bem') }}">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">BEM Chart</h4>
                </div>
                <div class="card-body">
                    <canvas id="bem_chart"  data-bemcandidates="{{ implode(',', $bemCandidates) }}"
                    data-bemvotings="{{ implode(',', $bemCandidateVotings) }}"></canvas>
                </div>
            </div>
        </a>
        {{-- </a> --}}
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
                "#27BC48",
				"#A02CFA",
 			    "#FF3282",
	 		    "#FFBC11"
            ],
           
            data: bpmChartArea.data('bpmvotings').split(',')
        }]
    };

    let dataBem = {
        labels: bemChartArea.data('bemcandidates').split(','),
        datasets: [{
            label: 'PEROLEHAN SUARA',
            backgroundColor: [
                "#27BC48",
				"#A02CFA",
 			    "#FF3282",
	 		    "#FFBC11"
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
            function (data, textStatus, jqXHR) {
                $('#bpmTotalVoter').text(data.total_voter);
                $('#bpmHasVoted').text(`${data.bpm_has_voted.total} (${data.bpm_has_voted.percentage})`);
                $('#bpmSudahMemilihBar').css({'width' : `${data.bpm_has_voted.percentage}`});
                $('#bpmUnvoted').text(`${data.bpm_unvoted.total} (${data.bpm_unvoted.percentage})`);
                $('#bpmBelumMemilihBar').css({'width' : `${data.bpm_unvoted.percentage}`});
                $('#bpmTotalCandidate').text(data.total_candidate.bpm);

                $('#bemTotalVoter').text(data.total_voter);
                $('#bemHasVoted').text(`${data.bem_has_voted.total} (${data.bem_has_voted.percentage})`);
                $('#bemSudahMemilihBar').css({'width' : `${data.bem_has_voted.percentage}`});
                $('#bemUnvoted').text(`${data.bem_unvoted.total} (${data.bem_unvoted.percentage})`);
                $('#bemBelumMemilihBar').css({'width' : `${data.bem_unvoted.percentage}`});
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