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

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengaturan Umum</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('dashboard.settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="text">Simpan</span>
                            </button>
                        </div>
                    </div>
                    @if (\Session::has('error'))
                    <div class="invalid-feedback text-center mt-3 d-block">
                        {!! \Session::get('error') !!}
                    </div>
                    @endif
                </form>
            </div>
        </div>

    </div>

</div>
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
</script>
@endsection