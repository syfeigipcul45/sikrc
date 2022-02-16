@extends('dashboard.layouts.app')

@section('title')
Tambah Kategori Pengajar
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

<form action="{{ route('dashboard.kategori_pengajar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
    
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nama Kategori Pengajar</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="kategori_pengajar" value="{{ old('kategori_pengajar') }}" />
                        @error('kategori_pengajar')
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
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="text">Posting</span>
                        </button>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection