@extends('admin.layouts.master')

@section('title_menu')
    Pemilu
@endsection

@section('title')
    Data Pemilu
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

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            background-color: #7A1F31 !important;
        }

        @media screen and (max-width: 455px) {
            #clearAll {
                margin-top: 7px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Pemilu</a></li>
        </ol>
    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pemilu</h4>
                    @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                    <div class="button-list">
                        <button type="button" data-toggle="modal" data-target="#addElection" class="btn btn-primary btn-xs"
                            data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                            data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                        <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <table id="example4" class="table dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pemilu</th>
                                <th>Periode</th>
                                <th>Jumlah DPT</th>
                                {{-- <th>DPT Memilih</th> --}}
                                {{-- <th>DPT Golput</th> --}}
                                <th>Jumlah Kandidat</th>
                                {{-- <th>Kandidat Terpilih</th> --}}
                                <th>Berjalan</th>
                                <th>Tanggal</th>
                                <th>Diarsipkan</th>
                                @if (Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $number = 1
                            @endphp
                            @foreach($elections as $election)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $election->name }}</td>
                                <td>{{ $election->period }}</td>
                                <td>{{ $election->total_voters ?? count($election->voters) }}</td>
                                {{-- <td>{{ $election->voted_voters ?? count($election->allVoted) }}
                                    ({{ voterAllPercentage($election, 1) }})</td> --}}
                                {{-- <td>{{ $election->unvoted_voters ?? count($election->unvotedVoters) }}
                                ({{ votersPercentage($election, 0) }})</td> --}}
                                <td>{{ $election->total_candidates ?? count($election->candidates) }}</td>
                                {{-- <td>{{ $election->chairman ?: 'Belum ada' }}</td> --}}
                                <td>
                                    @if($election->running)
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    @else 
                                    <button type="button" class="btn btn-danger btn-xs">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    @endif
                                </td>
                                <td>{{ tglIndo($election->running_date) }}</td>
                                <td>
                                    @if($election->archived)
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    @else 
                                    <button type="button" class="btn btn-danger btn-xs">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    @endif
                                </td>
                                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                                <td>
                                    <div class="button-list mt-1">
                                        @if($election->running && !$election->archived)
                                            
                                        @else 
                                            @if($election->status == 1)
                                            <button type="button" onclick="deactivation(this)" data-url="{{ route('elections.deactivation', $election) }}"
                                                class="btn btn-xs btn-light"><i class="fa fa-play mr-1"></i> Nonaktif</button>
                                            @elseif($election->status == 0)
                                                <button type="button" onclick="activation(this)" data-url="{{ route('elections.activation', $election) }}"
                                                class="btn btn-xs btn-light"><i class="fa fa-play mr-1"></i> Aktivasi</button>
                                            @endif
                                        @endif

                                        @if(!$election->running && !$election->archived && $election->status == 1)
                                        <button type="button" onclick="runElection(this)" data-url="{{ route('elections.running', $election) }}"
                                            class="btn btn-xs btn-primary"><i class="fa fa-play mr-1"></i> Jalankan</button>
                                            <a target="_blank" href="{{ url('admin/voters/email') }}" class="btn btn-xs btn-info"><i class="fa fa-share-square mr-1"></i> Kirim
                                                Email Token</a>
                                        <button type="button" data-url="{{ route('elections.archive', [$election, 1]) }}"
                                            class="btn btn-xs btn-secondary"
                                            onclick="archiveAlert(this)"><i class="fa fa-archive mr-1"></i>Arsipkan</button>
                                        <button type="button" class="btn btn-xs btn-dark"
                                            onclick="resetAlert(this)"
                                            data-url="{{ route('elections.reset_voting', $election) }}"><i class="fa fa-undo mr-1"></i> Reset
                                            Voting</button>
                                        <button type="button"
                                            class="btn btn-xs btn-warning text-white"
                                            data-toggle="modal" data-target="#editElection"
                                            onclick="setEditData({{ $election }})"><i class="fa fa-edit mr-1"></i> Edit</button>                                                                               
                                        @else
                                            
                                        @endif

                                      
                                        @if($election->running && !$election->archived)
                                        <a href="{{ route('elections.running', [$election, 0]) }}"
                                            class="btn btn-xs btn-secondary" onclick="stopElection(this)"><i class="fa fa-stop mr-1"></i> Hentikan</a>
                                        @endif
        
                                        @if(!$election->running || $election->archived && $election->status == 1)
                                        <form style="display: inline" action="{{ route('elections.destroy', $election) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-xs btn-danger"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash mr-1"></i> Hapus</button>
                                        </form>
                                        @endif
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
    <div class="modal fade" id="addElection">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pemilu</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('elections.store') }}" method="POST" id="addElectionForm">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Nama Pemilu <span class="text-muted">(ini akan digunakan sebagai subjek
                                        email)</span></label>
                                <input class="form-control" type="text" id="name" placeholder="Contoh: Pemilu Raya 2022" name="name"
                                    required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Periode</label>
                                <input class="form-control" type="text" id="period" placeholder="Contoh: 2022 - 2023" name="period"
                                    required>
                                @error('period')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="date">Tanggal</label>
                                <input class="form-control" type="date" id="date" name="running_date" required>
                                @error('running_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="tambahButton">Simpan Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editElection">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pemilu</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('elections.update', '') }}" id="editElectionForm" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" id="checkElectionName" name="checkElectionName">
                        <input type="hidden" id="checkElectionPeriod" name="checkElectionPeriod">
                        <div class="form-group">
                            <div class="col-12">
                                <label for="name">Nama Pemilu <span class="text-muted">(ini akan digunakan sebagai subjek
                                        email)</span></label>
                                <input class="form-control" type="text" id="name" placeholder="Contoh: Pemilu Raya 2022"
                                    name="edit_name" required>
                                @error('edit_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Periode</label>
                                <input class="form-control" type="text" id="period" placeholder="Contoh: 2022 - 2023"
                                    name="edit_period" required>
                                @error('edit_period')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label for="date">Tanggal</label>
                                <input class="form-control" type="date" id="date" name="edit_date" required>
                                @error('edit_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="editButton">Simpan Perubahan</button>
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
        const updateLink = $('#editElectionForm').attr('action');
        const idForm = $('#editElectionForm').attr('id');
        const checkElectionNameId = $('#checkElectionName').attr('id');
        const checkElectionPeriodId = $('#checkElectionPeriod').attr('id');

        function setEditData(election) {
            $('#editElectionForm').attr('id', `${idForm}${election.id}`);
            $('#checkElectionName').attr('id', `${checkElectionNameId}${election.id}`);
            $('#checkElectionPeriod').attr('id', `${checkElectionPeriodId}${election.id}`);
            $('#editElectionForm').attr('action', `${updateLink}/${election.id}`);
            $('#checkElectionName' + election.id).val(election.name);
            $('#checkElectionPeriod' + election.id).val(election.period);
            $('[name="edit_name"]').val(election.name);
            $('[name="edit_period"]').val(election.period);
            $('[name="edit_date"]').val(election.running_date);
            editElectionValidate(election);
            console.log(election);
        }
    </script>
    <script>
    
            $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $("#addElectionForm").validate({
                rules: {
                    name:{
                        required: true,
                        remote: {
                                  url: "{{ route('checkElectionName') }}",
                                  type: "post",
                        }
                    },
                    period:{
                        required: true,
                        remote: {
                                  url: "{{ route('checkElectionPeriod') }}",
                                  type: "post",
                        }
                    },
                    date:{
                        required: true
                    }
                },
                messages: {
                    name: {
                          required: "Nama harus di isi.",
                          remote: "Nama Pemilu sudah tersedia."
                    },
                    period: {
                        required: "Periode harus di isi.",
                        remote: "Periode sudah tersedia.",
                    },
                    date: {
                        required: "Tanggal harus di isi.",
                    }
                },
                submitHandler: function(form) {
                  $("#tambahButton").prop('disabled', true);
                      form.submit();
                }
            });
    
            function editElectionValidate(data) {
                $("#editElectionForm" + data.id).validate({
                    rules: {
                        edit_name:{
                            required: true,
                            remote: {
                                        param: {
                                            url: "{{ route('checkElectionName') }}",
                                            type: "post",
                                        },
                                        depends: function(element) {
                                        // compare name in form to hidden field
                                        return ($(element).val() !== $('#checkElectionName' + data.id).val());
                                        },
                                    }
                        },
                        edit_period:{
                            required: true,
                            remote: {
                                        param: {
                                            url: "{{ route('checkElectionPeriod') }}",
                                            type: "post",
                                        },
                                        depends: function(element) {
                                        // compare name in form to hidden field
                                        return ($(element).val() !== $('#checkElectionPeriod' + data.id).val());
                                        },
                                    }
                        },
                        edit_date:{
                            required: true,
                        },
                    },
                    messages: {
                        edit_name: {
                            required: "Nama harus di isi.",
                            remote: "Nama Pemilu sudah tersedia."
                        },
                        edit_period: {
                            required: "Periode harus di isi.",
                            remote: "Periode sudah tersedia.",
                        },
                        edit_date: {
                            required: "Tanggal harus di isi.",
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
        $("#clearAll").click(function () {
            Swal.fire({
                title: "Bersihkan data pemilu?",
                text: `Seluruh data terkait (kandidat, DPT, voting) akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = "{{ route('elections.clear') }}"
                }
            })
        });

        function runElection(e) {
            Swal.fire({
                title: "Jalankan Pemilu?",
                text: "Apakah and yakin untuk mengjalankan pemilu?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, Jalankan!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function activation(e) {
            Swal.fire({
                title: "Aktifkan Pemilu?",
                text: "Apakah and yakin untuk mengaktifkan pemilu?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, aktifkan!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function deactivation(e) {
            Swal.fire({
                title: "Nonaktifkan Pemilu?",
                text: "Apakah and yakin untuk menonaktifkan pemilu?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, nonaktifkan!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function stopElection(e) {
            Swal.fire({
                title: "Hentikan Pemilu?",
                text: "Pemilu akan dihentikan dan DPT tidak dapat memilih kandidat!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hentikan!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function sendToken(e) {
            Swal.fire({
                title: "Kirim Email Token?",
                text: "Token akan dikirim ke semua email DPT yang terdaftar!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, kirim!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function resetAlert(e) {
            Swal.fire({
                title: "Reset hasil voting pemilu?",
                text: "Hasil perolehan suara akan dihapus!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, reset!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
                }
            })
        }

        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus pemilu?",
                text: `Seluruh data terkait (kandidat, DPT, voting) akan ikut terhapus. Anda tidak akan dapat mengembalikan
                aksi ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    e.parentNode.submit()
                }
            })
        }

        function archiveAlert(e) {
            Swal.fire({
                title: "Arsipkan pemilu?",
                text: `Hasil pemilu akan disimpan. Kandidat dengan voting terbesar akan menjadi kandidat terpilih!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#7A1F31",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, arsipkan!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = `${e.dataset.url}`
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
