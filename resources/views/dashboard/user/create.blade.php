@extends('dashboard.layouts.app')

@section('title')
Tambah Daftar User
@endsection

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .error-input {
        color: #d44950;
    }
</style>
@endsection

@section('content')

<form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nama Lengkap</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        @error('name')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Email</h6>
                </div>
                <div class="card-body">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Password</h6>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                        <span class="input-group-append">
                            <label class="input-group-text"><i class="fa fa-eye" id="togglePassword"></i></label>
                        </span>
                    </div>
                    @error('password')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Password</h6>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('confirm_password') }}">
                        <span class="input-group-append">
                            <label class="input-group-text"><i class="fa fa-eye" id="togglePasswordConfirm"></i></label>
                        </span>
                    </div>
                    @error('password_confirmation')
                    <small class="form-text error-input">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Submit</span>
                        </button>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Level User</span>
                        <div class="custom-control custom-switch">
                            <select name="role_id" class="costum-select custom-select-sm">
                                <option value="" disabled selected>:: Pilih ::</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->id.". ".$role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <small class="form-text error-input">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('extra-js')
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const password = document.querySelector('#password');
    const confirmPassword = document.querySelector('#password_confirmation');

    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // this.classList.toggle('fa fa-eye');
    });

    togglePasswordConfirm.addEventListener('click', function(e) {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
    });

    $("#imageUpload").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection