@extends('admin.layouts.master')

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/lightbox/simple-lightbox.css') }}" />

    <style>
        .wrap img {
           transition: 0.3s; 
           cursor: pointer;
        }

        .wrap img:hover {
            transform: scale(1.2);
        }
    </style>
@endsection

@section('content')
<p class="sub-header">
    <div class="d-flex justify-content-between">
        <div class="button-list">
            <a href="{{ route('candidates.create') }}"
                class="btn btn-primary btn-sm btn-create waves-light waves-effect"><i class="fas fa-plus-circle mr-1"></i> Tambah</a>
            <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                id="bersihkan-semua-data"><i class="fas fa-dumpster mr-1"></i> Bersihkan</button>
        </div>
        <div class="filter">
            <select name="" class="form-control">
                <option value="">2022-2023</option>
            </select>
        </div>
    </div>
    
    </p>
    <div class="row">
        @foreach($candidate as $candidates)
        <div class="col-4 col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ str_pad($candidates->candidate_number, 2, '0', STR_PAD_LEFT) }} - {{ $candidates->chairman_name }}</h3>
                    <div class="wrap mt-1" style="overflow:hidden;">
                        <a href="{{ Storage::url($candidates->image) }}"><img src="{{ Storage::url($candidates->image) }}" title="{{ $candidates->chairman_name }}" style="height:300px;width:100%;object-fit:cover;">
                    </div>
                    <h4 class="mt-3">Fakultas {{ $candidates->faculty }}</h4>
                    <h5 class="text-muted" style="font-size: 14px;">{{ $candidates->study_program }}</h5>
                    <div class="button-list mt-3">
                        <a href="{{ route('candidates.edit', $candidates->id) }}" class="btn btn-sm btn-warning btn-rounded waves-effect waves-light"><i class="fas fa-edit mr-1"></i>Edit</a>
                        <button class="btn btn-sm btn-purple btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".programModal" onclick="showProgram({{$candidates}})"><i class="fas fa-info-circle mr-1"></i>Program</button>
                        <form style="display: inline" action="{{ route('candidates.destroy', $candidates->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger btn-rounded waves-light waves-effect" onclick="deleteAlert(this)"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Program modal pop up -->
    <div class="modal fade programModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="programTitle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="program"></p>
                        </div>
                    </div>
                </div>

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
    <script src="{{ asset('assets/lightbox/simple-lightbox.js') }}"></script>
    <script>
        let gallery = new SimpleLightbox('.wrap a', {});
    </script>
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
