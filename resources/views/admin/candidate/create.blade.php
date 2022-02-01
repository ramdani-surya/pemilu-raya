@extends('admin.layouts.master', ['slug' => $slug])

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }

        .dropify-wrapper {
            border: 1px solid #e2e7f1 !important;
            border-radius: .3rem;
        }


        label.error {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            margin-top: 5px;
            padding: 0;
        }

        input.error {
            color: #F94687;
            border: 1px solid #F94687;
        }

    </style>
@endsection

@section('content')
    @php
        if(isset($slug)) {
            
        } else {
            $slug = null;
        }
    @endphp
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('candidates.index') }}">Kandidat</a></li>
            @if(isset($slug))
            <li class="breadcrumb-item"><a href="{{ route('candidates.show', $slug) }}">{{ ucfirst($slug) }}</a></li>
            @endif
            <li class="breadcrumb-item active"><a href="{{ url()->current() }}">Tambah Kandidat</a></li>
        </ol>
    </div>
    <!-- start form -->
    <form action="{{ route('candidates.store') }}" method="post" enctype="multipart/form-data" name="myForm">
        @csrf
        <input type="hidden" name="candidateTypeUrl" id="candidateTypeUrl">
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Kandidat</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Periode">Periode<span class="text-danger">*</span></label>
                            <input type="hidden" name="election" value="{{ getActiveElection()->id }}">
                            <input type="text" class="form-control" value="{{ getActiveElection()->period }}" disabled>

                            @error('election')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomorKandidat">Tipe Kandidat<span class="text-danger">*</span></label>
                            <select name="candidate_type_id" id="candidateTypeId" onchange="selectValue()"
                                class="form-control @error('candidate_type_id') is-invalid @enderror">
                                <option value="">Pilih Tipe Kandidat</option>
                                @foreach ($candidate_type as $candidate_types)
                                    <option value="{{ $candidate_types->id }}">{{ $candidate_types->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('candidate_type_id')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="candidate_number" id="candidateNumberHidden">
                            <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>
                            <input type="text" id="candidateNumber" class="form-control @error('candidate_number') is-invalid @enderror" disabled>
                            @error('candidate_number')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="namaKetua">Nama Kandidat<span class="text-danger">*</span></label>
                            <input type="text" name="chairman_name" parsley-trigger="change"
                                placeholder="Masukkan Nama Ketua" value="{{ old('chairman_name') }}"
                                class="form-control @error('chairman_name') is-invalid @enderror" id="chairman_name">
                            @error('chairman_name')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="faculty_id">Fakultas<span class="text-danger">*</span></label>
                            <select name="faculty_id" id="faculty"
                                class="form-control @error('faculty_id') is-invalid @enderror">
                                <option value="">Pilih Fakultas</option>
                                @foreach ($faculty as $faculties)
                                    <option value="{{ $faculties->id }}">{{ $faculties->name }}</option>
                                @endforeach
                            </select>

                            @error('faculty_id')
                                <div class="mt-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="study_program_id">Program Study<span class="text-danger">*</span></label>
                            <select class="form-control @error('study_program_id') is-invalid @enderror"
                                name="study_program_id" id="study_program">

                            </select>

                            @error('study_program_id')
                                <div class="mt-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="vision">Visi<span class="text-danger">*</span></label>
                                    <textarea class="ckeditor form-control" name="vision">{{ old('vision') }}</textarea>
                                    @error('vision')
                                        <style>
                                            .cke_chrome {
                                                border: 1px solid #F94687 !important;
                                            }
                                        </style>

                                        <div class="mt-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="mision">Misi<span class="text-danger">*</span></label>
                                    <textarea class="ckeditor form-control" name="mision">{{ old('mision') }}</textarea>
                                    @error('mision')
                                        <style>
                                            .cke_chrome {
                                                border: 1px solid #F94687 !important;
                                            }
                                        </style>

                                        <div class="mt-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="program">Program<span class="text-danger">*</span></label>
                                    <textarea class="ckeditor form-control" name="program">{{ old('program') }}</textarea>

                                    @error('program')
                                        <style>
                                            .cke_chrome {
                                                border: 1px solid #F94687 !important;
                                            }
                                        </style>

                                        <div class="mt-2">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="image-wrap">
                                        <label for="image">Gambar<span class="text-danger">*</span></label><br>
                                        <img id="preview-image-before-upload"
                                            src="{{ asset('images/admin_component/imageNoAvailable.svg') }}"
                                            alt="preview image" style="max-height: 250px;">
                                    </div>
                                    <div class="validasi-foto">
                                        <p class="sub-header mt-2">Upload Foto</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image"
                                                    class="custom-file-input @error('image') is-invalid @enderror">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="mt-2">

                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                    class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                            @if(isset($slug))
                            <a href="{{ route('candidates.show', $slug) }}"
                                class="btn btn-md btn-light waves-effect"><i class="fa fa-undo mr-1"></i> Kembali</a>
                            @else 
                            <a href="{{ route('candidates.index') }}"
                                class="btn btn-md btn-light waves-effect"><i class="fa fa-undo mr-1"></i> Kembali</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </form>
    <!-- end form -->
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Datatable -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

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

        function selectValue() {
            $("#candidateTypeUrl").val($("#candidateTypeId option:selected" ).text().toLowerCase())
        }

    </script>

    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

    <script>
        $('.dropify').dropify();
    </script>

    <script>
        $(document).ready(function() {
            $('#faculty').on('change', function() {
                var facultyId = $(this).val();
                if (facultyId) {
                    $.ajax({
                        url: '/admin/get-study-program/' + facultyId,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#study_program').empty();
                                $('#study_program').append(
                                    '<option hidden>Pilih Program Studi</option>');
                                $.each(data, function(key, course) {
                                    $('select[name="study_program_id"]').append(
                                        '<option value="' + course.id + '">' + course
                                        .name + '</option>');
                                });
                            } else {
                                $('#study_program').empty();
                            }
                        }
                    });
                } else {
                    $('#study_program').empty();
                }
            });

            $('#candidateTypeId').on('change', function() {
                var candidateTypeId = $(this).val();
                if (candidateTypeId) {
                    $.ajax({
                        url: '/admin/get-candidate-number/' + candidateTypeId,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                                 $("#candidateNumber").val(data);
                                 $("#candidateNumberHidden").val(data);
                        }
                    });
                } 
            });
        });
    </script>
@endsection
