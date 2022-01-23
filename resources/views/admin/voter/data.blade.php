@extends('admin.layouts.master')

@section('subtitle')
Daftar Pemilih Tetap
@endsection

@section('css')
<link href="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/tooltipster/tooltipster.bundle.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="header-title">
                Daftar Pemilih Tetap <br>
                {{ $election->name }}
            </h4>
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
            <p class="sub-header">
                <div class="button-list">
                    <a href="#custom-modal" class="btn btn-primary btn-sm btn-create waves-light waves-effect"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a"><i class="fas fa-plus-circle mr-1"></i> Tambah</a>
                    <a href="{{ route('voters.clear') }}"
                        class="btn btn-danger btn-sm waves-light waves-effect"><i class="fas fa-dumpster mr-1"></i> Bersihkan</a>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('voters.import') }}" method="POST" enctype="multipart/form-data"
                                id="form-import">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-auto" style="padding-right:0px">
                                        <input type="file" class="filestyle" data-input="false" name="file">
                                    </div>
                                    <div class="col-auto" style="margin-top: 12px; padding-left:0px">
                                        <a href="{{ route('voters.download_format') }}"
                                            class="btn btn-secondary waves-light waves-effect">Download Format</a>
                                    </div>
                                    @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </p>
            @endif

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Token</th>
                        <th>Memilih</th>
                        <th>Email</th>
                        <th>Terakhir Diedit</th>
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
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
                                {{ replaceEachChar($voter->token, '*') }}
                                @if($voter->email_sent)
                                    <i class="fe-check-square text-success" data-toggle="tooltip" data-placement="top"
                                        data-original-title="Terkirim" style="font-weight: bold;"></i>
                                @endif
                            </td>
                            <td>
                                @if($voter->voted)
                                    <button type="button"
                                        class="btn btn-icon waves-effect waves-light btn-success btn-xs">
                                        <i class="fas fa-check"></i>
                                    </button>
                                @endif
                            </td>
                            <td>{{ $voter->email }}</td>
                            <td>{{ $voter->storedByUser->name }}</td>
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'panitia')
                            <td>
                                <div class="button-list" style="display: flex">
                                    @if(!$voter->voted)
                                        <button type="button"
                                            class="btn btn-sm btn-warning btn-rounded btn-edit waves-effect waves-light"
                                            data-toggle="modal" data-target=".bs-example-modal-sm"
                                            onclick="setEditData({{ $voter }})"><i class="fas fa-edit mr-1"></i> Edit</button>
                                        <button type="button"
                                            data-url="{{ route('voters.reset_token', [$voter, '']) }}"
                                            class="btn btn-sm btn-pink btn-rounded waves-effect waves-light"
                                            onclick="resetTokenAlert(this)"><i class="fas fa-undo mr-1"></i> Reset Token</button>
                                    @endif

                                    <form action="{{ route('voters.destroy', $voter) }}"
                                        method="post" class="form-delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger btn-rounded waves-light waves-effect"><i class="fas fa-trash-alt mr-1"></i> Hapus</button>
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
                <h4 class="modal-title" id="mySmallModalLabel">Edit Pemilih Tetap</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('voters.update', '') }}" id="edit-form" method="POST">
                    @csrf
                    @method('put')
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

{{-- Bootstrap FileStyle --}}
<script src="{{ asset('highdmin/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}">
</script>
<!-- Init js-->
<script src="{{ asset('highdmin/js/pages/form-advanced.init.js') }}"></script>

<!-- Custombox modal -->
<script src="{{ asset('highdmin/libs/custombox/custombox.min.js') }}"></script>

{{-- Tooltips --}}
<script src="{{ asset('highdmin/libs/tooltipster/tooltipster.bundle.min.js') }}"></script>
<script src="{{ asset('highdmin/js/pages/tooltipster.init.js') }}"></script>

<script>
    const updateLink = $('#edit-form').attr('action');

    function setEditData(voter) {
        $('#edit-form').attr('action', `${updateLink}/${voter.id}`);
        $('[name="edit_nim"]').val(voter.nim);
        $('[name="edit_name"]').val(voter.name);
        $('[name="email"]').val(voter.email);
    }

    $(function () {
        $('label .buttonText').text('Impor (.xlsx)');

        $('.form-delete').on('submit', function () {
            return confirm(`Yakin hapus pemilih tetap tersebut?`)
        });

        $('[name="file"]').change(function () {
            $('#form-import').submit();
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
@endsection
