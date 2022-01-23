@extends('admin.layouts.master')

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('subtitle-in')
    <li class="breadcrumb-item active">Tambah Kandidat</li>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                        <label for="candidate_type">Tipe Kandidat<span class="text-danger">*</span></label>
                        <p class="text-muted">
                            Tambah data untuk tipe kandidat apabila tipe kandidat yang anda ingin kan belum tersedia.
                        </p>
                        <div class="row">
                            <div class="col-sm-10">
                                <select name="candidate_type_id" class="form-control">
                                    <option value="">Pilih Tipe Kandidat</option>
                                    @foreach ($candidate_type as $candidate_types)
                                        <option value="{{ $candidate_types->id }}">{{ $candidate_types->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" data-toggle="modal" data-target=".candidate-type-modal"
                                    class="btn btn-md btn-rounded btn-block btn-dark"><i class="fas fa-save mr-1"></i> Tipe
                                    Kandidat</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <p class="sub-header">
                        Di halaman ini anda dapat menambahkan data kandidat.
                    </p>

                    <div class="form-group">
                        <label for="nomorKandidat">Nomor Kandidat<span class="text-danger">*</span></label>

                        <input type="text" name="candidate_number" parsley-trigger="change"
                            placeholder="Masukkan Nomor Kandidat"
                            class="form-control @error('candidate_number') is-invalid @enderror" id="candidate_number"
                            value="{{ old('candidate_number') }}" minlength="1" maxlength="2"
                            onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">

                        @error('candidate_number')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="namaKetua">Nama Kandidat<span class="text-danger">*</span></label>
                        <input type="text" name="chairman_name" parsley-trigger="change"
                            placeholder="Masukkan Nama Kandidat"
                            class="form-control @error('chairman_name') is-invalid @enderror" id="chairman_name"
                            value="{{ old('chairman_name') }}">

                        @error('chairman_name')
                            <div class="mt-1">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="factulty">Fakultas<span class="text-danger">*</span></label>
                        <select name="faculty" id="faculty" class="form-control">
                            <option hidden>Pilih Fakultas</option>
                            @foreach($faculty as $faculties)
                                <option value="{{ $faculties->id }}">{{ $faculties->name }}</option>
                            @endforeach
                        </select>

                        @error('factulty')
                            <div class="mt-2">
                                <span class="text-danger">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="study_program">Program Study<span class="text-danger">*</span></label>
                        <select class="form-control" name="study_program" id="study_program"></select>

                        @error('study_program')
                            <div class="mt-2">
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
                    <h4 class="header-title">Foto Kandidat</h4>
                    <p class="sub-header">
                        Ini merupakan foto dari kandidat ketua
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
            <div class="col-lg-12">
                <div class="card-box validasi-program">
                    <h4 class="header-title">Program</h4>
                    <p class="sub-header">
                        Di kolom ini anda dapat menambahkan program kandidat.
                    </p>
                    <div class="form-group mb-0">
                        <textarea class="ckeditor form-control" name="program">{{ old('program') }}</textarea>

                        @error('program')
                            <style>
                                .validasi-program {
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
                        <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                class="fas fa-save mr-1"></i> Tambahkan</button>
                        <a href="{{ route('candidates.index') }}" class="btn btn-md btn-light waves-effect"><i
                                class="fas fa-undo-alt mr-1"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <!-- end row -->
    </form>

    <div class="modal fade candidate-type-modal" id="candidateTypeModal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="candidateTypeTitle">Data Tipe Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">

                    <div class="button-list mb-3">
                        <button type="button" data-toggle="modal" data-target=".add-candidate-type-modal"
                            onclick="addCandidateType()"
                            class="btn btn-primary btn-sm btn-create waves-light waves-effect"><i
                                class="fas fa-plus-circle mr-1"></i> Tambah</button>
                            @if (count($candidate_type))
                                <button type="button" class="btn btn-danger btn-sm waves-light waves-effect" onclick="deleteAllCandidateType()"
                                data-toggle="modal" data-target="#deleteAllModal"><i class="fas fa-dumpster mr-1"></i> Bersihkan</button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                                    id="bersihkan-semua-data" disabled><i class="fas fa-dumpster mr-1"></i>
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
                                        <button type="button" data-toggle="modal" data-target="#editCandidateTypeModal{{ $candidate_types->id }}" onclick="editCandidateType({{$candidate_types->id}})" 
                                            class="btn btn-warning btn-sm waves-light waves-effect"><i
                                                class="fas fa-edit mr-1"></i>Edit</button>
                                        <button type="button" data-toggle="modal" data-target="#deleteCandidateTypeModal{{ $candidate_types->id }}" onclick="deleteCandidateType({{$candidate_types->id}})"  class="btn btn-danger btn-sm waves-light waves-effect"><i
                                                class="fas fa-trash-alt mr-1"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add-candidate-type-modal" id="addCandidateTypeModal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addCandidateTitle">Tambah Tipe Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('candidate_types.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="election_id" value="{{ getActiveElection()->id }}">
                                    <label for="name">Nama Tipe Kandidat</label>
                                    <input type="text" class="form-control" name="candidate_type_name"
                                        placeholder="Masukan Tipe Kandidat">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-1"></i> Simpan</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    @foreach($candidate_type as $candidate_types)
        <div class="modal fade edit-candidate-type-modal" id="editCandidateTypeModal{{ $candidate_types->id }}" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="addCandidateTitle">Edit Tipe Kandidat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-3">
                        <form action="{{ route('candidate_types.update', $candidate_types->id) }}" method="post" id="editTypeForm">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="checkType" value="{{ $candidate_types->hari }}">
                            <div class="form-group">
                                <input type="text" class="form-control" name="edit_candidate_type_name" value="{{ $candidate_types->name }}" placeholder="Masukan Tipe Kandidat">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-1"></i> Save
                            changes</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

    @foreach($candidate_type as $candidate_types)
        <div class="modal fade delete-candidate-type-modal" id="deleteCandidateTypeModal{{ $candidate_types->id }}" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="deleteCandidateTitle">Hapus Tipe Kandidat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-3">
                        <form action="{{ route('candidate_types.destroy', $candidate_types->id) }}" method="post" id="deleteCandidateTitleForm">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                              Apakah anda yakin untuk <b>menghapus</b> tipe kandidat ini ?
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Ya, Hapus</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="deleteAllModal" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteCandidateTitle">Bersihkan Tipe Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="modal-body">
                        Apakah anda yakin untuk <b>menghapus semua</b> tipe kandidat?
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('candidate_types.clear') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i> Ya, Hapus Semua</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
@endsection

@section('js')
    <!-- Filestyle js -->
    <script src="{{ asset('highdmin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
    <!-- Ckeditor js -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
        $('#faculty').on('change', function() {
           var facultyId = $(this).val();
           if(facultyId) {
               $.ajax({
                   url: '/admin/get-study-program/'+facultyId,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#study_program').empty();
                        $('#study_program').append('<option hidden>Pilih Program Studi</option>'); 
                        $.each(data, function(key, course){
                            $('select[name="study_program"]').append('<option value="'+ key +'">' + course.name+ '</option>');
                        });
                    }else{
                        $('#study_program').empty();
                    }
                 }
               });
           }else{
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

        function editCandidateType(id){
            $('#editCandidateTypeModal' + id).on('hidden.bs.modal', function () {
                $('#candidateTypeModal').modal('show');
            });
            $('#candidateTypeModal').modal('hide');
        }

        function deleteCandidateType(id){
            $('#deleteCandidateTypeModal' + id).on('hidden.bs.modal', function () {
                $('#candidateTypeModal').modal('show');
            });
            $('#candidateTypeModal').modal('hide');
        }

        function deleteAllCandidateType(id){
            $('#deleteAllModal').on('hidden.bs.modal', function () {
                $('#candidateTypeModal').modal('show');
            });
            $('#candidateTypeModal').modal('hide');
        }
    </script>
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
