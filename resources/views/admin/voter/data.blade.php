@extends('admin.layouts.master')

@section('title')
    Data Daftar Pemilih Tetap
@endsection

@section('title_menu')
Daftar Pemilih Tetap
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Pemilih Tetap</a></li>
        </ol>
    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="wrap">
                        <h4 class="card-title">Data Daftar Pemilih Tetap</h4>
                        <form action="{{ route('voters.import') }}" method="POST" enctype="multipart/form-data"
                        id="form-import">
                            @csrf
                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> Import Excel</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="file" id="import" accept="xlsx"
                                        class="custom-file-input @error('file') is-invalid @enderror">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                    <div class="button-list">
                        <button type="button" data-toggle="modal" data-target="#addVoter" class="btn btn-primary btn-xs"
                            data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                            data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                        <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                           
                                <div class="form-row align-items-center">
                                    <div class="col-auto" style="padding-right:0px">
                                        {{-- <input type="file" class="form-control" name="file" id="import"> --}}
                                        
                                    </div>
                                    
                                    <div class="col-auto" style="margin-top: 12px; padding-left:0px">
                                        <a href="{{ route('voters.download_format') }}"
                                            class="btn btn-xs btn-secondary">Download Format</a>
                                    </div>
                                    
                                </div>
                            
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive"> --}}
                    <table id="example4" class="table dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Memilih</th>
                                <th>Email</th>
                                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $number = 1
                            @endphp
                            @foreach($voters as $voter)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $voter->nim }}</td>
                                    <td>{{ $voter->name }}</td>
                                    <td>
                                        @if($voter->voted)
                                            <button type="button"
                                                class="btn btn-icon waves-effect waves-light btn-success btn-xs">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        @else 
                                            <span class="badge badge-outline-warning"> Belum milihih</span>
                                        @endif
                                    </td>
                                    <td>{{ $voter->email }}</td>
                                    @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                                    <td>
                                        <div class="button-list" style="display: flex">
                                            @if(!$voter->voted)
                                                <button type="button"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal" data-target="#editVoter" title="Edit Data"
                                                    onclick="setEditData({{ $voter }})"><i class="fa fa-pencil"></i></button>
                                                <button type="button"
                                                    data-url="{{ route('voters.reset_token', [$voter, '']) }}"
                                                    class="btn btn-info shadow btn-xs sharp mr-1" title="Reset Token"
                                                    onclick="resetTokenAlert(this)"><i class="fa fa-undo mr-1"></i></button>
                                            @endif
        
                                            <form action="{{ route('voters.destroy', $voter) }}"
                                                method="post" style="display: inline" class="form-delete">
                                                @csrf
                                                @method('delete')
                                                <button type="button" title="Hapus Data" class="btn btn-danger shadow btn-xs sharp"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade" id="addVoter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Daftar Pemilih Tetap</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('voters.store') }}" method="POST" id="voterAddForm">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <label for="nim">NIM</label>
                                <input class="form-control" type="text" id="nim" name="nim" value="{{ old('nim') }}" required>
                                @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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

    <div class="modal fade" id="editVoter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Daftar Pemilih Tetap</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('voters.update', '') }}" id="voterEditForm" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" id="checkDptNim" name="checkDptNim">
                        <input type="hidden" id="checkDptEmail" name="checkDptEmail">
                        <div class="form-group">
                            <div class="col-12">
                                <label for="nim">NIM</label>
                                <input class="form-control" type="text" id="nim" name="edit_nim" required>
                                @error('edit_nim')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Nama</label>
                                <input class="form-control" type="text" id="name" name="edit_name" required>
                                @error('edit_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" required>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="editButton">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
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
        var election = "{{$election}}";
        const updateLink = $('#voterEditForm').attr('action');
        const idForm = $('#editElectionForm').attr('id');
        const checkDptNimId = $('#checkDptNim').attr('id');
        const checkDptEmailId = $('#checkDptEmail').attr('id');

        function setEditData(voter) {
            $('#voterEditForm').attr('action', `${idForm}/${voter.id}`);
            $('#checkDptNim').attr('id', `${checkDptNimId}${voter.id}`);
            $('#checkDptEmail').attr('id', `${checkDptEmailId}${voter.id}`);
            $('#voterEditForm').attr('action', `${updateLink}/${voter.id}`);
            $('#checkDptNim' + election.id).val(voter.nim);
            $('#checkDptEmail' + election.id).val(voter.email);
            $('[name="edit_nim"]').val(voter.nim);
            $('[name="edit_name"]').val(voter.name);
            $('[name="email"]').val(voter.email);
            editVoterValidate(voter);
        }
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

            $("#voterAddForm").validate({
                rules: {
                    name:{
                        required: true,
                    },
                    nim:{
                        required: true,
                        remote: {
                                  url: "{{ route('checkDptNim') }}",
                                  type: "post",
                        }
                    },
                    email:{
                        required: true,
                        remote: {
                                  url: "{{ route('checkDptEmail') }}",
                                  type: "post",
                        }
                    },
                },
                messages: {
                    name: {
                          required: "Nama harus di isi.",
                    },
                    nim: {
                        required: "Nim harus di isi.",
                        remote: "Nim sudah tersedia.",
                    },
                    email: {
                        required: "Email harus di isi.",
                        remote: "Email sudah tersedia.",
                    }
                },
                submitHandler: function(form) {
                  $("#tambahButton").prop('disabled', true);
                      form.submit();
                }
            });
    
            function editVoterValidate(data) {
                $("#voterEditForm" + data.id).validate({
                    rules: {
                        edit_name:{
                            required: true,
                        },
                        edit_nim:{
                            required: true,
                            remote: {
                                        param: {
                                            url: "{{ route('checkDptNim') }}",
                                            type: "post",
                                        },
                                        depends: function(element) {
                                        // compare name in form to hidden field
                                        return ($(element).val() !== $('#checkDptNim' + data.id).val());
                                        },
                                    }
                        },
                        edit_email:{
                            required: true,
                            remote: {
                                        param: {
                                            url: "{{ route('checkDptEmail') }}",
                                            type: "post",
                                        },
                                        depends: function(element) {
                                        // compare name in form to hidden field
                                        return ($(element).val() !== $('#checkDptEmail' + data.id).val());
                                        },
                                    }
                        },
                    },
                    messages: {
                        edit_name: {
                          required: "Nama harus di isi.",
                        },
                        edit_nim: {
                            required: "Nim harus di isi.",
                            remote: "Nim sudah tersedia.",
                        },
                        edit_email: {
                            required: "Email harus di isi.",
                            remote: "Email sudah tersedia.",
                        }
                    },
                    submitHandler: function(form) {
                        $("#editButton").prop('disabled', true);
                        form.submit();
                    }
                });
            }
        </script>

    <script>
        $(function () {
            $('label .buttonText').text('Impor (.xlsx)');

            $('.form-delete').on('submit', function () {
                return confirm(`Yakin hapus pemilih tetap tersebut?`)
            });

            $('#import').change(function () {
                Swal.fire({
                    title: "Import Data DPT?",
                    text: `Apakah anda yakin untuk mengimport data dpt?`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    cancelButtonColor: "rgb(209, 207, 207)",
                    confirmButtonText: "Ya, import!",
                    cancelButtonText: "Batal"
                }).then(function (t) {
                    if (t.value) {
                        $('#form-import').submit();
                    }
                })
            
            });
        });

        function resetTokenAlert(e) {
            Swal.fire({
                title: "Reset dan kirim token?",
                text: `Kirim email token setelah token direset.`,
                type: "question",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak, reset saja."
            }).then(function (t) {
                let url = e.dataset.url,
                    sendEmail = (t.value) ? true : false;

                window.location.href = `${url}/${sendEmail}`
            })
        }
    </script>

    <script>
        $("#clearAll").click(function () {
            Swal.fire({
                title: "Bersihkan data pemilu?",
                text: `Seluruh data terkait (kandidat, DPT, voting) akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = "{{ route('voters.clear') }}"
                }
            })
        });

        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus pemilu?",
                text: `Seluruh data terkait (kandidat, DPT, voting) akan ikut terhapus. Anda tidak akan dapat mengembalikan
                aksi ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
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
