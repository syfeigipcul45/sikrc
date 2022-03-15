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
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <h2 class="section-title-underline">
                    <span>Testimoni</span>
                </h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p> -->
            </div>
        </div>
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
                    <textarea name="pesan" id="message" cols="30" rows="10" class="form-control" placeholder="Pesan" onkeyup="countChars(this);" required></textarea>
                    <p id="charNum">0 karakter</p>
                    @error('pesan')
                    <small class="form-text error-input" style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg px-5 enableOnInput" disabled="disabled">Kirim Pesan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="footer section-bg style-1" style="background-image: url('_homepage/images/semifoot.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="mb-4"><img src="{{ getOption()->logo}}" style="height: 7rem;" alt="Image" class="img-fluid"></p>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
                        <p><a href="#">Learn More</a></p> -->
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Kontak</span></h3>
                <p class="mt-3" style="color: #fff;">
                    <i class="fa fa-fw fa-phone mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->phone }}<br>
                    <i class="fa fa-fw fa-envelope mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->email }}
                </p>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Alamat</span></h3>
                <p class="mb-4" style="color: #fff;">
                    {{ getOption()->address }}
                </p>
            </div>
            <div class="col-lg-3 text-center">
                <div class="ml-auto">
                    <div class="social-wrap">
                        <a href="{{ getOption()->facebook }}" target="_blank"><span class="icon-facebook"></span></a>
                        <a href="{{ getOption()->instagram }}" target="_blank"><span class="icon-instagram"></span></a>
                        <a href="{{ getOption()->youtube }}" target="_blank"><span class="icon-youtube"></span></a>
                        <a href="mailto:{{ getOption()->email }}"><span class="icon-envelope-o"></span></a>
                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.6109269133854!2d116.18802801483687!3d-1.9059915371538598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df047a2390dca51%3A0x35c23fa9e6683461!2sKantor%20Kehutanan%20Resort%20I%20Paser!5e0!3m2!1sen!2sid!4v1629168201933!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
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
</script>
@endsection