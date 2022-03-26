@extends('dashboard.layouts.app')

@section('title')
Management Pengajar
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajar</h6>
        <a href="{{ route('dashboard.instructur.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-newspaper"></i>
            </span>
            <span class="text">Tambah Pengajar</span>
        </a>
    </div>
    <div class="card-body">
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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Pengajar</th>
                        <th>Nama Pengajar</th>
                        <th>Deskripsi</th>
                        <th>Kategori Pengajar</th>
                        <th>Urutan</th>
                        <th>Ubah Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Foto Pengajar</th>
                        <th>Nama Pengajar</th>
                        <th>Deskripsi</th>
                        <th>Kategori Pengajar</th>
                        <th>Urutan</th>
                        <th>Ubah Urutan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($pengajars as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <img src="{{ $item->getFirstMediaUrl('pengajars', 'thumb')}} " alt="" height="80px" width="80px" class="img-profile rounded-circle" />
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->kategoriPengajar->kategori_pengajar }}</td>
                        <td>{{ $item->order }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('dashboard.instructur.increase', $item->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-arrow-up"></i></button>
                                </form>
                                <form action="{{route('dashboard.instructur.decrease', $item->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.instructur.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('dashboard.instructur.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-pengajar" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.instructur.destroy', $item->id) }}">
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
@include('dashboard.pengajar.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-pengajar').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-pengajar').attr('action', hrefRemove);
    });
</script>
@endsection