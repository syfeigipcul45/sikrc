@extends('homepage.layouts.app')

@section('title')
Kontak
@endsection

@section('extra-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= getOption()->getFirstMediaUrl('banner', 'cover') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Kontak</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Testimoni</h1>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <form class="contact-form mt-5" action="{{ route('homepage.kontak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Nama Lengkap</label>
                    <input type="text" name="name" id="fullName" class="form-control" placeholder="Nama lengkap.." required>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Email</label>
                    <input type="text" name="email" id="emailAddress" class="form-control" placeholder="Email..">
                </div>
                <div class="col-sm-6 py-2 wow fadeInLeft">
                    <label for="emailAddress">No. Handphone (WA)</label>
                    <input type="text" name="no_hp" id="emailAddress" class="form-control" placeholder="No. Handphone (WA).." required>
                </div>
                <div class="col-sm-6 py-2 wow fadeInRight">
                    <label for="emailAddress">Pelatihan yang diikuti</label>
                    <select class="form-control" name="tema_id" required>
                        <option value="0" selected disabled>:: Pilih ::</option>
                        @foreach($tema_pelatihans as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp">
                    <label for="message">Message</label>
                    <textarea name="pesan" id="message" class="form-control" rows="8" placeholder="Pesan.." onkeyup="countChars(this);" required></textarea>
                    <p id="charNum">0 dari 250 karakter</p>
                    @error('pesan')
                    <small class="form-text error-input" style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary wow zoomIn enableOnInput" disabled="disabled">Kirim Pesan</button>
        </form>
    </div>
</div>
<div class="maps-container wow fadeInUp">
    <div id="google-maps">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.6109269133854!2d116.18802801483687!3d-1.9059915371538598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df047a2390dca51%3A0x35c23fa9e6683461!2sKantor%20Kehutanan%20Resort%20I%20Paser!5e0!3m2!1sen!2sid!4v1629168201933!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    function countChars(obj) {
        var maxLength = 250;
        var strLength = obj.value.length;

        if (strLength > maxLength) {
            document.getElementById("charNum").innerHTML = '<span style="color: red;">' + strLength + ' dari ' + maxLength + ' karakter</span>';
            $('.enableOnInput').prop('disabled', true);
        } else {
            document.getElementById("charNum").innerHTML = strLength + ' dari ' + maxLength + ' karakter';
            $('.enableOnInput').prop('disabled', false);
        }
    }

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection