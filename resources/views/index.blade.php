@extends('layouts.master')

@section('title')
Kandidat
@endsection

@section('content')
<section class="sectionFormLogin">
    <div class="container mt-5">
        <div class="row">
            @php
                $color = ['One', 'Two', 'Three'];
                $number = 0;
            @endphp

            @foreach($candidates as $candidate)
                <div class="col-md-4 px-5 mt-5 mt-md-0" data-toggle="modal"
                    data-target="#exampleModal{{ $candidate->id }}">
                    <img src="{{ asset("images/uploaded/$candidate->image") }}" alt=""
                        class="img-fluid candidateImg{{ $color[$number] }}" {{ $number }}>
                    <div class="wrapperCandidate{{ $color[$number] }} text-center mt-5 p-4">
                        <h5>
                            {{ $candidate->chairman_name }}
                        </h5>
                        <h5>
                            {{ $candidate->vice_chairman_name }}
                        </h5>
                    </div>
                </div>

                @php
                    $number++;

                    if ($number > 2)
                        $number = 0;
                @endphp
            @endforeach
        </div>

        <div class="wFull d-flex justify-content-center mt-5">
            <a href="#" type="submit" class="btn login" data-toggle="modal" data-target="#sopModal">Petunjuk</a>
        </div>
        <div class="wFull d-flex justify-content-center mt-1">
            <p class="textCopy mt-md-5 mt-3">
                Build with passion by
                <img src="{{ asset('images/admin_component/Logo_Tahu_Ngoding.png') }}"
                    class="logoTahuNgoding" />
            </p>
        </div>
    </div>

    <!-- Modal Visi Dan Misi -->
    @foreach($candidates as $candidate)
        <div class="modal fade px-4" id="exampleModal{{ $candidate->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog custom" role="document">
                <div class="modal-content custom">
                    <div class="modal-body p-md-5 p-4 pt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="font-weight-bold title titleSection">
                                    Visi
                                </h1>
                                <p>{!! $candidate->vision !!}</p>
                            </div>
                            <div class="col-md-6 text-md-left text-right mt-4 mt-md-0">
                                <h1 class="font-weight-bold title titleSection">
                                    Misi
                                </h1>
                                <p>{!! $candidate->mission !!}</p>
                            </div>
                        </div>
                        <div class="wFull d-flex justify-content-center mtBtnPilih">
                            <a href="#" type="submit" class="btn login" data-candidate="{{ $candidate }}"
                                onclick="electAlert(this)"
                                data-url="{{ route('elect_candidate', $candidate) }}">PILIH
                                !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach


    <!-- Modal SOP Pemilihan -->
    <div class="modal fade px-4" id="sopModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog custom" role="document">
            <div class="modal-content custom">
                <div class="modal-body p-md-5 p-4 pt-5">
                    <h1 class="font-weight-bold title titleSection">
                        SOP Pemilihan
                    </h1>
                    <ol class="listSOP pl-4">
                        <li>
                            Masukan NIM dan Token yang telah Dikirim melalui email kampus.
                        </li>
                        <li>
                            Klik salah satu nama kandidat yang ingin anda lihat Visi/Misi nya.
                        </li>
                        <li>
                            Klik tombol "Pilih!" jika anda ingin memilih salah satu kandidat tersebut.
                        </li>
                    </ol>
                    <div class="wFull d-flex justify-content-start mt-3">
                        <a href="#" type="submit" class="btn login font-weight-bold">Mengerti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('js')
<script>
    function electAlert(e) {
        let candidate = JSON.parse(e.dataset.candidate)

        Swal.fire({
            title: `Pilih kandidat ${candidate.chairman_name} - ${candidate.vice_chairman_name}?`,
            type: "question",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Saya yakin!",
            cancelButtonText: "Tidak, batal."
        }).then(function (t) {
            if (t.value) {
                window.location.href = `${e.dataset.url}`
            }
        })
    }

</script>
@endsection
