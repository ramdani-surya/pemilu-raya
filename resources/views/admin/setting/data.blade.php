@extends('layouts.master')

@section('title_menu')
    Pengaturan
@endsection

@section('title')
    Data Akun
@endsection

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form action="{{ route('admin.update-account', Auth::user()->id) }}" method="post" class="parsley-examples"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="edit_name">Nama<span class="text-danger">*</span></label>
                            <input type="text" name="edit_name" class="form-control @error('edit_name') is-invalid @enderror"
                             value="{{ Auth::user()->name }}">
                            @error('edit_name')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="candidate_type">Username<span class="text-danger">*</span></label>
                            <input type="text" name="edit_username" class="form-control @error('edit_username') is-invalid @enderror"
                             value="{{ Auth::user()->username }}">
                            @error('edit_username')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="edit_email" class="form-control @error('edit_email') is-invalid @enderror"
                             value="{{ Auth::user()->email }}">
                            @error('edit_email')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <div class="image-wrap">
                                <label for="edit_image">Gambar<span class="text-danger">*</span></label><br>
                                <img id="preview-image-before-upload"
                                    src="@if(!empty(Auth::user()->image) &&
                                    Storage::exists(Auth::user()->image)){{ Storage::url(Auth::user()->image) }}@else {{ asset('images/admin_component/imageNoAvailable.svg') }} @endif" alt="preview image"
                                    style="max-height: 250px;">
                            </div>
                            <div class="validasi-foto">
                                <p class="sub-header mt-2">Upload Foto</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="edit_image" id="image" class="custom-file-input  @error('edit_image') is-invalid @enderror">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @error('edit_image')
                                <div class="mt-2">
                                   
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                    class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <!-- Datatable -->
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
