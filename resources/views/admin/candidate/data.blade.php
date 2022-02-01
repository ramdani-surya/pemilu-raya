@extends('admin.layouts.master')

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ url()->current() }}">Kandidat</a></li>
    </ol>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Kandidat</h4>
                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                <div class="button-list">
                    <a href="{{ route('candidates.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle mr-1"></i> Tambahkan Kandidat</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($candidate_type as $types)
    
        <div class="col-sm-6">
            <a href="{{ route('candidates.show', $types->slug) }}">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media ">
                            
                            <div class="media-body">
                                <p class="fs-14 mb-2">{{ $types->election->name }}</p>
                                <span class="title text-black font-w600">{{ $types->name }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-secondary" style="height:5px;" id="bemSudahMemilihBar" role="progressbar">
                            </div>
                        </div>
                    </div>
                    <div class="effect light bg-primary"></div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection

@section('js')
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>


@endsection
