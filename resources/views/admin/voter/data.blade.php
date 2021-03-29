@extends('admin.layouts.master')

@section('subtitle')
Daftar Pemilih Tetap
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
            <h4 class="header-title">Daftar Pemilih Tetap</h4>
            <p class="sub-header">
                <div class="button-list">
                    <a href="#custom-modal" class="btn btn-primary btn-sm btn-create waves-light waves-effect"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a">Tambah</a>
                    <a href="{{ route('voters.clear') }}"
                        class="btn btn-danger btn-sm waves-light waves-effect">Bersihkan</a>
                </div>
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pemilu</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Token</th>
                        <th>Memilih</th>
                        <th>Email Terkirim</th>
                        <th>Diinput Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $number = 1
                    @endphp
                    @foreach($voters as $voter)
                        <tr>
                            <td>{{ $number++ }}</td>
                            <td>{{ $voter->election->period }}</td>
                            <td>{{ $voter->nim }}</td>
                            <td>{{ $voter->name }}</td>
                            <td>{{ $voter->token }}</td>
                            <td>
                                @if($voter->voted)
                                    <button type="button"
                                        class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="fe-check-square"></i>
                                    </button>
                                @endif
                            </td>
                            <td>
                                @if($voter->email_sent)
                                    <button type="button"
                                        class="btn btn-icon waves-effect waves-light btn-success btn-sm">
                                        <i class="fe-check-square"></i>
                                    </button>
                                @endif
                            </td>
                            <td>{{ $voter->storedByUser->name }}</td>
                            <td>
                                <div class="button-list">
                                    <button type="button"
                                        class="btn btn-warning btn-rounded btn-edit waves-effect waves-light"
                                        data-toggle="modal" data-target=".bs-example-modal-sm"
                                        onclick="setEditData({{ $voter }})">Edit</button>
                                    <form action="{{ route('voters.destroy', $voter) }}"
                                        method="post" class="form-delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-danger btn-rounded waves-light waves-effect">Hapus</button>
                                    </form>
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

    <h4 class="custom-modal-title">Tambah Pemilih Tetap</h4>
    <div class="custom-modal-text">
        <form class="form-horizontal" action="{{ route('voters.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="col-12">
                    <label for="election">Pemilu</label>
                    <select class="form-control" name="election" id="election" required>
                        @foreach($elections as $election)
                            <option value="{{ $election->id }}" @if (old('election')===$election->id) selected
                        @endif>{{ $election->period }}</option>
                        @endforeach
                    </select>
                    @error('election')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <label for="nim">NIM</label>
                    <input class="form-control" type="text" id="nim" name="nim"
                        value="{{ old('nim') }}" required>
                    @error('nim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <label for="name">Nama</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name') }}" required>
                    @error('name')
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
                    action="{{ route('voters.update', '') }}" id="edit-form"
                    method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="col-12">
                            <label for="election">Pemilu</label>
                            <select class="form-control" name="edit_election" id="election" required>
                                @foreach($elections as $election)
                                    <option value="{{ $election->id }}" @if (old('edit_election')===$election->id)
                                        selected
                                @endif>{{ $election->period }}</option>
                                @endforeach
                            </select>
                            @error('edit_election')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
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

    function setEditData(voter) {
        $('#edit-form').attr('action', `${updateLink}/${voter.id}`);
        $('[name="edit_election"]').val(voter.election_id);
        $('[name="edit_nim"]').val(voter.nim);
        $('[name="edit_name"]').val(voter.name);
    }

    $(function () {
        $('.form-delete').on('submit', function () {
            return confirm(`Yakin hapus pemilih tetap tersebut?`)
        });
    });

</script>
@endsection
