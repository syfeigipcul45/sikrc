@extends('dashboard.layouts.app')

@section('title')
Alumni KRC
@endsection

@section('extra-css')
<style>
    .error-input {
        color: #d44950;
    }
</style>
@endsection

@section('content')
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
                    <label style="font-weight: bold;">Nama Lengkap</label><br>
                    <label>{{ $alumni->name }}</label>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Tempat, Tanggal Lahir</label><br>
                    <label>{{ $alumni->tempat_lahir.', '.getTanggal($alumni->tanggal_lahir) }}</label>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">No. HP</label><br>
                    <label>{{ $alumni->no_hp }}</label>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Asal Instansi/Lembaga</label><br>
                    <label>{{ $alumni->instansi }}</label>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">alamat</label><br>
                    <label>{{ $alumni->alamat }}</label>
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
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                        Kembali
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <span style="font-weight: bold;">Tema Pelatihan</span>
                    <div class="custom-control custom-switch">
                        <label>{{ $alumni->temaPelatihan->name }}</label>
                    </div>
                </div>
                <hr>
                <div>
                    <strong>Foto</strong>
                    <div class="card my-2">
                        @if($alumni->getFirstMediaUrl('avatars','avatar'))
                        <img style="width: fit-content; height: fit-content;" src="{{ $alumni->getFirstMediaUrl('avatars', 'avatar')}} " alt="" />
                        @else
                        <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
</script>
@endsection