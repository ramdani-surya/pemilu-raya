@extends('layouts.master')

@section('title')
Manajemen Akun
@endsection


@section('title_menu')
Daftar Manajemen Akun
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
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Manajemen Akun</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data User</h4>
                    @if(Auth::user()->role == 'super_admin' || Auth::user()->role == 'admin')
                    <div class="button-list">
                        <button type="button" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-xs"
                            data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                            data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i> Tambah</button>
                        <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    {{-- <div class="table-responsive"> --}}
                    <table id="example4" class="table dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                @if(Auth::user()->role == 'admin')
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
        
                        <tbody>
        
                            @php
                            $increment = 1;
                            @endphp
        
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $increment++ }} </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge badge-success font-15">{{ $user->role }}</span></td>
                                @if(Auth::user()->role == 'admin')
                                <td>
                                    <div class="form-group">
                                        <button type="button" data-toggle="modal" data-target="#editUserModal"
                                            data-ids="{{ $user->id }}" data-role="{{ $user->role }}"
                                            onclick="setEditData({{ $user }})"
                                            class="btn btn-warning btn-xs text-white"><i class="fa fa-edit mr-1"></i> Edit</button>
                                        <form style="display: inline" action="{{ route('users.destroy', $user) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button"
                                                class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash-o mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-dark btn-xs waves-effect waves-light" id="update-password"><i class="fa fa-key mr-1"></i> Ubah
                                            Password
                                        </a>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('users.store') }}" method="post" id="tambahUser">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                        <div class="form-group">
                            <div class="col-12">
                                <label for="election">Nama Lengkap</label>
                                <input class="form-control mb-1 @error('name') is-invalid @enderror" type="text" id="name"
                                    placeholder="Contoh: Briana White" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Username</label>
                                <input class="form-control mb-1 @error('username') is-invalid @enderror" type="text"
                                    id="username" placeholder="Contoh: briana67" name="username"
                                    value="{{ old('username') }}">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Email</label>
                                <input class="form-control mb-1 @error('email') is-invalid @enderror" minlength="3"
                                    maxlength="35" type="email" id="email" placeholder="Contoh: briana67@gmail.com"
                                    name="email" value="{{ old('email') }}">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Password</label>
                                <div class="input-group mb-1">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password"
                                        name="password" id="passwordId" placeholder="Masukan Password Anda">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary fa fa-eye toggle-password tombol"
                                            type="button"></button>
                                    </div>
                                </div>
                                <label for="passwordId" id="passwordV" generated="true" class="error"></label>
                                <script>
                                    if (document.getElementById('passwordV').innerHTML == ""){
                                            document.getElementById('passwordV').style.display = "none";
                                      }
                                </script>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Password Confirmation</label>
                                <div class="input-group mb-1">
                                    <input class="form-control" type="password" name="password_confirmation"
                                        id="passwordConfirm" placeholder="Masukan Konfirmasi Password Anda"
                                        value="{{ old('email') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary fa fa-eye toggle-password-confirm"
                                            type="button"></button>
                                    </div>
                                </div>
                                <label for="passwordConfirm" id="password_confirm" generated="true" class="error"></label>
                                <script>
                                    if (document.getElementById('password_confirm').innerHTML == ""){
                                            document.getElementById('password_confirm').style.display = "none";
                                      }
                                </script>
                            </div>
                        </div>
                        
                        @if(Auth::user()->role == 'super_admin')
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Role</label>
                                <select class="form-control mb-1" name="role" id="role">
                                    <option value="super_admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="saksi">Saksi</option>
                                </select>
                            </div>
                        </div>
                        @elseif(Auth::user()->role == 'admin')
                        <div class="form-group">
                            <div class="col-12">
                                <label for="period">Role</label>
                                <select class="form-control mb-1" name="role" id="role">
                                    <option value="admin">Admin</option>
                                    <option value="saksi">Saksi</option>
                                </select>
                            </div>
                        </div>
                        @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="tambahButton">Simpan Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('users.update', '') }}" id="editUser" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="checkUsername">
                    <input type="hidden" id="checkEmail">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="name">Nama Lengkap</label>
                            <input class="form-control mb-1 @error('edit_name') is-invalid @enderror" type="text"
                                id="Edit" placeholder="Contoh: Briana White" name="edit_name"
                                value="{{ old('edit_name') }}" required>

                            @error('edit_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="username">Username</label>
                            <input class="form-control mb-1 @error('edit_username') is-invalid @enderror" type="text"
                                id="edit_username" placeholder="Contoh: briana67" name="edit_username"
                                value="{{ old('edit_username') }}" required>
                            @error('edit_username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input class="form-control mb-1 @error('edit_email') is-invalid @enderror" minlength="3"
                                maxlength="35" type="email" id="edit_email" placeholder="Contoh: briana67@gmail.com"
                                name="edit_email" value="{{ old('edit_email') }}" required>
                            @error('edit_email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if(Auth::user()->role == 'super_admin')
                    <div class="form-group">
                        <div class="col-12">
                            <label for="role">Role</label>
                            <select class="form-control mb-1 @error('edit_role') is-invalid @enderror" name="edit_role"
                                id="edit_role" required>
                                <option value="super_admin">Super Admin</option>
                                <option value="admin">Admin</option>
                                <option value="saksi">Saksi</option>
                            </select>

                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @elseif(Auth::user()->role == 'admin')
                    <div class="form-group">
                        <div class="col-12">
                            <label for="role">Role</label>
                            <select class="form-control mb-1 @error('edit_role') is-invalid @enderror" name="edit_role"
                                id="edit_role" required>
                                @if ($errors->has('edit_name') || $errors->has('edit_username') ||
                                $errors->has('edit_email'))
                                <option value="{{ old('edit_role') }}">{{ old('edit_role') }}</option>
                                @else
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="saksi">Saksi</option>
                                @endif
                            </select>

                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <div class="col-12">
                            <label for="role">Role</label>
                            <select class="form-control mb-1 @error('edit_role') is-invalid @enderror" name="edit_role"
                                id="edit_role" required>
                                @if ($errors->has('edit_name') || $errors->has('edit_username') ||
                                $errors->has('edit_email'))
                                <option value="{{ old('edit_role') }}">{{ old('edit_role') }}</option>
                                @else
                                <option value="">Pilih Role</option>
                                <option value="saksi">Saksi</option>
                                @endif
                            </select>

                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="editButton">Simpan Perubahan</button>
                </div>
                </form>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $("#tambahUser").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                        },
                        username:{
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                            remote: {
                                    url: "{{ route('user.checkUsername') }}",
                                    type: "post",
                            }
                        },
                        email: {
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                            remote: {
                                    url: "{{ route('user.checkEmail') }}",
                                    type: "post",
                            }
                        },
                        password : {
                            required: true,
                            minlength : 2
                        },
                        password_confirmation : {
                            required: true,
                            equalTo : "#passwordId"
                        },
                        role: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Nama harus di isi",
                            minlength: "Nama tidak boleh kurang dari 3 karakter",
                            maxlength: "Nama tidak boleh lebih dari 30 karakter"
                        },
                        username: {
                            required: "Username harus di isi",
                            minlength: "Username tidak boleh kurang dari 3 karakter",
                            maxlength: "Username tidak boleh lebih dari 30 karakter",
                            remote: "Username sudah tersedia"
    
                        },
                        email: {
                            required: "Email harus di isi",
                            email: "Email yang di isikan harus valid",
                            minlength: "Email tidak boleh kurang dari 3 karakter",
                            maxlength: "Email tidak boleh lebih dari 30 karakter",
                            remote: "Email sudah tersedia"
                        },
                        password: {
                            required: "Password harus di isi",
                            minlength: "Password tidak boleh kurang dari 2 karakter"
                        },
                        password_confirmation: {
                            required: "Konfirmasi Password harus di isi",
                            equalTo: "Konfirmasi Password tidak sama"
                        },
                        role: {
                            required: "Role harus di isi"
                        },
                    }
                });
            });
    </script>
    
    {{-- Validate Modal Edit User --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $("#editUser").validate({
                    rules: {
                        edit_name: {
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                        },
                        edit_username:{
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                            remote: {
                                param: {
                                    url: "{{ route('user.checkUsername') }}",
                                    type: "post",
                                },
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkUsername').val());
                                },
                               
                            }
                        },
                        edit_email: {
                            required: true,
                            minlength: 3,
                            maxlength: 30,
                            remote: {
                                param: {
                                    url: "{{ route('user.checkEmail') }}",
                                    type: "post",
                                },
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkEmail').val());
                                },
                               
                            }
                        },
                        edit_role: {
                            required: true,
                        },
                    },
                    messages: {
                        edit_name: {
                            required: "Nama harus di isi",
                            minlength: "Nama tidak boleh kurang dari 3 karakter",
                            maxlength: "Nama tidak boleh lebih dari 30 karakter"
                        },
                        edit_username: {
                            required: "Username harus di isi",
                            minlength: "Username tidak boleh kurang dari 3 karakter",
                            maxlength: "Username tidak boleh lebih dari 30 karakter",
                            remote: "Username sudah tersedia"
                        },
                        edit_email: {
                            required: "Email harus di isi",
                            email: "Email yang di isikan harus valid",
                            minlength: "Email tidak boleh kurang dari 3 karakter",
                            maxlength: "Email tidak boleh lebih dari 30 karakter",
                            remote: "Email sudah tersedia"
                        },
                        edit_role: {
                            required: "Role harus di isi"
                        },
                    }
                });
            });
    </script>
    
    <script>
        //  when modal is closed error validation removed 
        $('#editModal').on('hidden.bs.modal', function() {
            var $alertas = $('#editModal');
            $alertas.validate().resetForm();
            $alertas.find('.error').removeClass('error');
        });
    
        //  passing data to edit modal pop up 
        const updateLink = $('#editUser').attr('action');
        function setEditData(user) {
            $('#editUser').attr('action',  `${updateLink}/${user.id}`);
            $('#checkUsername').val(user.username);
            $('#checkEmail').val(user.email);
            $('[name="edit_name"]').val(user.name);
            $('[name="edit_username"]').val(user.username);
            $('[name="edit_email"]').val(user.email);
            $('[name="edit_role"]').val(user.role);
        }
        
        // passing data to select option tag
        $(".editButton").click(function() {
            var idAsValue = $(this).attr('data-role');
            $("#edit_role").val(idAsValue);
        });
    
        // password show/hide toggle
        $(".toggle-password").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var password = document.getElementById("passwordId");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
    
        });
    
        // password confirm show/hide toggle
        $(".toggle-password-confirm").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var passwordConfirm = document.getElementById("passwordConfirm");
    
            if (passwordConfirm.type === "password") {
                passwordConfirm.type = "text";
    
            } else {
                passwordConfirm.type = "password";
            }
    
        });
    
        // edit password show/hide toggle
        $(".toggle-edit-password").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var editPassword = document.getElementById("editPassword");
    
            if (editPassword.type === "password") {
                editPassword.type = "text";
    
            } else {
                editPassword.type = "password";
            }
    
        });
        
        // edit password confirm show/hide toggle
        $(".toggle-edit-password-confirm").click(function() {
            $(this).toggleClass("far fa-eye-slash");
            var editPasswordConfirm = document.getElementById("editPasswordConfirm");
    
            if (editPasswordConfirm.type === "password") {
                editPasswordConfirm.type = "text";
    
            } else {
                editPasswordConfirm.type = "password";
            }
    
        });
    
        // sweetalert delete one data
        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus user?",
                text: `Seluruh data terkait user akan terhapus. Anda tidak akan dapat mengembalikan aksi
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

        $("#clearAll").click(function () {
            Swal.fire({
                title: "Bersihkan user?",
                text: `Seluruh data terkait User akan ikut terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    window.location.href = "{{ route('users.clear') }}"
                }
            })
        });
    </script>
@endsection
