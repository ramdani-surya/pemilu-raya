@extends('layouts.master')

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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Kandidat</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Kandidat</a></li>
    </ol>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Kandidat</h4>
                <div class="button-list">
                    <button type="button" data-toggle="modal" data-target="#addElection" class="btn btn-primary btn-xs"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                    <button type="button" class="btn btn-danger btn-xs"
                        id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                </div>
            </div>
            <div class="card-body">
               
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

<!-- Datatable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@endsection
