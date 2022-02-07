@extends('layouts.master')

@section('title')
Kandidat
@endsection

@section('css')
    <style>
        .login {
            background: #17a2b8 !important;
        }

        @media screen and (max-width: 455px) {
            .text-besar {
                font-size: 25px !important;
            }
            
            .text-trm {
                font-size: 25px !important;
            }
            .text-kecil {
                font-size: 15px !important;
            }
    
            .section-header {
             margin-top: 40px !important;
            }

            .img-candidate {
                margin-top: 30px;
            }
            .nama {
                margin-top: 30px;
            }
            #modal_misi {
                padding: 30px !important;
            }
        }

        @media screen and (min-width: 1280px) and (max-width: 1281px)
              and (min-height: 800px) and (max-height: 801px) {
                #resolutionTabletIpad {
                    width: 90% !important;
                }
        }

        @media screen and (min-width: 540px) and (max-width: 541px)
              and (min-height: 720px) and (max-height: 721px) {
                .img-candidate {
                margin-top: 30px;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px){
            #resolutionTabletIpad {
                    width: 90% !important;
                }
        }
    </style>
@endsection

@section('content')
<main>
    <section class="section-header">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 mb-5" id="up-distance">
                    Hi, <b>{{Auth::user()->name}}</b> Silahkan pakai hak suaramu !
                    <br>
                    <a href="{{route('logout')}}" style="all:unset;cursor:pointer"><small>Logout?</small></a>
                </div>
                <div class="col-md-5">
                    <h1 class="text-besar mb-3">
                        Pemilihan Umum Raya <br>
                        Mahasiswa Universitas Sebelas April 2022/2023
                    </h1>
                    <p class="text-kecil mb-3">
                        Memilih sesuai hati, bebas tanpa intimidasi, golput bukan<br> solusi. 
                        Mari kita sukseskan Pemilu Raya 2022.
                    </p>
                    <div class="d-grid gap-2 d-block" id="button-scroll">
                        <a href="#BEM-DESKTOP" class="btn btn-biru text-decoration-none px-5 py-2 text-white d-none d-md-block">BEM</a>
                        <a href="#BPM-DESKTOP" class="btn btn-biru text-decoration-none px-5 py-2 text-white d-none d-md-block">BPM</a>
                        <a href="#BEM-MOBILE" class="btn btn-biru text-decoration-none px-5 py-2 text-white d-sm-block d-md-none">BEM</a>
                        <a href="#BPM-MOBILE" class="btn btn-biru text-decoration-none px-5 py-2 text-white d-sm-block d-md-none">BPM</a>
                    </div>
                </div>
                <!--  -->
                <!-- Desktop Mode -->
                <div class="col-md-7 mb-5 text-center d-none d-md-block">
                    <!-- <div class="position-relative">
                        <div class="position-absolute top-50 start-0">
                            <div class="alert text-start alert-style position-absolute alert-dismissible fade show shadow p-3 mb-5 bg-body rounded" role="alert" style="padding: 1.25rem !important; width: 260px;">
                                <div class="d-flex justify-content-end">
                                    <img src="{{asset('front')}}/assets/image/Group 281.png" data-bs-dismiss="alert" aria-label="Close" class="img-fluid" alt="">
                                </div>
                                <h5 class="text-title-alert">
                                    Alur Pemilihan
                                </h5>
                                <div class="px-3 ms-2 pt-2 border border-2 border-style">
                                    <div class="position-relative">
                                        <div class="position-absolute mt-3 top-50 start-0 translate-middle rounded-circle" style="background-color: #0F1F3C; margin-left: -20px;"><label class="fw-bold text-center text-white fs-6 px-2 py-2"><i class="fas fa-paper-plane me-1"></i></label></div>
                                    </div>
                                    <p class="text-alert-kecil pt-1 ps-1">
                                        Ikutilah pemilihan BEM kemudian <br>
                                        Pemilihan BPM dihari yang sama.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-left: 515px;">
                        <div class="alert text-start alert-style-2 position-absolute fade show" role="alert" style="margin-top: 90px;">
                            <div class="d-flex justify-content-end">
                                <img src="{{asset('front')}}/assets/image/Group 281.png" data-bs-dismiss="alert" aria-label="Close" class="img-fluid" alt="">
                            </div>
                            <h5 class="text-title-alert">
                                Ayo Memilih!    
                            </h5>
                            <div class="ms-2 px-3 pt-2 border border-2 border-style">
                                <div class="position-relative">
                                    <div class="position-absolute top-50 start-0 translate-middle rounded-circle" style="background-color: #0F1F3C; margin-left: -20px !important; margin-top: 40px;"><label class="fw-bold text-center text-white fs-6 px-2 py-2"><i class="fas fa-scroll"></i></label></div>
                                </div>
                                <p class="text-alert-kecil">
                                    Gunakan hak suaramu <br>
                                    untuk mensuksekan <br>
                                    pemilu raya 2022 dan <br>
                                    pilihlah yang terbaik <br>
                                    menurutmu.
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <div class="text-end d-flex justify-content-end">
                        <img src="{{asset('front')}}/assets/image/Illustrasi 2.png" class="img-fluid mx-auto d-block" alt="">
                    </div>
                </div>
                <!-- Mobile Mode -->
                <div class="col-md-7 mb-5 text-center d-sm-block d-md-none mt-5">
                    <!-- <div style="margin-left: 10px;">
                        <div class="alert text-start alert-style position-absolute alert-dismissible fade show shadow p-3 mb-5 bg-body rounded" role="alert" style="margin-top: 190px;">
                            <div class="d-flex justify-content-end">
                                <img src="{{asset('front')}}/assets/image/Group 281.png" data-bs-dismiss="alert" aria-label="Close" class="img-fluid" alt="">
                            </div>
                            <h5 class="text-title-alert">
                                Alur Pemilihan
                            </h5>
                            <div class="ms-2 px-3 pt-2 border border-2 border-style">
                                <div class="position-relative">
                                    <div class="position-absolute mt-3 top-50 start-0 translate-middle rounded-circle" style="background-color: #0F1F3C; margin-left: -20px;"><label class="fw-bold text-center text-white fs-6 px-2 py-2"><i class="fas fa-paper-plane me-1"></i></label></div>
                                </div>
                                <p class="text-alert-kecil">
                                    Ikutilah pemilihan BEM kemudian <br>
                                    Pemilihan BPM dihari yang sama.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="margin-left: 240px;">
                        <div class="alert text-start alert-style-2 position-absolute fade show" role="alert" style="margin-top: 39px;">
                            <div class="d-flex justify-content-end">
                                <img src="{{asset('front')}}/assets/image/Group 281.png" data-bs-dismiss="alert" aria-label="Close" class="img-fluid" alt="">
                            </div>
                            <h5 class="text-title-alert">
                                Ayo Memilih!    
                            </h5>
                            <div class="ms-2 px-3 pt-2 border border-2 border-style">
                                <div class="position-absolute top-50 start-0 translate-middle rounded-circle" style="background-color: #0F1F3C; margin-top: 20px; margin-left: 22px;"><label class="fw-bold text-center text-white fs-6 px-2 py-2"><i class="fas fa-scroll"></i></label></div>
                                <p class="text-alert-kecil">
                                    Gunakan hak suaramu <br>
                                    untuk mensuksekan <br>
                                    pemilu raya 2022 dan <br>
                                    pilihlah yang terbaik <br>
                                    menurutmu.
                                </p>
                            </div>
                        </div>
                    </div> -->
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('front')}}/assets/image/Illustrasi 2.png" class="img-fluid mx-auto d-block" width="50%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BEM  Desktop-->
    <section class="section-bem mb-5 d-none d-md-block" id="BEM-DESKTOP">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-besar">
                    Pemilihan Umum <br>
                    Badan Eksekutif Mahasiswa
                </h1>
                @if (Auth::user()->bem_voted != 1)
                    <div class="row" >
                        @foreach ($bem as $item)
                            <div class="col-md-5 mx-5 mt-5" id="resolutionTabletIpad">
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3">  
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$item->candidate_number}}</label></div>
                                        </div>
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($item->image){
                                                if (Storage::exists($item->image)) {
                                                    $path = Storage::url($item->image);
                                                }
                                            }
                                        @endphp
                                        <img src="{{$path}}" class="img-fluid img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$item->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$item->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$item->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$item->program!!}
                                        </div>
                                    </div>
                                    <button class="btn btn-biru col-4 mt-3" id="visiMisiMobile" type="button" onclick="visiMisi({{$item->id}})">Visi & Misi</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else 
                    @if ($bem_voted)
                        <div class="row d-flex justify-content-center" >
                            <div class="col-md-5 mx-5 mt-5">
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3">
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$bem_voted->candidate->candidate_number}}</label></div>
                                        </div>
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($bem_voted->candidate->image){
                                                if (Storage::exists($bem_voted->candidate->image)) {
                                                    $path = Storage::url($bem_voted->candidate->image);
                                                }
                                            }
                                        @endphp
                                        <img src="{{$path}}" class="img-fluid img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$bem_voted->candidate->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$bem_voted->candidate->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$bem_voted->candidate->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$bem_voted->candidate->program!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-center text-muted">
                                Anda telah memilih kandidat ini pada tanggal <br>
                                {{date('d M Y', strtotime($bem_voted->created_at))}} pada pukul {{date('H:i', strtotime($bem_voted->created_at))}}
                            </p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <!-- BEM  Mobile-->
    <section class="section-bem mb-5 d-sm-block d-md-none" id="BEM-MOBILE">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-besar">
                    Pemilihan Umum <br>
                    Badan Eksekutif Mahasiswa
                </h1>
                @if (Auth::user()->bem_voted != 1)
                <div class="row" >
                    @foreach ($bem as $item)
                        <div class="col-10 mx-5 mt-5">
                            <div class="position-relative mt-3">
                                <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$item->candidate_number}}</label></div>
                            </div>
                            <div class="row card-calon d-flex justify-content-center py-5">
                                <div class="col-md-3"> 
                                    @php
                                        $path = asset('front/assets/image/James.png');
                                        if($item->image){
                                            if (Storage::exists($item->image)) {
                                                $path = Storage::url($item->image);
                                            }
                                        }
                                    @endphp 
                                    <img src="{{$path}}" class="img-fluid mx-auto d-block img-candidate" alt="">
                                </div>
                                <div class="col-md-7">
                                    <label class="nama">
                                        {{$item->chairman_name}}
                                    </label><br>
                                    <label class="fakultas">
                                        {{$item->faculties->name}}
                                    </label><br>
                                    <label class="program">
                                        {{$item->studyPrograms->name}}
                                    </label>
                                    <div class="organisasi mt-2">
                                        {!!$item->program!!}
                                    </div>
                                </div>
                                <button class="btn btn-biru col-4 mt-3" type="button" onclick="visiMisi({{$item->id}})">Visi & Misi</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else 
                    @if ($bem_voted)
                        <div class="row" >
                            <div class="col-10 mx-5 mt-5">
                                <div class="position-relative mt-3">
                                    <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$bem_voted->candidate->candidate_number}}</label></div>
                                </div>
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3"> 
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($bem_voted->candidate->image){
                                                if (Storage::exists($bem_voted->candidate->image)) {
                                                    $path = Storage::url($bem_voted->candidate->image);
                                                }
                                            }
                                        @endphp 
                                        <img src="{{$path}}" class="img-fluid mx-auto d-block img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$bem_voted->candidate->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$bem_voted->candidate->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$bem_voted->candidate->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$bem_voted->candidate->program!!}
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 text-center text-muted">
                                    Anda telah memilih kandidat ini pada tanggal <br>
                                    {{date('d M Y', strtotime($bem_voted->created_at))}} pada pukul {{date('H:i', strtotime($bem_voted->created_at))}}
                                </p>
                            </div>
                        </div>
                    @endif
                @endif
                
            </div>
        </div>
    </section>

    <!-- BPM Desktop -->
    <section class="section-bem mt-5 mb-5 d-none d-md-block" id="BPM-DESKTOP">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-besar">
                    Pemilihan Umum <br>
                    Badan Perwakilan Mahasiswa
                </h1>
                @if (Auth::user()->bpm_voted != 1)
                    <div class="row">
                        @foreach ($bpm as $item)
                            <div class="col-md-5 mx-5 mt-5" id="resolutionTabletIpad">
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3">
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$item->candidate_number}}</label></div>
                                        </div>
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($item->image){
                                                if (Storage::exists($item->image)) {
                                                    $path = Storage::url($item->image);
                                                }
                                            }
                                        @endphp 
                                        <img src="{{$path}}" class="img-fluid img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$item->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$item->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$item->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$item->program!!}
                                        </div>
                                    </div>
                                    <button class="btn btn-biru col-4 mt-3" type="button" onclick="visiMisi({{$item->id}})">Visi & Misi</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else 
                    @if ($bpm_voted)
                        <div class="row d-flex justify-content-center" >
                            <div class="col-md-5 mx-5 mt-5">
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3">
                                        <div class="position-relative">
                                            <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$bpm_voted->candidate->candidate_number}}</label></div>
                                        </div>
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($bpm_voted->candidate->image){
                                                if (Storage::exists($bpm_voted->candidate->image)) {
                                                    $path = Storage::url($bpm_voted->candidate->image);
                                                }
                                            }
                                        @endphp
                                        <img src="{{$path}}" class="img-fluid img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$bpm_voted->candidate->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$bpm_voted->candidate->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$bpm_voted->candidate->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$bpm_voted->candidate->program!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-center text-muted">
                                Anda telah memilih kandidat ini pada tanggal <br>
                                {{date('d M Y', strtotime($bpm_voted->created_at))}} pada pukul {{date('H:i', strtotime($bpm_voted->created_at))}}
                            </p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <!-- BPM  Mobile-->
    <section class="section-bem mb-5 d-sm-block d-md-none" id="BPM-MOBILE">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-besar">
                    Pemilihan Umum <br>
                    Badan Perwakilan Mahasiswa
                </h1>
                @if (Auth::user()->bpm_voted != 1)
                    <div class="row" >
                        @foreach ($bpm as $item)
                            <div class="col-10 mx-5 mt-5">
                                <div class="position-relative mt-3">
                                    <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$item->candidate_number}}</label></div>
                                </div>
                                <div class="row card-calon d-flex justify-content-center py-5">
                                    <div class="col-md-3">  
                                        @php
                                            $path = asset('front/assets/image/James.png');
                                            if($item->image){
                                                if (Storage::exists($item->image)) {
                                                    $path = Storage::url($item->image);
                                                }
                                            }
                                        @endphp 
                                        <img src="{{$path}}" class="img-fluid mx-auto d-block img-candidate" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <label class="nama">
                                            {{$item->chairman_name}}
                                        </label><br>
                                        <label class="fakultas">
                                            {{$item->faculties->name}}
                                        </label><br>
                                        <label class="program">
                                            {{$item->studyPrograms->name}}
                                        </label>
                                        <div class="organisasi mt-2">
                                            {!!$item->program!!}
                                        </div>
                                    </div>
                                    <button class="btn btn-biru col-4 mt-3" type="button" onclick="visiMisi({{$item->id}})">Visi & Misi</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else 
                    @if ($bpm_voted)
                    <div class="row" >
                        <div class="col-10 mx-5 mt-5">
                            <div class="position-relative mt-3">
                                <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">{{$bpm_voted->candidate->candidate_number}}</label></div>
                            </div>
                            <div class="row card-calon d-flex justify-content-center py-5">
                                <div class="col-md-3">  
                                    @php
                                        $path = asset('front/assets/image/James.png');
                                        if($bpm_voted->candidate->image){
                                            if (Storage::exists($bpm_voted->candidate->image)) {
                                                $path = Storage::url($bpm_voted->candidate->image);
                                            }
                                        }
                                    @endphp
                                    <img src="{{$path}}" class="img-fluid mx-auto d-block img-candidate" alt="">
                                </div>
                                <div class="col-md-7">
                                    <label class="nama">
                                        {{$bpm_voted->candidate->chairman_name}}
                                    </label><br>
                                    <label class="fakultas">
                                        {{$bpm_voted->candidate->faculties->name}}
                                    </label><br>
                                    <label class="program">
                                        {{$bpm_voted->candidate->studyPrograms->name}}
                                    </label>
                                    <div class="organisasi mt-2">
                                        {!!$bpm_voted->candidate->program!!}
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 text-center text-muted">
                                Anda telah memilih kandidat ini pada tanggal <br>
                                {{date('d M Y', strtotime($bpm_voted->created_at))}} pada pukul {{date('H:i', strtotime($bpm_voted->created_at))}}
                            </p>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

    <!-- Modal Visi dan Misi -->
    <div class="modal fade" id="visiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front')}}/assets/image/close.png" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Visi & Misi
                        </h5>
                        <h5 class="text-top" id="modal_name">
                            ---
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <img id="modal_image" src="{{asset('front')}}/assets/image/James.png" class="img-fluid mx-auto d-block mb-4 img-candidate" alt="">
                                <h5 class="fw-bold text-center mb-3">
                                    Visi
                                </h5>
                                <p class="visi mx-5 mb-5" id="modal_visi">
                                    ---
                                </p>
                                <h5 class="fw-bold text-center mt-5 mb-3">
                                    Misi
                                </h5>
                                <div class="" id="modal_misi">
                                    ---
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" onclick="electAlert()">Pilih</button>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mx-3 my-3 text-start d-sm-block d-md-none">
                            <div class="px-2 py-2 content-modal">
                                <img id="modal_mobile_image" src="{{asset('front')}}/assets/image/James.png" class="img-fluid mx-auto d-block mb-4 mt-3 img-candidate" alt="">
                                <h5 class="fw-bold text-center mb-3">
                                    Visi
                                </h5>
                                <p class="visi mx-4 mb-4" id="modal_mobile_visi">
                                    ---
                                </p>
                                <h5 class="fw-bold text-center mt-5 mb-3">
                                    Misi
                                </h5>
                                <div class="p-4" id="modal_mobile_misi">
                                    ---
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" onclick="electAlert()">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-footer text-center">
        <div class="container">
            <div class="row">
                <img src="{{asset('front')}}/assets/image/Vector.png" class="img-fluid w-auto mx-auto d-block mt-5" alt="">
                <h5 class="text-trm mt-3">
                    Terima Kasih
                </h5>
                <h5 class="mt-1 text-sudah">
                    Sudah Menggunakan Hak Suaramu
                </h5>
                <h5 class="mt-3 text-center text-kecil mb-5">
                    
                    Build with passion by <a href="http://instagram.com/tahungoding" style="all:unset;cursor:pointer"><font class="tahu">TAHU</font><font class="ngoding">NGODING</font></a> 
                </h5>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    var id_candidate;

    function visiMisi(id) {

        var visi = new bootstrap.Modal(document.getElementById('visiModal'), {
            keyboard: false
        })
        visi.show()

        fetch("{{url('candidate-detail')}}/"+id)
        .then(response => response.json())
        .then(data => {

            var res = data;

            var modal_name = document.getElementById('modal_name');
            var modal_image = document.getElementById('modal_image');
            var modal_visi = document.getElementById('modal_visi');
            var modal_misi = document.getElementById('modal_misi');
            var modal_mobile_name = document.getElementById('modal_mobile_name');
            var modal_mobile_image = document.getElementById('modal_mobile_image');
            var modal_mobile_visi = document.getElementById('modal_mobile_visi');
            var modal_mobile_misi = document.getElementById('modal_mobile_misi');

            window.candidate = res.data;
            modal_name.innerHTML = res.data.chairman_name;
            modal_image.setAttribute("src", res.data.image); 
            modal_visi.innerHTML = res.data.vision;
            modal_misi.innerHTML = res.data.mission;
            modal_mobile_image.setAttribute("src", res.data.image); 
            modal_mobile_visi.innerHTML = res.data.vision;
            modal_mobile_misi.innerHTML = res.data.mission;

        }).catch(err => console.error(err))
    }

    function electAlert() {

        Swal.fire({
            title: `Pilih kandidat ${candidate.chairman_name} ?`,
            type: "question",
            showCancelButton: !0,
            confirmButtonColor: "#792737",
            confirmButtonText: "Ya, Saya yakin!",
            cancelButtonText: "Tidak, batal."
        }).then(function (t) {
            if (t.value) {
                Swal.fire({
                    icon: 'success',
                    title: 'Anda berhasil memilih',
                    showConfirmButton: false,
                    timer: 1500
                })
                setInterval(() => {
                    window.location.href = `${candidate.url}`
                }, 2000);
            }
        })
    }

    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
    });
</script>
@endsection
