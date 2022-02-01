@extends('admin.layouts.master')

@section('title')
    Email
@endsection

@section('title_menu')
    Send Email
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
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/voter')}}">Voter</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Email</a></li>
            </ol>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kirim Email ?</h4>
                        <button id="kirimEmail" onclick="sendEmail('announcement')" class="btn btn-outline-primary btn-sm">Kirim <i class="fa fa-paper-plane"></i></button>
                        <button id="processEmail" class="btn btn-outline-primary btn-sm">Memproses <i class="fa fa-spinner fa-spin"></i></button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="list">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

{{-- Sweetalert --}}
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script>
    $('#processEmail').hide();

    // Example POST method implementation:
    async function postData(url = '', data = {}) {
    // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(data) // body data type must match "Content-Type" header
        });
        return response.json(); // parses JSON response into native JavaScript objects
    }

    function sendEmail(params) {
        alert(params);
        $('#kirimEmail').hide();
        $('#processEmail').show();

        fetch("{{route('api-voters.list')}}")
            .then(response => response.json())
            .then(data => {
                data.forEach((e,i) => {
                    
                    var number = i + 1;
                    var date = "{{date('Y-m-d H:i:s')}}";
                    var row = '<tr id="list_'+e.id+'"><td><strong>'+number+'</strong></td><td>'+e.name+'</td><td>'+e.email+'</td>';
                    row += '<td id="status_'+e.id+'">Mengirim...</td><td id="date_'+e.id+'"></td></tr>';
                    $('#list').append(row);

                    // console.log("{{route('api-voters.send-email')}}");

                    postData("{{route('api-voters.send-email')}}", {
                        id: e.id,
                        _token: "{{csrf_token()}}"
                    })
                    .then(data_email => {
                        if (data_email.status == true) {
                            var success_email = '<td><span class="badge light badge-success">Berhasil</span></td>';
                            $('#status_'+e.id).replaceWith(success_email);
                        }else{
                            var error_email = '<td><span class="badge light badge-danger">Gagal</span></td>';
                            $('#status_'+e.id).replaceWith(error_email);
                        }
                        $('#date_'+e.id).replaceWith(date);
                    }).catch(err => console.error(err));

                });
                $('#kirimEmail').show();
                $('#processEmail').hide();
            }).catch(err => console.error(err));
    }
</script>
@endsection