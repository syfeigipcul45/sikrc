@extends('dashboard.layouts.app')

@section('title')
Lihat Materi Pelatihan
@endsection

@section('extra-css')
<script src="https://cdn.tiny.cloud/1/mgnx3lcm1bg1v85bmqfw3ogmz9vjtdxolbcs3pmx800uia9e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<style>
    .error-input {
        color: #d44950;
    }
</style>
@endsection

@section('content')

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Materi Pelatihan</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="m-0 font-weight-bold text-primary ">{{ $tema->name }}</h6>
                        <a href="" class="btn btn-warning" onclick="location.href = document.referrer; return false;">
                            Kembali
                        </a>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <div class="accordion" id="accordionExample">
                    <!-- Presentasi -->
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Presentasi
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse {{ session('presentasi') }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="m-0 font-weight-bold text-primary "></h6>
                                        <a href="{{ route('dashboard.materi_pelatihan.createPresentasi', $tema->id) }}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-newspaper"></i>
                                            </span>
                                            <span class="text">Tambah File Presentasi</span>
                                        </a>
                                    </div>
                                    <table class="table table-bordered" id="dataTablePresentasi" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>File Presentasi</th>
                                                <th>Judul Presentasi</th>
                                                <th>Status Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>File Presentasi</th>
                                                <th>Judul Presentasi</th>
                                                <th>Status Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($presentasi as $key => $item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.materi_pelatihan.file_materi', $item->id) }}" target="_blank" class="btn btn-primary btn-sm btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            @if(pathinfo($item->link_media, PATHINFO_EXTENSION) == 'doc' || pathinfo($item->link_media, PATHINFO_EXTENSION) == 'docx')
                                                            <i class="fas fa-file-word"></i>
                                                            @elseif(pathinfo($item->link_media, PATHINFO_EXTENSION) == 'ppt' || pathinfo($item->link_media, PATHINFO_EXTENSION) == 'pptx')
                                                            <i class="fas fa-file-powerpoint"></i>
                                                            @elseif(pathinfo($item->link_media, PATHINFO_EXTENSION) == 'xls' || pathinfo($item->link_media, PATHINFO_EXTENSION) == 'xlsx')
                                                            <i class="fas fa-file-excel"></i>
                                                            @else
                                                            <i class="fas fa-file-pdf"></i>
                                                            @endif
                                                        </span>
                                                        <span class="text">Lihat Data</span>
                                                    </a>
                                                </td>
                                                <td>{{ $item->caption }}</td>
                                                <td>{{ $item->is_published == 1 ? 'Publish' : 'Private' }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.materi_pelatihan.editPresentasi', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-circle btn-sm remove-materi" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.materi_pelatihan.destroyPresentasi', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Gambar -->
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Gambar
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse {{ session('gambar') }}" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="m-0 font-weight-bold text-primary "></h6>
                                        <a href="{{ route('dashboard.materi_pelatihan.createGambar', $tema->id) }}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-newspaper"></i>
                                            </span>
                                            <span class="text">Tambah File Gambar</span>
                                        </a>
                                    </div>
                                    <table class="table table-bordered" id="dataTableGambar" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>File Gambar</th>
                                                <th>Judul Gambar</th>
                                                <th>Status Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>File Gambar</th>
                                                <th>Judul Gambar</th>
                                                <th>Status Dokumen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($gambar as $key => $item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <a href="{{ $item->link_media }}" target="_blank" class="btn btn-primary btn-sm btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-file-image"></i>
                                                        </span>
                                                        <span class="text">Lihat Data</span>
                                                    </a>
                                                </td>
                                                <td>{{ $item->caption }}</td>
                                                <td>{{ $item->is_published == 1 ? 'Publish' : 'Private' }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.materi_pelatihan.editGambar', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-circle btn-sm remove-materi" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.materi_pelatihan.destroyGambar', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Video -->
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Video
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse {{ session('video') }}" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="m-0 font-weight-bold text-primary "></h6>
                                        <a href="{{ route('dashboard.materi_pelatihan.createVideo', $tema->id) }}" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-newspaper"></i>
                                            </span>
                                            <span class="text">Tambah File Video</span>
                                        </a>
                                    </div>
                                    <table class="table table-bordered" id="dataTableVideo" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>File Video</th>
                                                <th>Judul Video</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>File Video</th>
                                                <th>Judul Video</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($video as $key => $item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <a href="{{ $item->link_media }}" target="_blank" class="btn btn-primary btn-sm btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-file-video"></i>
                                                        </span>
                                                        <span class="text">Lihat Video</span>
                                                    </a>
                                                </td>
                                                <td>{{ $item->caption }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.materi_pelatihan.editVideo', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-circle btn-sm remove-materi" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.materi_pelatihan.destroyVideo', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Delete Modal-->
@include('dashboard.materi-pelatihan.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<script>
    $('.remove-materi').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-materi').attr('action', hrefRemove);
    });
</script>
@endsection