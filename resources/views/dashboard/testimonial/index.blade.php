@extends('dashboard.layouts.app')

@section('title')
Management Testimonial
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Testimonial</h6>
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
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Pesan</th>
                        <th>Pelatihan yang diikuti</th>
                        <th>Tanggal Posting</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Pesan</th>
                        <th>Pelatihan yang diikuti</th>
                        <th>Tanggal Posting</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($testimonials as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ shrinkTitle($item->pesan) }}</td>
                        <td>{{ $item->temaPelatihan->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.testimonial.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> &nbsp;
                            @if($item->is_published === 0)
                            <form action="{{ route('dashboard.testimonial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="is_published" value="1" type="hidden">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></button>
                            </form>
                            @else
                            <form action="{{ route('dashboard.testimonial.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="is_published" value="0" type="hidden">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                            </form>
                            @endif
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
@include('dashboard.posts.includes.modal-delete')

@section('extra-js')
<!-- Page level plugins -->
<script src="{{ asset('_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('_dashboard/js/demo/datatables-demo.js') }}"></script>

<!-- Custom scripts -->
<script>
    $('.remove-posts').click(function() {
        const hrefRemove = $(this).data('href');
        $('#remove-posts').attr('action', hrefRemove);
    });
</script>
@endsection