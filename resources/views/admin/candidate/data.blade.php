@extends('admin.layouts.master')

@section('subtitle')
Data Pemilu
@endsection

@section('css')
<link href="{{ asset('highdmin/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('highdmin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" />
<!--venobox lightbox-->
<link rel="stylesheet" href="{{ asset('highdmin/libs/magnific-popup/magnific-popup.css') }}" />
@endsection

@section('content')
<p class="sub-header">
<div class="button-list">
    <a href="{{ route('candidates.create') }}" class="btn btn-primary btn-sm btn-create waves-light waves-effect">Tambah</a>
    <button type="button" class="btn btn-danger btn-sm waves-light waves-effect" data-toggle="modal" data-target=".deleteAllCandidate">Bersihkan
    </button>
</div>
</p>
@php
$increment = 1;
@endphp
@foreach($candidates as $candidate)
<style>
    .container-wrap {
        padding: 20px;
    }

    .candidateNumber {
        padding: 20px;
    }
</style>
<h2 class="candidateNumber">Kandidat {{ str_pad($candidate->candidate_number, 2, "0", STR_PAD_LEFT) }}</h2>
<div class="container-wrap d-flex justify-content-center">

    <div class="row">
        <div class="col-lg-4">
            <div class="card-box">
                <h4 class="header-title">KETUA</h4>
                <p class="sub-header">
                    {{ $candidate->chairman_name }}
                </p>

                <div class="card filter-item all webdesign illustrator">
                    <a href="{{ asset('images/'. $candidate->chairman_photo) }}" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                @if(empty($candidate->chairman_photo))
                                <img src="{{ asset('images/imageNoAvailable.svg') }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @else
                                <img src="{{ asset('images/'. $candidate->chairman_photo) }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
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
                    <a href="{{ asset('images/'. $candidate->vice_chairman_photo) }}" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                @if(empty($candidate->vice_chairman_photo))
                                <img src="{{ asset('images/imageNoAvailable.svg') }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
                                @else
                                <img src="{{ asset('images/'. $candidate->vice_chairman_photo) }}" style="height:550px; width: 100%; object-fit:cover;" class="thumb-img img-fluid" alt="work-thumbnail">
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
                <div class="card-body ">
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm waves-effect waves-light showVisionMission rounded" style="width:100%" data-toggle="modal" data-target=".modalVisionOrMission" onclick="showVision({{ $candidate }})">
                            Visi
                        </button>
                        <button class="btn btn-primary btn-sm waves-effect waves-light showVisionMission rounded" style="width:100%; margin-top:10px;" data-toggle="modal" data-target=".modalVisionOrMission" onclick="showMission({{ $candidate }})">
                            Misi
                        </button>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-blue btn-sm waves-effect waves-light rounded" style="width:100%;">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm rounded waves-light waves-effect buttonHapus" style="width:100%; margin-top:10px;" data-toggle="modal" data-target=".deleteCandidate" onclick="hapusKandidat({{ $candidate }})">Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- vision and mission modal pop up -->
<div class="modal fade modalVisionOrMission" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="vision-and-missionTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body padding-outside">
                <div class="card padding-inside">
                    <div class="card-body ">
                        <h2 class="visi-and-missionText"></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete row modal pop up -->
<div class="modal fade deleteCandidate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Hapus Kandidat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('candidates.destroy', '') }}" method="POST" id="hapusKandidat">
                    @csrf
                    @method('delete')
                    <div class="form-group account-btn text-center  ">
                        <div class="col-12">
                            <h3>Apakah anda yakin?</h3>
                            <p>Data akan dihapus secara permanen!</p>
                            <div class="btn-group py-2" role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-danger rounded py-1 mr-3">Hapus</button>
                                <button type="button" class="btn btn-secondary rounded" data-dismiss="modal" aria-label="Close">Kembali</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete ALL modal pop up -->
<div class="modal fade deleteAllCandidate" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Hapus Semua Kandidat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group account-btn text-center">
                    <div class="col-12">
                        <h3>Apakah anda yakin?</h3>
                        <p>Data akan dihapus secara permanen!</p>
                        <div class="btn-group py-2" role="group">
                            <a href="{{ route('candidates.clearAll') }}" class="btn btn-danger mr-2 rounded waves-effect waves-light">Bersihkan</a>
                            <button type="button" class="btn btn-secondary rounded  waves-effect waves-light" data-dismiss="modal" aria-label="Close">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')


<!-- Custombox modal -->
<script src="{{ asset('highdmin/libs/custombox/custombox.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

<<!--venobox lightbox-->
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


        //  passing data to delete modal pop up
        const hapusKandidats = $('#hapusKandidat').attr('action');

        function hapusKandidat(candidate) {
            $('#hapusKandidat').attr('action', `${hapusKandidats}/${candidate.id}`);
        }
    </script>
    @endsection