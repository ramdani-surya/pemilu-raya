@extends('admin.layouts.master')

@section('subtitle')
    Data Fakultas
@endsection

@section('css')
    <link href="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('highdmin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="faculty-tab" data-toggle="tab" href="#faculty" role="tab"
                            aria-controls="faculty" aria-selected="true">Fakultas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="study-program-tab" data-toggle="tab" href="#study-program" role="tab"
                            aria-controls="study-program" aria-selected="false">Program Studi</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
                            <p class="sub-header">
                            <div class="button-list">
                                <button type="button" data-toggle="modal" data-target="#addFaculty" class="btn btn-primary btn-sm btn-create waves-light waves-effect"><i
                                        class="fas fa-plus-circle mr-1"></i> Tambah</button>
                                <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                                    id="bersihkan-semua-data"><i class="fas fa-dumpster mr-1"></i> Bersihkan</button>
                            </div>
                            </p>
                        @endif

                        <!-- internal style  -->
                        <style>
                            .wrap {
                                margin-top: 40px;
                            }

                            .candidates_name {
                                padding: 20px;
                            }

                        </style>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Fakultas</th>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
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
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
                                            <td>
                                                <div class="button-list">
                                                    <a href="{{ route('candidates.show', $faculties->id) }}"
                                                        class="btn btn-purple btn-rounded btn-edit waves-effect waves-light"><i
                                                            class="fas fa-info-circle mr-1"></i> Detail</a>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="study-program" role="tabpanel" aria-labelledby="study-program-tab">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
                            <p class="sub-header">
                            <div class="button-list">
                                <a href="{{ route('candidates.create') }}"
                                    class="btn btn-primary btn-sm btn-create waves-light waves-effect"><i
                                        class="fas fa-plus-circle mr-1"></i> Tambah</a>
                                <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                                    id="bersihkan-semua-data"><i class="fas fa-dumpster mr-1"></i> Bersihkan</button>
                            </div>
                            </p>
                        @endif

                        <!-- internal style  -->
                        <style>
                            .wrap {
                                margin-top: 40px;
                            }

                            .candidates_name {
                                padding: 20px;
                            }

                        </style>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Fakultas</th>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
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
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
                                            <td>
                                                <div class="button-list">
                                                    <a href="{{ route('candidates.show', $faculties->id) }}"
                                                        class="btn btn-purple btn-rounded btn-edit waves-effect waves-light"><i
                                                            class="fas fa-info-circle mr-1"></i> Detail</a>
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
    <!-- Program modal pop up -->
    <div class="modal fade" id="addFaculty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-md ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="facultyTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('faculty.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="faculty_name">Nama Fakultas</label>
                                    <input type="text" class="form-control" name="faculty_name" placeholder="Masukan Nama Fakultas">
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

    <!-- Detail modal pop up -->
    <div class="modal fade detailModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content modalWidth">
                <div class="modal-header">
                    <h4 class="modal-title" id="detailTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <p>Nama Ketua :</p>
                                <span class="chairman-name-detail font-weight-bold"></span>
                            </div>
                            <div class="form-group">
                                <p>Nama Wakil Ketua :</p>
                                <span class="vice-chairman-name-detail font-weight-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- delete row modal pop up -->
    <div class="modal fade deleteCandidate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('candidates.destroy', '') }}" method="POST"
                        id="hapusKandidat">
                        @csrf
                        @method('delete')
                        <div class="form-group account-btn text-center  ">
                            <div class="col-12">
                                <h3>Apakah anda yakin?</h3>
                                <p>Data akan dihapus secara permanen!</p>
                                <div class="btn-group py-2" role="group" aria-label="Basic example">
                                    <button type="submit"
                                        class="btn btn-danger rounded py-1 mr-3 waves-effect waves-light">Hapus</button>
                                    <button type="button" class="btn btn-secondary rounded waves-effect waves-light"
                                        data-dismiss="modal" aria-label="Close">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- Required datatable js -->
    <script src="{{ asset('highdmin/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('highdmin/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/buttons.print.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('highdmin/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatables init -->
    <script src="{{ asset('highdmin/js/pages/datatables.init.js') }}"></script>

    <!-- Custombox modal -->
    <script src="{{ asset('highdmin/libs/custombox/custombox.min.js') }}"></script>
    <script>
        //  passing data to program modal
        function showProgram(candidate) {
            $('.program').html(candidate.program);
            $('#programTitle').text('Program')

        }

        // passing data to showdetail modal
        function showDetail(candidate) {
            $('.chairman-name-detail').html(candidate.chairman_name);
            $('.vice-chairman-name-detail').html(candidate.vice_chairman_name);
            $('#detailTitle').text('Detail')
        }

        // sweetalert clear all data
        $("#bersihkan-semua-data").click(function() {
            Swal.fire({
                title: "Bersihkan data kandidat?",
                text: `Seluruh data terkait kandidat akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi
            ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function(t) {
                if (t.value) {
                    window.location.href = "{{ route('candidates.clear') }}"
                }
            })
        });

        // sweetalert delete one row
        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus user?",
                text: `Seluruh data terkait (kandidat, voting) akan terhapus. Anda tidak akan dapat mengembalikan aksi
            ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
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
