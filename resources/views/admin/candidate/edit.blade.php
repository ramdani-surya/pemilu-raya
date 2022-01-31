@extends('layouts.master')

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }

        .dropify-wrapper {
            border: 1px solid #e2e7f1;
            border-radius: .3rem;
            height: 100% !important;
        }

        .dropify-infos-message p{
            font-size: 15px !important;

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
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('candidates.index') }}">Kandidat</a></li>
            <li class="breadcrumb-item"><a href="{{ route('candidates.show', $candidate->candidateTypes->slug) }}">{{ ucfirst($candidateType) }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ url()->current() }}">Edit Kandidat</a></li>
        </ol>
    </div>
    <!-- row -->


    <form action="{{ route('candidates.update', $candidate->id) }}" method="post" class="parsley-examples"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Kandidat</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nomorKandidat">Tipe Kandidat<span class="text-danger">*</span></label>
                            {{-- <div class="row">
                                <div class="col-sm-10">
                                    <select name="edit_candidate_type_id" class="form-control @error('edit_candidate_type_id') is-invalid @enderror" id="candidateTypeId">
                                        <option value="">Pilih Tipe Kandidat</option>
                                        @foreach ($candidate_type as $candidate_types)

                                            <option value="{{ $candidate_types->id }}"  {{ $candidate_types->id == $candidate->candidateTypes->id ? 'selected' : '' }}>{{ $candidate_types->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" data-toggle="modal" data-target="#candidateTypeModal"
                                        class="btn btn-md btn-rounded btn-block btn-dark"><i class="fa fa-save mr-1"></i>
                                        Tipe
                                        Kandidat</button>
                                </div>
                            </div> --}}
                            <input type="text" class="form-control @error('edit_candidate_type_id') is-invalid @enderror"
                            value="{{ $candidate->candidateTypes->name }}" disabled>
                            @error('edit_candidate_type_id')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('edit_candidate_number') is-invalid @enderror"
                            id="candidateNumber" value="{{ $candidate->candidate_number }}" disabled>
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
                                class="form-control @error('edit_chairman_name') is-invalid @enderror"
                                id="edit_chairman_name" value="{{ $candidate->chairman_name }}">
                            @error('edit_chairman_name')
                                <div class="mt-1">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_faculty_id">Fakultas<span class="text-danger">*</span></label>
                            <select name="edit_faculty_id" id="faculty" class="form-control @error('edit_faculty_id') is-invalid @enderror">
                                <option value="">Pilih Fakultas</option>
                                @foreach ($faculty as $faculties)
                                    <option value="{{ $faculties->id }}" {{ $faculties->id == $candidate->faculty_id ? 'selected' : ''}}>{{ $faculties->name }}</option>
                                @endforeach
                            </select>

                            @error('edit_faculty_id')
                                <div class="mt-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="edit_study_program_id">Program Study<span class="text-danger">*</span></label>
                            <select class="form-control @error('edit_study_program_id') is-invalid @enderror" name="edit_study_program_id" id="study_program"></select>

                            @error('edit_study_program_id')
                                <div class="mt-2">
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edit_program">Program<span class="text-danger">*</span></label>
                                    <textarea class="ckeditor form-control"
                                        name="edit_program">{{ $candidate->program }}</textarea>

                                    @error('edit_program')
                                        <style>
                                             .cke_chrome {
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
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <div class="image-wrap">
                                        <label for="edit_image">Gambar<span class="text-danger">*</span></label><br>
                                        <img id="preview-image-before-upload"
                                            src="@if(!empty($candidate->image) &&
                                            Storage::exists($candidate->image)){{ Storage::url($candidate->image) }}@else {{ asset('images/admin_component/imageNoAvailable.svg') }} @endif" alt="preview image"
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
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-end mt-4">
                            <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                    class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                            <a href="{{ route('candidates.show', $candidate->candidateTypes->slug) }}" class="btn btn-md btn-light waves-effect"><i
                                    class="fa fa-undo mr-1"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="candidateTypeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Tipe Kandidat</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="button-list mb-3">
                        <button type="button" data-toggle="modal" data-target="#addCandidateTypeModal"
                            onclick="addCandidateType()"
                            class="btn btn-primary btn-sm btn-create waves-light waves-effect"><i
                                class="fa fa-plus-circle mr-1"></i> Tambah</button>
                        @if (count($candidate_type))
                            <button type="button" class="btn btn-danger btn-sm waves-light waves-effect" id="clearAll"><i
                                    class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                        @else
                            <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                                id="bersihkan-semua-data" disabled><i class="fa fa-trash-o mr-1"></i>
                                Bersihkan</button>
                        @endif
                    </div>
                    @foreach ($candidate_type as $candidate_types)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="day">
                                        {{ $candidate_types->name }}
                                    </div>
                                    <div class="button-list">
                                        <button type="button" data-toggle="modal"
                                            data-target="#editCandidateTypeModal{{ $candidate_types->id }}"
                                            class="btn btn-warning btn-sm text-white"
                                            onclick="editCandidateType({{ $candidate_types }})"><i
                                                class="fa fa-edit mr-1"></i>Edit</button>
                                        <form style="display: inline"
                                            action="{{ route('candidate-types.destroy', $candidate_types->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash mr-1"></i> Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addCandidateTypeModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tipe Kandidat</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidate-types.store') }}" method="post" id="addCandidateTypeForm">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="election_id"
                                value="{{ getActiveElection()->id }}">
                            <label for="name">Nama Tipe Kandidat</label>
                            <input type="text" class="form-control" name="candidate_type_name"
                                placeholder="Masukan Tipe Kandidat">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="tambahButton">Simpan Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($candidate_type as $candidate_types)
        <div class="modal fade" id="editCandidateTypeModal{{ $candidate_types->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tipe Kandidat</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('candidate_types.update', $candidate_types->id) }}" method="post"
                            id="editCandidateTypeForm{{ $candidate_types->id }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="checkCandidateType{{ $candidate_types->id }}"
                                value="{{ $candidate_types->name }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="edit_candidate_type_name"
                                    value="{{ $candidate_types->name }}" placeholder="Masukan Tipe Kandidat">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="editCandidateTypeButton">Simpan
                            Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
            ajaxfunction();
            function ajaxfunction() {
                var facultyValue = $("#faculty").val();
                    $.ajax({
                        url: '/admin/get-study-program/' + facultyValue,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#study_program').empty();
                                $('#study_program').append(
                                    '<option value="">Pilih Program Studi</option>');
                                $.each(data, function(key, value) {

                                    let keyId = key + 1;
                                    let studyProgramId = value.id;
                                    $('select[name="edit_study_program_id"]').append(
                                        '<option value="' + keyId + '"'+ (studyProgramId ==  {{ $candidate->study_program_id }} ? 'selected': '') + '>' + value
                                        .name + '</option>');
                                });
                            } else {
                                $('#study_program').empty();
                            }
                        }
                    });
                }

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
                                    '<option value="">Pilih Program Studi</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="edit_study_program_id"]').append(
                                        '<option value="' + key + '">' + value
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

            
        });
    </script>

    <script>
        function addCandidateType() {
            $("#candidateTypeModal").modal('hide');
        }

        $('#addCandidateTypeModal').on('hidden.bs.modal', function(event) {
            $("#candidateTypeModal").modal('show');
        })
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#addCandidateTypeForm").validate({
            rules: {
                candidate_type_name: {
                    required: true,
                    remote: {
                        url: "{{ route('checkCandidateType') }}",
                        type: "post",
                    }
                }
            },
            messages: {
                candidate_type_name: {
                    required: "Tipe Kandidat harus di isi.",
                    remote: "Tipe Kandidat sudah tersedia."
                }
            },
            submitHandler: function(form) {
                $("#tambahButton").prop('disabled', true);
                form.submit();
            }
        });

        function editCandidateType(data) {
            $('#editCandidateTypeModal' + data.id).on('hidden.bs.modal', function() {
                $('#candidateTypeModal').modal('show');
            });
            $('#candidateTypeModal').modal('hide');

            $("#editCandidateTypeForm" + data.id).validate({
                rules: {
                    edit_candidate_type_name: {
                        required: true,
                        remote: {
                            param: {
                                url: "{{ route('checkCandidateType') }}",
                                type: "post",
                            },
                            depends: function(element) {
                                // compare name in form to hidden field
                                return ($(element).val() !== $('#checkCandidateType' + data.id).val());
                            },
                        }
                    }
                },
                messages: {
                    edit_candidate_type_name: {
                        required: "Tipe Kandidat harus di isi.",
                        remote: "Tipe Kandidat sudah tersedia."
                    }
                },
                submitHandler: function(form) {
                    $("#editCandidateTypeButton").prop('disabled', true);
                    form.submit();
                }
            });
        }
    </script>

    <script>
        $("#clearAll").click(function() {
            Swal.fire({
                title: "Bersihkan data tipe kandidat?",
                text: `Seluruh data terkait tipe kandidat akan terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function(t) {
                if (t.value) {
                    window.location.href = "{{ route('candidate-types.clear') }}"
                }
            })
        });

        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus tipe kandidat?",
                text: `Data tipe kandidat ini akan terhapus. Anda tidak akan dapat mengembalikan
                aksi ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function(t) {
                if (t.value) {
                    e.parentNode.submit()
                }
            })
        }
    </script>
@endsection
