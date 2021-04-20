@extends('admin.layouts.master')

@section('subtitle')
Data Kandidat
@endsection

@section('subtitle-in')
<li class="breadcrumb-item active">Tambah Kandidat</li>
@endsection

@section('content')
<!-- start form -->
<form action="{{ route('candidates.store') }}" method="post" enctype="multipart/form-data" name="myForm">
    @csrf
    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">TAMBAH DATA KANDIDAT</h4>
                <p class="sub-header">
                    Di halaman ini anda dapat menambahkan data kandidat.
                </p>

                <div class="form-group">
                    <label for="Periode">Periode<span class="text-danger">*</span></label>
                    <input type="hidden" name="election" value="{{ getActiveElection()->id }}">
                    <input type="text" class="form-control" value="{{ getActiveElection()->period }}" disabled>

                    @error('election')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>
                    <input type="number" name="candidate_number" parsley-trigger="change"
                        placeholder="Masukkan Nomor Kandidat" class="form-control" id="candidate_number"
                        value="{{ old('candidate_number') }}" min="1">

                    @error('candidate_number')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaKetua">Nama Ketua<span class="text-danger">*</span></label>
                    <input type="text" name="chairman_name" parsley-trigger="change" placeholder="Masukkan Nama Ketua"
                        class="form-control @error('chairman_name') is-invalid @enderror" id="chairman_name"
                        value="{{ old('chairman_name') }}">

                    @error('chairman_name')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="namaWakil">Nama Wakil<span class="text-danger">*</span></label>
                    <input type="text" name="vice_chairman_name" parsley-trigger="change"
                        placeholder="Masukkan Nama Wakil Ketua"
                        class="form-control @error('vice_chairman_name') is-invalid @enderror" id="vice_chairman_name"
                        value="{{ old('vice_chairman_name') }}">

                    @error('vice_chairman_name')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box validasi-foto">
                <h4 class="header-title">KETUA DAN Wakil</h4>
                <p class="sub-header">
                    Ini merupakan foto dari kandidat ketua dan wakil
                </p>

                <div class="form-group mb-0">
                    <img id="preview-image-before-upload"
                        src="{{ asset('images/admin_component/imageNoAvailable.svg') }}" alt="preview image"
                        style="max-height: 250px;">
                    <p class="sub-header mt-2">Upload Foto</p>
                    <input type="file" name="image" class="filestyle" data-buttonBefore="true" id="image">

                    @error('image')
                    <div class="mt-2">
                        <style>
                            .validasi-foto {
                                border: 1px solid #FF3333 !important;
                                border-radius: 5px !important;
                            }
                        </style>
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- CKEDITOR BORDER COLOR -->
    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }
    </style>

    <!-- start row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box validasi-visi">
                <h4 class="header-title">VISI</h4>
                <p class="sub-header">
                    Visi adalah gambaran besar, tujuan utama dan cita-cita suatu perusahaan, instansi, pribadi atau
                    organisasi di masa depan.
                </p>
                <div class="form-group mb-0">
                    <textarea class="ckeditor form-control" name="vision">{{ old('vision') }}</textarea>

                    @error('vision')
                    <style>
                        .validasi-visi {
                            border: 1px solid #FF3333 !important;
                            border-radius: 5px !important;
                        }
                    </style>
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card-box validasi-misi">
                <h4 class="header-title">MISI</h4>
                <p class="sub-header">
                    Misi adalah Penjabaran atau langkah-langkah yang akan dilakukan untuk mencapai / mewujudkan visi
                    tersebut.
                </p>
                <div class="form-group mb-0">
                    <textarea class="ckeditor form-control" maxlength="10" minlength="1"
                        name="mission">{{ old('mission') }}</textarea>

                    @error('mission')
                    <style>
                        .validasi-misi {
                            border: 1px solid #FF3333 !important;
                            border-radius: 5px !important;
                        }
                    </style>
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="form-group text-center mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Tambahkan
                    </button>
                    <a href="{{ route('candidates.index') }}" class="btn btn-light waves-effect">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</form>
<!-- end form -->
@endsection

@section('js')
<!-- Filestyle js -->
<script src="{{ asset('highdmin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
<!-- Ckeditor js -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<!-- Image preview  -->
<script>
    $(document).ready(function(e) {
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection
