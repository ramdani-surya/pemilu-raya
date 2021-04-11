@extends('admin.layouts.master')

@section('subtitle')
Data Pemilu
@endsection

@section('css')
<!--venobox lightbox-->
<link rel="stylesheet" href="{{ asset('highdmin/libs/magnific-popup/magnific-popup.css') }}" />
@endsection

@section('content')
<form action="{{ route('candidates.update', $candidate->id) }}" method="post" class="parsley-examples" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">EDIT DATA KANDIDAT</h4>
                <p class="sub-header">
                    Di halaman ini anda dapat mengubah data dari kandidat yang dipilih.
                </p>
                <div class="form-group">
                    <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>
                    <input type="number" name="edit_candidate_number" parsley-trigger="change" placeholder="Masukkan Nomor Kandidat" class="form-control @error('edit_candidate_number') is-invalid @enderror" id="edit_candidate_number" value="{{ $candidate->candidate_number }}">
                    @error('edit_candidate_number')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaKetua">Nama Ketua<span class="text-danger">*</span></label>
                    <input type="text" name="edit_chairman_name" parsley-trigger="change" placeholder="Masukkan Nama Ketua" class="form-control @error('edit_chairman_name') is-invalid @enderror" id="edit_chairman_name" value="{{ $candidate->chairman_name }}">
                    @error('edit_chairman_name')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="namaWakil">Nama Wakil<span class="text-danger">*</span></label>
                    <input type="text" name="edit_vice_chairman_name" parsley-trigger="change" placeholder="Masukkan Nama Wakil Ketua" class="form-control @error('edit_vice_chairman_name') is-invalid @enderror" id="vice_chairman_name" value="{{ $candidate->vice_chairman_name }}">
                    @error('edit_vice_chairman_name')
                    <div class="mt-1">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title">KETUA</h4>
                <p class="sub-header">
                    Ini merupakan foto dari ketua kandidat
                </p>

                <div class="card filter-item all webdesign illustrator">
                    <a href="{{ asset('images/'. $candidate->chairman_photo) }}" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                @if(empty($candidate->vice_chairman_photo))
                                <img src="{{ asset('images/imageNoAvailable.svg') }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @else
                                <img src="{{ asset('images/'. $candidate->chairman_photo) }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @endif
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">{{ $candidate->chairman_name }}</h4>
                                <p>KETUA</p>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="form-group mb-0">
                    <p class="sub-header">Upload Foto Ketua</p>
                    <input type="file" name="edit_chairman_photo" class="filestyle" data-buttonBefore="true">
                    @error('edit_chairman_photo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title">WAKIL KETUA</h4>
                <p class="sub-header">
                    Ini merupakan foto dari wakil ketua kandidat
                </p>

                <div class="card filter-item all webdesign illustrator">
                    <a href="{{ asset('images/'. $candidate->vice_chairman_photo) }}" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                @if(empty($candidate->vice_chairman_photo))
                                <img src="{{ asset('images/imageNoAvailable.svg') }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @else
                                <img src="{{ asset('images/'. $candidate->vice_chairman_photo) }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @endif
                            </div>
                            <div class="portfolio-masonry-detail">
                                <h4 class="font-18">{{ $candidate->vice_chairman_name }}</h4>
                                <p>WAKIL KETUA</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="form-group mb-0">
                    <p class="sub-header">Upload Foto Wakil Ketua</p>
                    <input type="file" name="edit_vice_chairman_photo" class="filestyle" data-buttonBefore="true">
                    @error('edit_vice_chairman_photo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <!-- CKEDITOR BORDER COLOR -->
    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }
    </style>    

    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title">VISI</h4>
                <p class="sub-header">
                    Visi adalah gambaran besar, tujuan utama dan cita-cita suatu perusahaan, instansi, pribadi atau organisasi di masa depan.
                </p>
                <div class="form-group">
                    <textarea class="ckeditor form-control" name="edit_vision">{{ $candidate->vision }}</textarea>

                    @error('edit_vision')
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror


                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title">MISI</h4>
                <p class="sub-header">
                    Misi adalah Penjabaran atau langkah-langkah yang akan dilakukan untuk mencapai / mewujudkan visi tersebut.
                </p>
                <div class="form-group">
                    <textarea class="ckeditor form-control" name="edit_mission">{{ $candidate->mission }}</textarea>

                    @error('edit_mission')
                    <div class="mt-2">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                    @enderror

                </div>
            </div>
        </div>
    </div>

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
</form>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

<script src="{{ asset('highdmin/js/vendor.min.js') }}"></script>
<!--venobox lightbox-->
<script src="{{ asset('highdmin/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Gallery Init-->
<script src="{{ asset('highdmin/js/pages/gallery.init.js') }}"></script>
<script src="{{ asset('highdmin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>

<!-- Plugins js -->
<script src="{{ asset('highdmin/libs/katex/katex.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection