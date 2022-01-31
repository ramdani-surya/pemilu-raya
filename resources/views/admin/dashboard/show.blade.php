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
                <div class="card" style="width: 100%;">
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <h4 class="text-black ">{{ $candidate_type }}</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($faculty as $faculties)
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">BEM Chart {{ $faculties->id }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="bem_chart{{ $faculties->id }}" data-bemcandidates{{ $faculties->id }}="{{ implode(',', $bemCandidates) }}"
                            data-bemvotings{{ $faculties->id }}="{{ implode(',', $bemCandidateVotings) }}"></canvas>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
          
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
                @foreach($faculty as $faculties)
                        // BAR CHART
                        var file = {!! json_encode($faculties) !!}
                        console.log({!! json_encode($faculties->name) !!});
                        const bemChartArea{{ $faculties->id }} = $('#bem_chart{{ $faculties->id }}');
                        
                
                        let dataBem{{ $faculties->id }} = {
                            labels: bemChartArea{{ $faculties->id }}.data('bemcandidates{{ $faculties->id }}').split(','),
                            datasets: [{
                                label: 'PEROLEHAN SUARA',
                                backgroundColor: [
                                    "rgba(11, 42, 151, .9)",
                                    "rgba(11, 42, 151, .7)",
                                    "rgba(11, 42, 151, .5)",
                                    "rgba(0,0,0,0.07)"
                                ],
                
                                data: bemChartArea{{ $faculties->id }}.data('bemvotings{{ $faculties->id }}').split(',')
                            }]
                        };
                
                
                    
                
                        var myBemChart{{ $faculties->id }} = new Chart(bemChartArea{{ $faculties->id }}, {
                            type: 'pie',
                            data: dataBem{{ $faculties->id }},
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                
                            }
                        });
                @endforeach
              
            </script>
        @endsection
    </div>
@endsection
