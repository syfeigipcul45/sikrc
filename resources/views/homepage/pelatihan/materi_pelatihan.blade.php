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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example" class="table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tema Pelatihan</th>
                                        <th>Materi Pelatihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tema as $key => $item)
                                    <tr>
                                        <td>{{ ++$key }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('homepage.pelatihan.show_materi', $item->slug) }}" class="btn btn-info btn-sm">
                                                <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                <span class="text"> Lihat Materi</span>
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
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection