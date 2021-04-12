@extends('admin.layouts.master')

@section('subtitle')
Data Pemilu
@endsection

@section('css')
<link href="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('highdmin/libs/custombox/custombox.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="header-title">Data Pemilu</h4>
            <p class="sub-header">
                <div class="button-list">
                    <a href="#custom-modal" class="btn btn-primary btn-sm btn-create waves-light waves-effect"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a">Tambah</a>
                    <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
                        id="sa-warning">Bersihkan</button>
                </div>
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Periode</th>
                        <th>Jumlah DPT</th>
                        <th>DPT Memilih</th>
                        <th>DPT Golput</th>
                        <th>Jumlah Kandidat</th>
                        <th>Kandidat Terpilih</th>
                        <th>Berjalan</th>
                        <th>Diarsipkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($elections as $election)
                        <tr>
                            <td>{{ $election->id }}</td>
                            <td>{{ $election->period }}</td>
                            <td>{{ $election->total_voters ?? count($election->voters) }}</td>
                            <td>{{ $election->voted_voters ?? count($election->votedVoters) }}
                                ({{ votersPercentage($election, 1) }})</td>
                            <td>{{ $election->unvoted_voters ?? count($election->unvotedVoters) }}
                                ({{ votersPercentage($election, 0) }})</td>
                            <td>{{ $election->total_candidates ?? count($election->candidates) }}</td>
                            <td>{{ $election->election_winner }}</td>
                            <td>
                                @if($election->running)
                                    <button type="button"
                                        class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="fe-check-square"></i>
                                    </button>
                                @endif
                            </td>
                            <td>
                                @if($election->archived)
                                    <button type="button"
                                        class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="fe-check-square"></i>
                                    </button>
                                @endif
                            </td>
                            <td>
                                <div class="button-list">
                                    @if(!$election->running && !$election->archived)
                                        <a href="{{ route('elections.running', $election) }}"
                                            class="btn btn-primary btn-rounded waves-light waves-effect">Jalankan</a>
                                        <a href="{{ route('elections.archive', [$election, 1]) }}"
                                            class="btn btn-info btn-rounded waves-light waves-effect">Arsipkan</a>
                                        <a href="{{ route('elections.reset_voting', $election) }}"
                                            class="btn btn-pink btn-rounded waves-light waves-effect">Reset Voting</a>
                                        <button type="button"
                                            class="btn btn-warning btn-rounded btn-edit waves-effect waves-light"
                                            data-toggle="modal" data-target=".bs-example-modal-sm"
                                            onclick="setEditData({{ $election }})">Edit</button>
                                    @endif

                                    @if($election->running && !$election->archived)
                                        <a href="{{ route('elections.running', [$election, 0]) }}"
                                            class="btn btn-secondary btn-rounded waves-light waves-effect">Hentikan</a>
                                    @endif

                                    @if(!$election->running || $election->archived)
                                        <button type="button"
                                            class="btn btn-danger btn-rounded waves-light waves-effect">Hapus</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->

<!-- Create modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>

    <h4 class="custom-modal-title">Tambah Pemilu</h4>
    <div class="custom-modal-text">
        <form class="form-horizontal" action="{{ route('elections.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="col-12">
                    <label for="period">Periode</label>
                    <input class="form-control" type="text" id="period" placeholder="Contoh: 2021 - 2022" name="period"
                        required>
                    @error('period')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group account-btn text-center mt-2">
                <div class="col-12">
                    <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light"
                        type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- edit modal --}}
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Edit Pemilu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"
                    action="{{ route('elections.update', '') }}"
                    id="edit-form" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Periode</label>
                            <input class="form-control" type="text" id="period" placeholder="Contoh: 2021 - 2022"
                                name="edit_period" required>
                            @error('edit_period')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group account-btn text-center mt-2">
                        <div class="col-12">
                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light"
                                type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
    const updateLink = $('#edit-form').attr('action');

    function setEditData(election) {
        $('#edit-form').attr('action', `${updateLink}/${election.id}`);
        $('[name="edit_period"]').val(election.period);
    }

    $("#sa-warning").click(function () {
        Swal.fire({
            title: "Bersihkan data pemilu?",
            text: "Seluruh data terkait (kandidat, DPT, voting) akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi ini!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then(function (t) {
            if (t.value) {
                window.location.href="{{ route('elections.clear') }}"
            }
        })
    })

</script>
@endsection
