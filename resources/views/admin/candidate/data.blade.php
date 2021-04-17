@extends('admin.layouts.master')

@section('subtitle')
Data Kandidat
@endsection

@section('css')
<!-- Datatable -->
<link href="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- Custombox -->
<link href="{{ asset('highdmin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" />
<!--venobox lightbox-->
<link href="{{ asset('highdmin/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<p class="sub-header">
    <div class="button-list">
        <a href="{{ route('candidates.create') }}"
            class="btn btn-primary btn-sm btn-create waves-light waves-effect">Tambah</a>
        <button type="button" class="btn btn-danger btn-sm waves-light waves-effect"
            id="bersihkan-semua-data">Bersihkan</button>
    </div>
</p>

<!-- Content -->

<!-- internal style  -->
<style>
    .wrap {
        margin-top: 40px;
    }

    .candidateNumber {
        padding: 20px;
    }
</style>


@foreach($candidates as $candidate)

<div class="wrap">
    <div class="row text-center">
        <div class="col-lg-3">
            <div class="card">
                <h2 class="candidateNumber">Kandidat {{ str_pad($candidate->candidate_number, 2, "0", STR_PAD_LEFT) }}
                </h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="header-title">KETUA</h4>
                <p class="sub-header">
                    {{ $candidate->chairman_name }}
                </p>

                <div class="card filter-item all webdesign illustrator">
                    @if(empty($candidate->chairman_photo))
                    <a href="{{ asset('images/imageNoAvailable.svg') }}" class="image-popup">
                        @else
                        <a href="{{ asset('images/'. $candidate->chairman_photo) }}" class="image-popup">
                            @endif

                            <div class="portfolio-masonry-box">
                                <div class="portfolio-masonry-img">
                                    @if(empty($candidate->chairman_photo))
                                    <img src="{{ asset('images/imageNoAvailable.svg') }}"
                                        style="height:400px; width: 100%; object-fit:cover;" class="thumb-img img-fluid"
                                        alt="Default Photo">
                                    @else
                                    <img src="{{ asset('images/'. $candidate->chairman_photo) }}"
                                        style="height:400px; width: 100%; object-fit:cover;" class="thumb-img img-fluid"
                                        alt="Chairman Photo">
                                    @endif
                                </div>
                                <div class="portfolio-masonry-detail">
                                    <h4 class="font-18">{{ $candidate->chairman_name }}</h4>
                                    <p>KETUA</p>
                                </div>
                            </div>
                        </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="header-title">WAKIL KETUA</h4>
                <p class="sub-header">
                    {{ $candidate->vice_chairman_name }}
                </p>

                <div class="card filter-item all webdesign illustrator">
                    @if(empty($candidate->vice_chairman_photo))
                    <a href="{{ asset('images/imageNoAvailable.svg') }}" class="image-popup">
                        @else
                        <a href="{{ asset('images/'. $candidate->vice_chairman_photo) }}" class="image-popup">
                            @endif

                            <div class="portfolio-masonry-box">
                                <div class="portfolio-masonry-img">
                                    @if(empty($candidate->vice_chairman_photo))
                                    <img src="{{ asset('images/imageNoAvailable.svg') }}"
                                        style="height:400px; width: 100%; object-fit:cover;" class="thumb-img img-fluid"
                                        alt="Default Image">
                                    @else
                                    <img src="{{ asset('images/'. $candidate->vice_chairman_photo) }}"
                                        style="height:400px; width: 100%; object-fit:cover;" class="thumb-img img-fluid"
                                        alt="Vice Chairman Photo">
                                    @endif
                                </div>
                                <div class="portfolio-masonry-detail">
                                    <h4 class="font-18">{{ $candidate->vice_chairman_name }}</h4>
                                    <p>WAKIL KETUA</p>
                                </div>
                            </div>
                        </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-center">
            <div class="card">
                <div class="card-body " style="margin-top:20px;">
                    <div class="form-group ">
                        <button class="btn btn-primary btn-sm waves-effect waves-light showVisionMission rounded"
                            style="width:100%" data-toggle="modal" data-target=".modalVisionOrMission"
                            onclick="showVision({{ $candidate }})">
                            Visi
                        </button>
                        <button class="btn btn-primary btn-sm waves-effect waves-light showVisionMission rounded"
                            style="width:100%; margin-top:10px;" data-toggle="modal" data-target=".modalVisionOrMission"
                            onclick="showMission({{ $candidate }})">
                            Misi
                        </button>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('candidates.edit', $candidate->id) }}"
                            class="btn btn-warning btn-sm waves-effect waves-light rounded" style="width:100%;">Edit</a>
                        <form style="display: inline" action="{{ route('candidates.destroy', $candidate) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-sm rounded waves-light waves-effect"
                                style="width:100%; margin-top:10px;" onclick="deleteAlert(this)">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach

<!-- vision and mission modal pop up -->
<div class="modal fade modalVisionOrMission" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vision-and-missionTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="card">
                    <div class="card-body">
                        <p class="visi-and-missionText"></p>
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
<!-- Custombox modal -->
<script src="{{ asset('highdmin/libs/custombox/custombox.min.js') }}"></script>
<!--venobox lightbox-->
<script src="{{ asset('highdmin/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!-- Gallery Init-->
<script src="{{ asset('highdmin/js/pages/gallery.init.js') }}"></script>


<script>
    //  passing data to mission and vission modal pop up
    function showVision(candidate) {
        $('.visi-and-missionText').html(candidate.vision);
        $('#vision-and-missionTitle').text('Visi')

    }

    function showMission(candidate) {
        $('.visi-and-missionText').html(candidate.mission);
        $('#vision-and-missionTitle').text('Misi')
    }

    $("#bersihkan-semua-data").click(function () {
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
        }).then(function (t) {
            if (t.value) {
                window.location.href = "{{ route('candidates.clear') }}"
            }
        })
    });

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
        }).then(function (t) {
            if (t.value) {
                e.parentNode.submit()
            }
        })
    }

</script>
@endsection