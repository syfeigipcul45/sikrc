@extends('homepage.layouts.app')

@section('title')
Kontak
@endsection

@section('extra-css')

@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Kontak</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Kontak</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('homepage.kontak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Nama Lengkap</label>
                    <input type="text" name="name" id="fname" class="form-control form-control-lg" placeholder="Nama Lengkap" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Subjek</label>
                    <input type="text" name="subjek" id="lname" class="form-control form-control-lg" placeholder="Subjek" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="eaddress">Email</label>
                    <input type="text" name="email" id="eaddress" class="form-control form-control-lg" placeholder="Email" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tel">No. Handphone (WA)</label>
                    <input type="text" name="no_hp" id="tel" class="form-control form-control-lg" placeholder="No. Handphone (WA)" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Pesan</label>
                    <textarea name="pesan" id="message" cols="30" rows="10" class="form-control" placeholder="Pesan" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Kirim Pesan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection