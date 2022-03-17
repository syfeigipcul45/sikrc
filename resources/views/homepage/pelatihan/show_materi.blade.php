@extends('homepage.layouts.app')

@section('title')
Materi Pelatihan
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= asset('_homepage/assets/img/bg_image_1.jpg') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pelatihan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Materi Pelatihan</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Materi Pelatihan</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold ">{{ $tema->name }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                {!! $tema->description !!}
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
                                                <h6 class="m-0 font-weight-bold  "></h6>
                                            </div>
                                            <table class="table table-bordered" id="dataTablePresentasi" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>File Presentasi</th>
                                                        <th>Judul Presentasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($presentasi as $key => $item)
                                                    <tr>
                                                        <td>{{++$key}}</td>
                                                        <td>
                                                            <a href="{{ $item->link_media }}" target="_blank" class="btn btn-primary btn-sm btn-icon-split">
                                                                <span class="icon text-white-50">
                                                                    @if(pathinfo($item->link_media, PATHINFO_EXTENSION) == 'doc' || pathinfo($item->link_media, PATHINFO_EXTENSION) == 'docx')
                                                                    <i class="fas fa-file-word"></i>
                                                                    @elseif(pathinfo($item->link_media, PATHINFO_EXTENSION) == 'ppt' || pathinfo($item->link_media, PATHINFO_EXTENSION) == 'pptx')
                                                                    <i class="fas fa-file-powerpoint"></i>
                                                                    @else
                                                                    <i class="fas fa-file-pdf"></i>
                                                                    @endif
                                                                </span>
                                                                <span class="text">Lihat Data</span>
                                                            </a>
                                                        </td>
                                                        <td>{{ $item->caption }}</td>
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
                                                <h6 class="m-0 font-weight-bold  "></h6>
                                            </div>
                                            <table class="table table-bordered" id="dataTableGambar" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>File Gambar</th>
                                                        <th>Judul Gambar</th>
                                                    </tr>
                                                </thead>
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
                                                <h6 class="m-0 font-weight-bold  "></h6>
                                            </div>
                                            <table class="table table-bordered" id="dataTableVideo" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>File Video</th>
                                                        <th>Judul Video</th>
                                                    </tr>
                                                </thead>
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
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTablePresentasi').DataTable();
    });

    $(document).ready(function() {
        $('#dataTableGambar').DataTable();
    });

    $(document).ready(function() {
        $('#dataTableVideo').DataTable();
    });
</script>
@endsection