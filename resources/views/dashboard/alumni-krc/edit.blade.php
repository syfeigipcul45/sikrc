@extends('dashboard.layouts.app')

@section('title')
Edit Alumni KRC
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

<form action="{{ route('dashboard.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-error" role="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Alumni</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $alumni->name) }}" />
                        @error('name')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $alumni->tempat_lahir) }}" />
                        @error('tempat_lahir')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $alumni->tanggal_lahir) }}" />
                        @error('tanggal_lahir')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No. HP</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp', $alumni->no_hp) }}" />
                        @error('no_hp')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Asal Instansi/Lembaga</label>
                        <input type="text" class="form-control" name="instansi" value="{{ old('instansi', $alumni->instansi) }}" />
                        @error('instansi')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">alamat</label>
                        <textarea class="form-control" name="alamat" rows="3">{{ old('alamat', $alumni->alamat) }}</textarea>
                        @error('alamat')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
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
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Update</span>
                        </button>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Tema Pelatihan</span>
                        <div class="custom-control custom-switch">
                            <select name="tema_id" class="form-control js-example-basic-single">
                                <option value="" disabled selected>:: Pilih ::</option>
                                @foreach($tema as $key => $item)
                                <option value="{{ $item->id }}" @if($item->id === $alumni->tema_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('tema_id')
                            <small class="form-text error-input">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Upload Thumbnail</strong>
                        <div class="card my-2">
                            <label for="imageUpload" class="mb-0 cursor-pointer">
                                @if($alumni->getFirstMediaUrl('avatars', 'avatar'))
                                <img id="image-preview" class="card-img-top" src="{{ $alumni->getFirstMediaUrl('avatars', 'avatar')}}" alt="Card image cap">
                                <input type="hidden" name="media" value="{{ $alumni->getFirstMediaUrl('avatars', 'avatar')}}" />
                                @else
                                <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                @endif
                            </label>
                            <input type='file' id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" hidden />
                        </div>
                        @error('avatar')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
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