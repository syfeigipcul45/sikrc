@extends('homepage.layouts.app')

@section('title')
Jadwal Pelatihan
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Jadwal Pelatihan</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Jadwal Pelatihan</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tema Pelatihan</th>
                                <th>Lokasi Pelatihan</th>
                                <th>Waktu Pelatihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal_pelatihans as $key => $jadwal_pelatihan)
                            <tr>
                                <td>{{ ++$key }}.</td>
                                <td>{{ $jadwal_pelatihan->temaPelatihan->name }}</td>
                                <td>{{ $jadwal_pelatihan->lokasi_pelatihan }}</td>
                                <td>{{ changeDate($jadwal_pelatihan->waktu_pelatihan).' ('.($jadwal_pelatihan->jam_mulai.' - '.$jadwal_pelatihan->jam_berakhir.' WITA)') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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