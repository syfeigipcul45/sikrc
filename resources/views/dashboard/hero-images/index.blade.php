@extends('dashboard.layouts.app')

@section('title')
Hero Images
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Gambar Utama</h6>
        <a href="{{ route('dashboard.hero_images.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-newspaper"></i>
            </span>
            <span class="text">Tambah Gambar</span>
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($hero_images as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img src="{{ $item->getFirstMediaUrl('hero-image', 'thumb') }}" alt="" class="img-fluid h-40" />
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="text-center" style="width: 10%;">
                            <a href="{{ route('dashboard.hero_images.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-heroes" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.hero_images.destroy', $item->id) }}">
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
@endsection

<!-- Delete Modal-->
@include('dashboard.hero-images.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-heroes').click(function() {
        const hrefHero = $(this).data('href');
        $('#remove-heroes').attr('action', hrefHero);
    });
</script>
@endsection