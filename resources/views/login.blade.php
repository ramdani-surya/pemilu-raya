@extends('layouts.master')

@section('title')
    Login
@endsection

@section('css')
<style>
    .text-danger {
        float: left;
    }

</style>
@endsection

@section('content')
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mt-md-5 mt-4 order-md-1 order-2 text-md-left text-center">
                <h1 class="font-weight-bold title titleSection">
                    {{ getRunningElection()->name }}
                </h1>
                <form class="wrapperForm" action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="form-group d-md-block d-flex justify-content-center text-center">
                        <input type="text" class="form-control login" placeholder="NIM" name="nim"
                            value="{{ Request::all()['nim'] ?? old('nim') }}" required>
                        @error('nim')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group d-md-block d-flex justify-content-center text-center mtMd1c5">
                        <input type="text" class="form-control login" placeholder="TOKEN" name="token"
                            value="{{ Request::all()['token'] ?? old('token') }}" required>
                        @error('token')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn login mtMd0c4">Submit</button>
                </form>
                <p class="textCopy mt-md-5 mt-3">
                    Build with passion by
                    <img src="{{ asset('images/admin_component/Logo_Tahu_Ngoding.png') }}"
                        class="logoTahuNgoding" />
                </p>
            </div>
            <div class="col-md-6 d-md-block d-flex justify-content-center order-md-2 order-1">
                <img src="{{ asset('images/admin_component/Ilustrator.png') }}" class="ilustratorImg" />
            </div>
        </div>
    </div>
</section>
@endsection
