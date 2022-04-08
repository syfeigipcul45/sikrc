@extends('dashboard.layouts.app')

@section('title')
Pengaturan Umum
@endsection

@section('extra-css')
<style>
    .img-preview {
        width: 100px;
        height: 100px;
    }

    .img-favicon {
        width: 100px;
        height: 100px;
    }
</style>
@endsection

@section('content')

<form action="{{ route('dashboard.settings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Profil</h6>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            Judul Profil
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="profile_title" value="{{ old('profile_title', $option->profile_title ?? '') }}" />
                            @error('profile_title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            Video Profil
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="profile_url" value="{{ old('profile_url', $option->profile_url ?? '') }}" />
                            @error('profile_url')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            Deskripsi Profil
                        </div>
                        <div class="col-lg-8">
                            <textarea name="profile_description" id="profile_description" class="form-control" rows="8" onkeyup="countChars(this);" required>{{ old('profile_description', $option->profile_description ?? '') }}</textarea>
                            <p id="charNum"></p>
                            @error('profile_description')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Umum</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Logo Utama
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img id="preview-main" class="img-preview mb-2" src="{{ $option->logo ?? asset('img/placeholder.png') }}" alt="main logo" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="main-logo" class="btn btn-primary btn-file">
                                        <span>Upload</span>
                                        <!-- The file is stored here. -->
                                        <input id="main-logo" type="file" onchange="previewMain(this);" name="logo" hidden />
                                    </label>
                                    @error('logo')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Favicon
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img id="preview-favicon" class="img-favicon mb-2" src="{{ $option->favicon ?? asset('img/placeholder.png') }}" alt="favicon logo" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="favicon-logo" class="btn btn-primary btn-file">
                                        <span>Upload</span>
                                        <!-- The file is stored here. -->
                                        <input id="favicon-logo" type="file" onchange="previewFavicon(this);" name="favicon" hidden />
                                    </label>
                                    @error('favicon')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Nomor Handphone
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" name="phone" value="{{ old('phone', $option->phone ?? '') }}" />
                            @error('phone')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Nomor Whatsapp
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" name="whatsapp" value="{{ old('whatsapp', $option->whatsapp ?? '') }}" />
                            @error('whatsapp')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Email
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" name="email" value="{{ old('email', $option->email ?? '') }}" />
                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Alamat
                        </div>
                        <div class="col-lg-6">
                            <textarea class="form-control" rows="3" name="address">{{ old('address', $option->address ?? '') }}</textarea>
                            @error('address')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if (\Session::has('error'))
                    <div class="invalid-feedback text-center mt-3 d-block">
                        {!! \Session::get('error') !!}
                    </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Background Banner</h6>
                </div>
                <div class="card-body">
                    <div>
                        <strong>Banner Utama</strong>
                        <small class="text-danger">*ukuran pixel gambar 1440x300</small>
                        <div class="card my-2">
                            <label for="imageUpload" class="mb-0 cursor-pointer">
                                @if($option->getFirstMediaUrl('banner', 'cover'))
                                <img id="image-preview" class="card-img-top" src="{{ $option->getFirstMediaUrl('banner', 'cover')}}" alt="Card image cap">
                                <input type="hidden" name="banner" value="{{ $option->getFirstMediaUrl('banner', 'cover')}}" />
                                @else
                                <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                @endif
                            </label>
                            <input type='file' id="imageUpload" name="banner" accept=".png, .jpg, .jpeg" hidden />
                        </div>
                    </div>
                    <div>
                        <strong>Banner Login</strong>
                        <small class="text-danger">*ukuran pixel gambar 1440x300</small>
                        <div class="card my-2">
                            <label for="imageBannerLogin" class="mb-0 cursor-pointer">
                                @if($option->getFirstMediaUrl('banner-login', 'cover'))
                                <img id="banner-login" class="card-img-top" src="{{ $option->getFirstMediaUrl('banner-login', 'cover')}}" alt="Card image cap">
                                <input type="hidden" name="banner_login" value="{{ $option->getFirstMediaUrl('banner-login', 'cover')}}" />
                                @else
                                <img id="banner-login" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                @endif
                            </label>
                            <input type='file' id="imageBannerLogin" name="banner_login" accept=".png, .jpg, .jpeg" hidden />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Social Media</h6>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Twitter
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" placeholder="https://twitter.com/username" name="twitter" value="{{ old('twitter', $option->twitter ?? '') }}" />
                            @error('twitter')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Facebook
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" placeholder="https://facebook.com/username" name="facebook" value="{{ old('facebook', $option->facebook ?? '') }}" />
                            @error('facebook')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Instagram
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" placeholder="https://instagram.com/username" name="instagram" value="{{ old('instagram', $option->instagram ?? '') }}" />
                            @error('instagram')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            Youtube
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" placeholder="https://youtube.com/username" name="youtube" value="{{ old('youtube', $option->youtube ?? '') }}" />
                            @error('youtube')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection

@section('extra-js')
<script>
    function previewMain(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#preview-main').attr('hidden', false);

            reader.onload = function(e) {
                $('#preview-main').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewFavicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $('#preview-favicon').attr('hidden', false);

            reader.onload = function(e) {
                $('#preview-favicon').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function() {
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').hide();
                $('#image-preview').fadeIn(300);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageBannerLogin").change(function() {
        readURLBannerLogin(this);
    });

    function readURLBannerLogin(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#banner-login').attr('src', e.target.result);
                $('#banner-login').hide();
                $('#banner-login').fadeIn(300);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function countChars(obj) {
        var maxLength = 500;
        var strLength = obj.value.length;

        if (strLength > maxLength) {
            document.getElementById("charNum").innerHTML = '<span style="color: red;">' + strLength + ' dari ' + maxLength + ' karakter</span>';
        } else {
            document.getElementById("charNum").innerHTML = strLength + ' dari ' + maxLength + ' karakter';
        }
    }

    $(document).ready(function() {
        var len = $('#profile_description').val().length;
        document.getElementById("charNum").innerHTML = len + ' dari 500 karakter';
    });
</script>
@endsection