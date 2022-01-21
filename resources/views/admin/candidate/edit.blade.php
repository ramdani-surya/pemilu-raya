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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                    <label for="namaKetua">Nama Kandidat<span class="text-danger">*</span></label>
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
                    <label for="edit_faculty">Fakultas<span class="text-danger">*</span></label>
                    <select name="edit_faculty" class="form-control">
                        <option value="fti">FTI</option>
                        <option value="feb">FEB</option>
                        <option value="fisip">FISIP</option>
                        <option value="fkip">FKIP</option>
                        <option value="fib">FIB</option>
                    </select>

                    @error('factulty')
                        <div class="mt-2">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="edit_study_program">Program Studi<span class="text-danger">*</span></label>
                    <select name="edit_study_program" class="form-control">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Operasi">Sistem Operasi</option>
                    </select>

                    @error('edit_study_program')
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
            <div class="card-box validasi-edit-foto">
                <h4 class="header-title">KETUA DAN WAKIL KETUA</h4>
                <p class="sub-header">
                    Ini merupakan foto dari kandidat ketua dan wakil ketua
                </p>

                <div class="form-group mb-0">
                    <img id="preview-image-before-upload"
                        src="@if(!empty($candidate->image) && Storage::exists($candidate->image)) {{ Storage::url($candidate->image) }} @endif" alt="preview image"
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

                <div class="form-group d-flex justify-content-end mt-4">
                    <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i class="fas fa-save mr-1"></i> Simpan Perubahan</button>
                    <a href="{{ route('candidates.index') }}" class="btn btn-md btn-light waves-effect"><i class="fas fa-undo-alt mr-1"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- start row -->
    
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