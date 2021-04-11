@extends('admin.layouts.master')

@section('subtitle')
Manajemen Akun
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
<link type="text/css" rel="stylesheet" href="{{ asset('lightgallery/css/lightgallery.css') }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="header-title">Data Users</h4>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          
                
            </ul>               
            <p class="sub-header">
                <div class="button-list">
                    <a href="#custom-modal" class="btn btn-primary btn-sm btn-create waves-light waves-effect"
                        data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                        data-overlayColor="#36404a">Tambah</a>
                    <button type="button" class="btn btn-danger btn-sm waves-light waves-effect" 
                            data-toggle="modal" data-target=".deleteAllUsers">Bersihkan
                    </button>
                </div>
            </p>

            <style>
                @media only screen and (max-width: 600px) {
                    table {
                        text-align: justify !important;
                    }
                }

                @media only screen and (min-width: 600px) {
                    table {
                        text-align: justify !important;
                    }
                }

                @media only screen and (min-width: 992px) {
                    table {
                        text-align: center !important;
                    }
                }

                .list-unstyled{
                    text-align: center !important;
                   
                }
            </style>

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
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
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="button-list" style="max-width: 48%">
                                    <button type="button" id="editButton" class="btn btn-warning btn-rounded btn-block btn-edit waves-effect waves-light"
                                        data-toggle="modal" data-target=".bs-example-modal-sm"
                                        onclick="setEditData({{ $user }})">Edit
                                    </button>
                                    <button type="button"
                                        class="btn btn-danger btn-rounded btn-block waves-light waves-effect buttonHapus px-2" 
                                        data-toggle="modal" data-target=".deleteUser" 
                                        onclick="hapusUser({{ $user }})">Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Create modal -->
<style>
    .add-modal {
        overflow-y: scroll !important;
    }

    textarea {
        border: 1px solid #e3eaef !important;
        border-radius: 5px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    }
</style>


<!-- create modal pop up -->
<div id="custom-modal" class="modal-demo add-modal">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Tambah User</h4>
    <div class="custom-modal-text">
        <form class="form-horizontal" action="{{ route('users.store') }}" method="post">
            @csrf

            <div class="form-group">
                <div class="col-12">
                    <label for="election">Nama Lengkap</label>
                    <input class="form-control" type="text" id="name" placeholder="Contoh: Briana White" name="name"
                       value="{{ old('name') }}" required>
                    
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <label for="period">Username</label>
                    <input class="form-control" type="text" id="username" placeholder="Contoh: briana67" name="username"
                       value="{{ old('username') }}" required>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <label for="period">Email</label>
                    <input class="form-control" minlength="3" maxlength="35" type="email" id="email" placeholder="Contoh: briana67@gmail.com" name="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-12">
                    <label for="period">Password</label>
                    <input class="form-control" type="password" id="password"  name="password"
                        value="{{ old('password') }}" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <label for="period">Password Confirmation</label>
                    <input class="form-control" type="password" id="password_confirmation"  name="password_confirmation"
                        value="{{ old('password_confirmation') }}" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <label for="period">Role</label>
                    <select class="form-control" name="role" id="role" required>
                        @foreach($users as $user)
                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                        @endforeach
                    </select>
                    @error('role')
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


<!-- edit modal pop up -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('users.update', '') }}" id="edit-form" method="POST">
                    @csrf
                    @method('put')
    
                    <div class="form-group">
                        <div class="col-12">
                            <label for="election">Nama Lengkap</label>
                            <input class="form-control" type="text" id="edit_name" placeholder="Contoh: Briana White" name="edit_name"
                            value="{{ old('edit_name') }}" required>
                            
                            @error('edit_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Username</label>
                            <input class="form-control" type="text" id="edit_username" placeholder="Contoh: briana67" name="edit_username"
                            value="{{ old('edit_username') }}" required>
                            @error('edit_username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Email</label>
                            <input class="form-control" minlength="3" maxlength="35" type="email" id="edit_email" placeholder="Contoh: briana67@gmail.com" name="edit_email"
                                value="{{ old('edit_email') }}" required>
                            @error('edit_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                        <label for="period">Password</label>
                        <input class="form-control" type="text" id="edit_password"  name="edit_password"
                            value="{{ old('edit_password') }}" required>
                        @error('edit_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="period">Role</label>
                            <select class="form-control" name="edit_role" id="edit_role" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->role }}">{{ $user->role }}</option>
                                @endforeach
                            </select>
                            @error('edit_role')
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
    </div>
</div>



<!-- delete row modal pop up -->
<div class="modal fade deleteUser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Hapus User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('users.destroy', '') }}" method="POST" id="hapusUser">
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
<div class="modal fade deleteAllUsers" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mySmallModalLabel">Hapus Semua Users</h4>
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
                            <a href="{{ route('users.clearAll') }}" class="btn btn-danger mr-2 rounded waves-effect waves-light">Bersihkan</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="{{ asset('lightgallery/js/lightgallery-all.min.js') }}"></script>
 <!-- lightgallery plugins -->
<script src="{{ asset('lightgallery/js/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('lightgallery/js/lg-fullscreen.min.js') }}"></script>

<script>




//  passing data to edit modal pop up 
    const updateLink = $('#edit-form').attr('action');
    function setEditData(user) {
        $('#edit-form').attr('action', `${updateLink}/${user.id}`);
        $('[name="edit_name"]').val(user.name);    
        $('[name="edit_username"]').val(user.username);
        $('[name="edit_email"]').val(user.email);
        $('[name="edit_password"]').val(user.password);
        $('[name="edit_role"]').val(user.role);
    }

//  passing data to delete modal pop up
    const hapusUsers = $('#hapusUser').attr('action');
    function hapusUser(user) {
        $('#hapusUser').attr('action', `${hapusUsers}/${user.id}`);
    } 
</script>
@endsection
