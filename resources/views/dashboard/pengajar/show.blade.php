@extends('dashboard.layouts.app')

@section('title')
Lihat Pengajar
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

<form action="{{ route('dashboard.trainer.update', $pengajar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Nama Pengajar</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name', $pengajar->name) }}" readonly />
                        @error('name')
                        <small class="form-text error-input">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                </div>
                <div class="card-body">
                    <textarea class="form-control" name="description" rows="3" disabled>{{ old('description', $pengajar->description) }}</textarea>
                    @error('description')
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
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span>Kategori Pengajar</span>
                        <div class="custom-control custom-switch">
                            <select name="parent_menu" class="costum-select custom-select-sm" disabled>
                                <option value="" disabled selected>:: Pilih ::</option>
                                @foreach($kategori_pengajars as $key => $item)
                                <option value="{{ $item->id }}" @if($item->id === $pengajar->parent_menu) selected @endif>{{ $item->kategori_pengajar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong>Upload Thumbnail</strong>
                        <div class="card my-2">
                            <label for="imageUpload" class="mb-0 cursor-pointer">
                                @if($pengajar->getFirstMediaUrl('pengajars', 'thumb'))
                                <img id="image-preview" class="card-img-top" src="{{ $pengajar->getFirstMediaUrl('pengajars', 'thumb')}}" alt="Card image cap">
                                <input type="hidden" name="media" value="{{ $pengajar->getFirstMediaUrl('pengajars', 'thumb')}}" />
                                @else
                                <img id="image-preview" class="card-img-top" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="Card image cap">
                                @endif
                            </label>
                        </div>
                        @error('media')
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