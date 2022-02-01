@extends('admin.layouts.master', ['slug' => $candidate_type2->slug])

@section('title_menu')
    Kandidat
@endsection

@section('title')
    Data Kandidat
@endsection

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('candidates.index') }}">Kandidat</a></li>
        <li class="breadcrumb-item active"><a href="{{ url()->current() }}">{{ $candidate_type2->name }}</a></li>
    </ol>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Kandidat</h4>
                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                <div class="button-list">
                    <a href="{{ route('candidates.createIn', $candidate_type2->slug) }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle mr-1"></i> Tambahkan Kandidat</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


<div class="row">
    @foreach($candidate as $candidates)
    
    <div class="col-md-4 col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3>{{ str_pad($candidates->candidate_number, 2, '0', STR_PAD_LEFT) }} - {{ $candidates->chairman_name }}</h3>
            </div>
            <div class="card-body">
                <div class="wrap mt-1" style="overflow:hidden;">
                    <a href="{{ Storage::url($candidates->image) }}"><img src="{{ Storage::url($candidates->image) }}" title="{{ $candidates->chairman_name }}" style="height:300px;width:100%;object-fit:contain;">
                </div>
                <h4 class="mt-3">{{ $candidates->faculties->name }}</h4>
                <h5 class="text-muted" style="font-size: 14px;">{{ $candidates->studyPrograms->name }}</h5>
                @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'panitia')
                <div class="button-list mt-3">
                    <a href="{{ route('candidates.editIn', ['id' => $candidates->id, 'candidateType' => $candidate_type2->slug]) }}" class="btn btn-sm btn-warning text-white mt-1"><i class="fa fa-edit mr-1"></i>Edit</a>
                    <button class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#program{{ $candidates->id }}"><i class="fa fa-info-circle mr-1"></i>Program</button>
                    <form style="display: inline" action="{{ route('candidates.destroy', $candidates->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-danger mt-1" onclick="deleteAlert(this)"><i class="fa fa-trash mr-1"></i>Hapus</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@foreach($candidate as $candidates)
<div class="modal fade" id="program{{ $candidates->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Program</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{!! $candidates->program !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
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
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script>
    function deleteAlert(e) {
            Swal.fire({
                title: "Hapus data kandidat?",
                text: `Data kandidat ini akan terhapus. Anda tidak akan dapat mengembalikan
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
