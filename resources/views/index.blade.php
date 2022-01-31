@extends('layouts.master')

@section('title')
Kandidat
@endsection

@section('css')
    <style>
        .login {
            background: #17a2b8 !important;
        }
    </style>
@endsection

@section('content')
<main>
    <section class="section-header">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 mb-5">
                    Hi, <b>{{Auth::user()->name}}</b> Silahkan pakai hak suaramu !
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
                    <div class="d-grid gap-2 d-block">
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
                <div class="row" >
                    @foreach ($bem as $item)
                        <div class="col-md-5 mx-5 mt-5">
                            <div class="row card-calon d-flex justify-content-center py-5">
                                <div class="col-md-3">  
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">1</label></div>
                                    </div>
                                    <img src="{{asset('front')}}/assets/image/James.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-7">
                                    <label class="nama">
                                        {{$item->chairman_name}}
                                    </label><br>
                                    <label class="nim">
                                        {{$item->faculties->name}}
                                    </label><br>
                                    <label class="fakultas">
                                        {{$item->studyPrograms->name}}
                                    </label>
                                    <div class="organisasi mt-2">
                                        <label>Riwayat Organisasi</label>
                                        <ol>
                                            <li>Anggota Senat Mahasiswa FISIP 2020</li>
                                            <li>Wakil Ketua UKM Kajian Islam 2020</li>
                                            <li>Anggota UKM Himpunan Mahasiswa 2020</li>
                                        </ol>
                                    </div>
                                </div>
                                <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                <div class="row" >
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">1</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">  
                                <img src="{{asset('front')}}/assets/image/James.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama mt-2">
                                    Ira Septiani
                                </label><br>
                                <label class="nim">
                                    E1935223429
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Sosial dan Ilmu Politik
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Anggota Senat Mahasiswa FISIP 2020</li>
                                        <li>Wakil Ketua UKM Kajian Islam 2020</li>
                                        <li>Anggota UKM Himpunan Mahasiswa 2020</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">2</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <img src="{{asset('front')}}/assets/image/James 2.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama mt-2">
                                    Muhammad Khaerudin
                                </label><br>
                                <label class="nim">
                                    D11903962
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Ekonomi dan Bisnis
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Anggota Senat Mahasiswa FEB 2021</li>
                                        <li>Wakil Ketua Binokasih 2021</li>
                                        <li>Ketua Angkatan 2019</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">3</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <img src="{{asset('front')}}/assets/image/James 3.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama mt-2">
                                    Muhammad Fajar Fadillah
                                </label><br>
                                <label class="nim">
                                    C119200013
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Ilmu Budaya
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Anggota BPM 2020</li>
                                        <li>Anggota PMII 2019</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">4</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <img src="{{asset('front')}}/assets/image/James 4.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama mt-2">
                                    Muhammad Eri Rizki
                                </label><br>
                                <label class="nim">
                                    A21900112
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Teknologi Informasi
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Ketua Eskul Pramuka 2016</li>
                                        <li>Ketua UKM Kajian Islam 2020</li>
                                        <li>Wakil Ketua Senat Mahasiswa 2021</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                </div>
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
                <div class="row" >
                    <div class="col-md-5 mx-5 mt-5">
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <div class="position-relative">
                                    <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">1</label></div>
                                </div>
                                <img src="{{asset('front')}}/assets/image/James 5.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama">
                                    Sandi
                                </label><br>
                                <label class="nim">
                                    D11904036
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Ekonomi dan Bisnis
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Anggota Pramuka Ambalan 2018</li>
                                        <li>Ketua Dewan Saka Bhayangkara 2018</li>
                                        <li>Dewan Kerja Ranting Sumedang Utara 2018</li>
                                        <li>Dewan Kerja Cabang Sumedang 2019</li>
                                        <li>Anggota Senat Mahasiswa 2020</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                    <div class="col-md-5 mx-5 mt-5">
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <div class="position-relative">
                                    <div class="position-absolute top-0 start-0 translate-middle me-5 px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">2</label></div>
                                </div>
                                <img src="{{asset('front')}}/assets/image/James 6.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama">
                                    Teten Tahroni
                                </label><br>
                                <label class="nim">
                                    19210120663
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Keguruan dan Ilmu Pendidikan
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Komisi I BPM FKIP 2021</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                </div>
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
                <div class="row" >
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">1</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">  
                                <img src="{{asset('front')}}/assets/image/James 5.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama">
                                    Sandi
                                </label><br>
                                <label class="nim">
                                    D11904036
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Ekonomi dan Bisnis
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Anggota Pramuka Ambalan 2018</li>
                                        <li>Ketua Dewan Saka Bhayangkara 2018</li>
                                        <li>Dewan Kerja Ranting Sumedang Utara 2018</li>
                                        <li>Dewan Kerja Cabang Sumedang 2019</li>
                                        <li>Anggota Senat Mahasiswa 2020</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                    <div class="col-10 mx-5 mt-5">
                        <div class="position-relative mt-3">
                            <div class="position-absolute mt-3 top-0 start-50 translate-middle-x px-3 rounded-circle py-2 border border-3" style="border-color: #0F1F3C !important;"><label class="fw-bold fs-6">2</label></div>
                        </div>
                        <div class="row card-calon d-flex justify-content-center py-5">
                            <div class="col-md-3">
                                <img src="{{asset('front')}}/assets/image/James 6.png" class="img-fluid mx-auto d-block" alt="">
                            </div>
                            <div class="col-md-7">
                                <label class="nama">
                                    Teten Tahroni
                                </label><br>
                                <label class="nim">
                                    19210120663
                                </label><br>
                                <label class="fakultas">
                                    Fakultas Keguruan dan Ilmu Pendidikan
                                </label>
                                <div class="organisasi mt-2">
                                    <label>Riwayat Organisasi</label>
                                    <ol>
                                        <li>Komisi I BPM FKIP 2021</li>
                                    </ol>
                                </div>
                            </div>
                            <button class="btn btn-biru col-4 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#visiModal">Visi & Misi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Visi dan Misi -->
    <div class="modal fade" id="visiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="#" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front')}}/assets/image/close.png" alt=""></a>
                    <div class="text-center">
                        <h5 class="text-top mt-5">
                            Visi & Misi
                        </h5>
                        <h5 class="text-top">
                            Ira Septiani
                        </h5>
                        <!-- Desktop -->
                        <div class="mx-5 my-5 text-start d-none d-md-block">
                            <div class="px-5 py-5 content-modal">
                                <img src="{{asset('front')}}/assets/image/James.png" class="img-fluid mx-auto d-block mb-4" alt="">
                                <h5 class="fw-bold text-center mb-3">
                                    Visi
                                </h5>
                                <p class="visi mx-5 mb-5">
                                    UNSAP JUARA (JUJUR, UNGGUL, AKTIF, RESPONSIF, ADIL) Mewujudkan BEM UNSAP yang Jujur, Unggul, Aktif, Responsif dan Adil dalam lingkup univ maupun masyarakat luas.
                                </p>
                                <h5 class="fw-bold text-center mt-5 mb-3">
                                    Misi
                                </h5>
                                <ol class="visi mx-5">
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-target="#pilihModal" data-bs-toggle="modal">Pilih</button>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="mx-3 my-3 text-start d-sm-block d-md-none">
                            <div class="px-2 py-2 content-modal">
                                <img src="{{asset('front')}}/assets/image/James.png" class="img-fluid mx-auto d-block mb-4 mt-3" alt="">
                                <h5 class="fw-bold text-center mb-3">
                                    Visi
                                </h5>
                                <p class="visi mx-5 mb-5">
                                    UNSAP JUARA (JUJUR, UNGGUL, AKTIF, RESPONSIF, ADIL) Mewujudkan BEM UNSAP yang Jujur, Unggul, Aktif, Responsif dan Adil dalam lingkup univ maupun masyarakat luas.
                                </p>
                                <h5 class="fw-bold text-center mt-5 mb-3">
                                    Misi
                                </h5>
                                <ol class="visi mx-5">
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui quibusdam quam repellendus a porro est ex sapiente. Fugit quo sunt autem fugiat similique quibusdam dolores repellat natus voluptatibus blanditiis vero, incidunt eum eos odit consequuntur recusandae alias ducimus et laudantium, impedit corrupti nobis, officia dolorum iusto. Fuga dolore quia accusantium!
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam provident consectetur eius eaque modi incidunt eum dolorem. Debitis harum natus explicabo a corporis magni velit nam unde eveniet quod, corrupti voluptatem rem neque esse sequi porro dolorum. Debitis nam dignissimos, eveniet reprehenderit at vero, molestiae, ipsum id vitae magnam maxime?
                                    </li><br>
                                    <li>
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus officiis, inventore rem quis accusamus quas fugit modi omnis necessitatibus! Iusto, facilis vitae voluptates eius tenetur, illo ratione cum eligendi amet cupiditate, assumenda corporis aperiam asperiores est quasi quam! Voluptate tenetur quis aut et dicta perspiciatis numquam eligendi iste non recusandae!
                                    </li>
                                </ol>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-mengerti rounded-3" type="button" data-bs-target="#pilihModal" data-bs-toggle="modal">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pilih -->
    <div class="modal fade" id="pilihModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-style modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="milih-bem.html" class="text-decoration-none" data-bs-dismiss="modal"><img class="float-end" src="{{asset('front')}}/assets/image/close.png" alt=""></a>
                    <img src="{{asset('front')}}/assets/image/Vector 2.png" class="img-fluid w-auto mx-auto d-block mt-5" alt="">
                    <div class="text-center mt-3">
                        <h5 class="fw-bold">
                            Berhasil!
                        </h5>
                        <p>
                            Terima kasih sudah <br>
                            menggunakan hak suaramu
                        </p>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-mengerti rounded-3" type="button"><a href="milih-bem.html" class="text-decoration-none text-white">Kembali</a></button>
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
                    Build with passion by <font class="tahu">TAHU</font><font class="ngoding">NGODING</font>
                </h5>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script>
    function electAlert(e) {
        let candidate = JSON.parse(e.dataset.candidate)

        Swal.fire({
            title: `Pilih kandidat ${candidate.chairman_name} - ${candidate.vice_chairman_name}?`,
            type: "question",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Saya yakin!",
            cancelButtonText: "Tidak, batal."
        }).then(function (t) {
            if (t.value) {
                window.location.href = `${e.dataset.url}`
            }
        })
    }

</script>
@endsection
