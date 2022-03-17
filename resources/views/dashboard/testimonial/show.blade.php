@extends('dashboard.layouts.app')

@section('title')
Management Testimonial
@endsection

@section('extra-css')
<link href="{{ asset('_dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Testimonial</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>Nama Lengkap</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->name }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>Email</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->email }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>No. Handphone</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->no_hp }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>Pesan</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->pesan }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>Pelatihan yang diikuti</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->temaPelatihan->name }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <strong>Tanggal Posting</strong>
                        </div>
                        <div class="col-lg-8">
                            : {{ $testimonial->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection