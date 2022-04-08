@extends('dashboard.layouts.app')

@section('title')
Management Jadwal Pelatihan
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Jadwal Pelatihan</h6>
        <a href="{{ route('dashboard.jadwal_pelatihan.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-newspaper"></i>
            </span>
            <span class="text">Tambah Jadwal Pelatihan</span>
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tema Pelatihan</th>
                        <th>Lokasi Pelatihan</th>
                        <th>Tanggal Pelatihan</th>
                        <th>Peserta Pelatihan</th>
                        <th>Undangan Pelatihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tema Pelatihan</th>
                        <th>Lokasi Pelatihan</th>
                        <th>Tanggal Pelatihan</th>
                        <th>Peserta Pelatihan</th>
                        <th>Undangan Pelatihan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($jadwal as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->temaPelatihan->name }}</td>
                        <td>{{ $item->lokasi_pelatihan }}</td>
                        <td>{{ changeDate($item->waktu_pelatihan) }}</td>
                        <td>{{ $item->peserta }}</td>
                        <td>
                            <a href="{{ $item->file_undangan }}" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-file-pdf"></i> Lihat File</a>
                        </td>
                        <td class="text-center">
                            <!-- <a href="{{ route('dashboard.jadwal_pelatihan.show', $item->id) }}" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a> -->
                            <a href="{{ route('dashboard.jadwal_pelatihan.edit', $item->id) }}" class="btn btn-warning btn-circle btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-circle btn-sm remove-jadwal" data-toggle="modal" data-target="#deleteModal" data-href="{{ route('dashboard.jadwal_pelatihan.destroy', $item->id) }}">
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
@include('dashboard.jadwal-pelatihan.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-jadwal').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-jadwal').attr('action', hrefRemove);
    });
</script>
@endsection