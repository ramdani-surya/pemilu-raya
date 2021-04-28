@extends('admin.layouts.master')

@section('subtitle')
Data Kandidat
@endsection

@section('subtitle-in')
<li class="breadcrumb-item active">Edit Kandidat</li>
@endsection


@section('css')
<!--venobox lightbox-->
<link rel="stylesheet" href="{{ asset('highdmin/libs/magnific-popup/magnific-popup.css') }}" />
@endsection

@section('content')
<!-- start form -->
<form action="{{ route('candidates.update', $candidate->id) }}" method="post" class="parsley-examples"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">EDIT DATA KANDIDAT</h4>
                <p class="sub-header">
                    Di halaman ini anda dapat mengubah data dari kandidat yang dipilih.
                </p>
                <div class="form-group">
                    <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>
                    <input type="text" name="edit_candidate_number" parsley-trigger="change"
                        placeholder="Masukkan Nomor Kandidat"
                        class="form-control @error('edit_candidate_number') is-invalid @enderror"
                        id="edit_candidate_number" value="{{ $candidate->candidate_number }}" min="1" minlength="1"
                        maxlength="2"
                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                    @error('edit_candidate_number')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaKetua">Nama Ketua<span class="text-danger">*</span></label>
                    <input type="text" name="edit_chairman_name" parsley-trigger="change"
                        placeholder="Masukkan Nama Ketua"
                        class="form-control @error('edit_chairman_name') is-invalid @enderror" id="edit_chairman_name"
                        value="{{ $candidate->chairman_name }}">
                    @error('edit_chairman_name')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaWakil">Nama Wakil<span class="text-danger">*</span></label>
                    <input type="text" name="edit_vice_chairman_name" parsley-trigger="change"
                        placeholder="Masukkan Nama Wakil Ketua"
                        class="form-control @error('edit_vice_chairman_name') is-invalid @enderror"
                        id="vice_chairman_name" value="{{ $candidate->vice_chairman_name }}">
                    @error('edit_vice_chairman_name')
                    <div class="mt-1">
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
            <div class="card-box validasi-edit-foto">
                <h4 class="header-title">KETUA DAN WAKIL KETUA</h4>
                <p class="sub-header">
                    Ini merupakan foto dari kandidat ketua dan wakil ketua
                </p>

                <div class="form-group mb-0">
                    <img id="preview-image-before-upload"
                        src="{{ asset('images/admin_component/imageNoAvailable.svg') }}" alt="preview image"
                        style="max-height: 250px;">
                    <p class="sub-header mt-2">Upload Foto</p>
                    <input type="file" name="edit_image" class="filestyle" data-buttonBefore="true" id="image">

                    @error('edit_image')
                    <div class="mt-2">
                        <style>
                            .validasi-edit-foto {
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
        <div class="col-lg-12">
            <div class="card-box validasi-edit-program">
                <h4 class="header-title">Program</h4>
                <p class="sub-header">
                    Di kolom ini anda dapat menambahkan program kandidat.
                </p>

                <div class="form-group mb-0">
                    <textarea class="ckeditor form-control" name="edit_program">{{ $candidate->program }}</textarea>

                    @error('edit_program')
                    <style>
                        .validasi-edit-program {
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
                        Update
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
<!--venobox lightbox-->
<script src="{{ asset('highdmin/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Gallery Init-->
<script src="{{ asset('highdmin/js/pages/gallery.init.js') }}"></script>
<!-- Filestyle js -->
<script src="{{ asset('highdmin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
<!-- Katek js -->
<script src="{{ asset('highdmin/libs/katex/katex.min.js') }}"></script>
<!-- Ckeditor -->
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

        $('#image2').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload2').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection