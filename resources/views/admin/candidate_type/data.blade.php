@extends('admin.layouts.master')

@section('title')
Tipe Kandidat
@endsection


@section('title_menu')
Tipe Kandidat
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

        @media screen and (max-width: 455px) {
            #clearAll {
                margin-top: 7px;
            }

            #deleteButton {
                margin-top: 7px;
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tipe Kandidat</a></li>
        </ol>
    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Tipe Kandidat</h4>
                    @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                    <div class="button-list">
                        <button type="button" data-toggle="modal" data-target="#addCandidateTypeModal" id="tambahButton" class="btn btn-primary btn-xs"
                            data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                            data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                        <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive"> --}}
                    <table id="example4" class="table dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
        
                        <tbody>
        
                            @php
                            $increment = 1;
                            @endphp
        
                            @foreach($candidate_type as $candidate_types)
                            <tr>
                                <td>{{ $increment++ }} </td>
                                <td>{{ $candidate_types->name }}</td>
                                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                                <td>
                                    <div class="form-group">
                                        <button type="button" data-toggle="modal" id="editButton"
                                            data-target="#editCandidateTypeModal{{ $candidate_types->id }}"
                                            class="btn btn-warning btn-xs text-white"
                                            onclick="editCandidateType({{ $candidate_types }})"><i
                                                class="fa fa-edit mr-1"></i>Edit</button>
                                        <form style="display: inline"
                                            action="{{ route('candidate-types.destroy', $candidate_types->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-xs btn-danger" id="deleteButton"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash mr-1"></i> Hapus</button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
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
                        <form action="{{ route('candidate-types.update', $candidate_types->id) }}" method="post"
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    
    {{-- Sweetalert --}}
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
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
