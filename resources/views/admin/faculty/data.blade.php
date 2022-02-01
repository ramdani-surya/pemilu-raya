@extends('layouts.master')

@section('title_menu')
    Fakultas
@endsection

@section('title')
    Data Fakultas
@endsection

@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        @media (min-width: 767.98px) {
            .dataTables_wrapper .dataTables_length {
                margin-bottom: -42px;
            }
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fakultas</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="padding: 22px 30px 0px;">
                    <ul class="nav nav-pills mb-4 light">
                        <li class="nav-item">
                            <a href="#fakultas" class="nav-link active" data-toggle="tab" aria-expanded="false">Fakultas</a>
                        </li>
                        <li class="nav-item">
                            @if($faculty->isEmpty())
                            <a href="#studyProgram" class="nav-link" data-toggle="tab" aria-expanded="false" onclick="openStudyProgram(this)">Program
                                Studi</a>
                            @else 
                            <a href="#studyProgram" class="nav-link" data-toggle="tab" aria-expanded="false">Program
                                Studi</a>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div id="fakultas" class="tab-pane active">
                            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                <div class="button-list" style="margin-bottom: 28px;">
                                    <button type="button" data-toggle="modal" data-target="#addFaculty"
                                        class="btn btn-primary btn-xs" data-animation="slide" data-plugin="custommodal"
                                        data-overlaySpeed="200" data-overlayColor="#36404a"><i
                                            class="fa fa-plus-circle mr-1"></i> Tambah</button>
                                    <button type="button" class="btn btn-danger btn-xs" id="clearAllFaculty"><i
                                            class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                                </div>
                            @endif

                            <table id="facultyTable" class="table dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Fakultas</th>
                                        @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($faculty as $faculties)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $faculties->name }}</td>
                                            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                                <td>
                                                    <div class="button-list">
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#editFaculty{{ $faculties->id }}"
                                                            class="btn btn-warning btn-xs text-white"
                                                            onclick="editFacultyValidate({{ $faculties }})"><i
                                                                class="fa fa-edit mr-1"></i>Edit</button>
                                                        <form style="display: inline"
                                                            action="{{ route('faculties.destroy', $faculties->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-xs btn-danger"
                                                                onclick="deleteFacultyAlert(this)"><i
                                                                    class="fa fa-trash mr-1"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="studyProgram" class="tab-pane">
                            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                            <div class="button-list" style="margin-bottom: 28px;">
                                <button type="button" data-toggle="modal" data-target="#addStudyProgram"
                                    class="btn btn-primary btn-xs" data-animation="slide" data-plugin="custommodal"
                                    data-overlaySpeed="200" data-overlayColor="#36404a"><i
                                        class="fa fa-plus-circle mr-1"></i> Tambah</button>
                                <button type="button" class="btn btn-danger btn-xs" id="clearAllStudyProgram"><i
                                        class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                            </div>
                            @endif

                            <table id="studyProgramTable" class="table dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Program Studi</th>
                                        <th>Fakultas</th>
                                        @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                            <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($study_program as $study_programs)
                                        <tr>
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $study_programs->name }}</td>
                                            <td>{{ $study_programs->faculties->name }}</td>
                                            @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                                <td>
                                                    <div class="button-list">
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#editStudyProgram{{ $study_programs->id }}"
                                                            class="btn btn-warning text-white btn-xs"
                                                            onclick="editStudyProgramValidate({{ $study_program }})"><i
                                                                class="fa fa-edit mr-1"></i>Edit</button>
                                                        <form style="display: inline"
                                                            action="{{ route('study-programs.destroy', $study_programs->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="button" class="btn btn-xs btn-danger"
                                                                onclick="deleteStudyProgramAlert(this)"><i
                                                                    class="fa fa-trash mr-1"></i> Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="addFaculty">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Fakultas</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('faculties.store') }}" method="post" id="addFacultyForm">
                            @csrf
                            <input type="hidden" class="form-control" name="election_id"
                            value="{{ getActiveElection()->id }}">
                            <div class="form-group">
                                <label for="faculty_name">Nama Fakultas</label>
                                <input type="text" class="form-control" name="faculty_name"
                                    placeholder="Masukan Nama Fakultas">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="tambahFacultyButton">Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($faculty as $faculties)
            <div class="modal fade" id="editFaculty{{ $faculties->id }}">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Fakultas</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('faculties.update', $faculties->id) }}" method="post"
                                id="editFacultyForm{{ $faculties->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="checkFacultyName{{ $faculties->id }}"
                                    value="{{ $faculties->name }}">
                                <div class="form-group">
                                    <label for="edit_faculty_name">Nama Fakultas</label>
                                    <input type="text" class="form-control" name="edit_faculty_name"
                                        value="{{ $faculties->name }}" placeholder="Masukan Nama Fakultas">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="editFacultyButton">Simpan Perubahan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


        <div class="modal fade" id="addStudyProgram">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Program Studi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('study-programs.store') }}" method="post" id="addStudyProgramForm">
                            @csrf
                            <input type="hidden" class="form-control" name="election_id_2"
                            value="{{ getActiveElection()->id }}">
                            <div class="form-group">
                                <label for="faculty_id">Fakultas</label>
                                <select name="faculty_id" class="form-control">
                                    @foreach ($faculty as $faculties)
                                        <option value="{{ $faculties->id }}">{{ $faculties->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="study_program">Program Studi</label>
                                <input type="text" class="form-control" name="study_program_name"
                                    placeholder="Masukan Program Studi">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="tambahStudyProgramButton">Simpan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($study_program as $study_programs)
            <div class="modal fade" id="editStudyProgram{{ $study_programs->id }}">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Program Studi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('study-programs.update', $study_programs->id) }}" method="post"
                                id="editStudyProgramForm{{ $study_programs->id }}">
                                @csrf
                                @method('PUT')

                                <input type="hidden" id="checkStudyProgramName{{ $study_programs->id }}"
                                    value="{{ $study_programs->name }}">
                                <div class="form-group">
                                    <label for="edit_faculty_id">Fakultas</label>
                                    <select name="edit_faculty_id" class="form-control">
                                        @foreach ($faculty as $faculties)
                                            <option value="{{ $faculties->id }}"
                                                {{ $faculties->id == $study_programs->faculty_id ? 'selected' : '' }}>
                                                {{ $faculties->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit_study_program">Nama Fakultas</label>
                                    <input type="text" class="form-control" name="edit_study_program_name"
                                        value="{{ $study_programs->name }}" placeholder="Masukan Program Studi">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="editStudyProgramButton">Simpan
                                Perubahan</button>
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
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

        {{-- Navbar Pills Keep Active --}}
        
        {{-- Data Table --}}
        <script>
            $(document).ready(function() {
                var facultyTable = $('#facultyTable').DataTable( {
                    responsive: true
                } );
            
                new $.fn.dataTable.FixedHeader( facultyTable );
            } );

            $(document).ready(function() {
                var studyProgramTable = $('#studyProgramTable').DataTable( {
                    responsive: true
                } );
            
                new $.fn.dataTable.FixedHeader( studyProgramTable );
            } );
        </script>
        {{-- Sweetalert --}}
        <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#addFacultyForm").validate({
                rules: {
                    faculty_name: {
                        required: true,
                        remote: {
                            url: "{{ route('checkFacultyName') }}",
                            type: "post",
                        }
                    },
                },
                messages: {
                    faculty_name: {
                        required: "Nama Fakultas di isi.",
                        remote: "Nama Fakultas sudah tersedia."
                    }
                },
                submitHandler: function(form) {
                    $("#tambahFacultyButton").prop('disabled', true);
                    form.submit();
                }
            });

            function editFacultyValidate(data) {
                $("#editFacultyForm" + data.id).validate({
                    rules: {
                        edit_faculty_name: {
                            required: true,
                            remote: {
                                param: {
                                    url: "{{ route('checkFacultyName') }}",
                                    type: "post",
                                },
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkFacultyName' + data.id).val());
                                },
                            }
                        }
                    },
                    messages: {
                        edit_name: {
                            required: "Nama Fakultas harus di isi.",
                            remote: "Nama Fakultas sudah tersedia."
                        },
                    },
                    submitHandler: function(form) {
                        $("#editFacultyButton").prop('disabled', true);
                        form.submit();
                    }
                });
            }

            $("#addStudyProgramForm").validate({
                rules: {
                    faculty_id: {
                        required: true,
                    },
                    study_program_name: {
                        required: true,
                        remote: {
                            url: "{{ route('checkStudyProgramName') }}",
                            type: "post",
                        }
                    }
                },
                messages: {
                    faculty_id: {
                        required: "Nama Fakultas di isi.",
                    },
                    study_program_name: {
                        required: "Program Studi harus di isi.",
                        remote: "Program Studi sudah tersedia."
                    },
                },
                submitHandler: function(form) {
                    $("#tambahStudyProgramButton").prop('disabled', true);
                    form.submit();
                }
            });

            function editStudyProgramValidate(data) {
                $("#editStudyProgramForm" + data.id).validate({
                    rules: {
                        edit_faculty_id: {
                            required: true
                        },
                        edit_study_program_name: {
                            required: true,
                            remote: {
                                param: {
                                    url: "{{ route('checkStudyProgramName') }}",
                                    type: "post",
                                },
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkStudyProgramName' + data.id).val());
                                },
                            }
                        }
                    },
                    messages: {
                        edit_faculty_id: {
                            required: "Nama Fakultas di isi.",
                        },
                        edit_study_program_name: {
                            required: "Program Studi harus di isi.",
                            remote: "Program Studi sudah tersedia."
                        },
                    },
                    submitHandler: function(form) {
                        $("#editStudyProgramButton").prop('disabled', true);
                        form.submit();
                    }
                });
            }
        </script>

        <script>
            $("#clearAllFaculty").click(function() {
                Swal.fire({
                    title: "Bersihkan data fakultas?",
                    text: `Seluruh data terkait (program studi) akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    cancelButtonColor: "rgb(209, 207, 207)",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        window.location.href = "{{ route('faculties.clear') }}"
                    }
                })
            });

            function openStudyProgram(e) {
                Swal.fire({
                    title: "Info",
                    text: `Buat fakultas baru terlebih dahulu!`,
                    type: "info",
                    timer: 3000,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false
                }).then(function(t) {
                        window.location.href = "{{ route('faculties.index') }}"
                })
            }

            function deleteFacultyAlert(e) {
                Swal.fire({
                    title: "Hapus data fakultas?",
                    text: `Seluruh data terkait (program studi) akan ikut terhapus. Anda tidak akan dapat mengembalikan
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

            $("#clearAllStudyProgram").click(function() {
                Swal.fire({
                    title: "Bersihkan data program studi?",
                    text: `Seluruh data terkait program studi akan terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    cancelButtonColor: "rgb(209, 207, 207)",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        window.location.href = "{{ route('study-programs.clear') }}"
                    }
                })
            });

            function deleteStudyProgramAlert(e) {
                Swal.fire({
                    title: "Hapus data program studi?",
                    text: `Data program studi akan terhapus. Anda tidak akan dapat mengembalikan
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

            function disableButton(e) {
                $(e).attr('disabled', '');
                $(e).text('Mengirim...');

                window.location.href = `${e.dataset.url}`
            }
        </script>
    @endsection
