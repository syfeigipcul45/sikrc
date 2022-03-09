@extends('homepage.layouts.app')

@section('title')
Detail Pengajar
@endsection

@section('extra-css')
<style>
    .img-gp-profil {
        background-color: rgb(197, 197, 197);
        width: 175px;
        height: 175px;
        border-radius: 50%;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
    }

    .img-gp-profil img {
        width: 100%;
    }
</style>
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">{{ $pengajar->name }}</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Pengajar</span>
    </div>
</div>

<div class="site-section">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 py-4">
                <div class="img-gp-profil mb-3">
                    <img src="{{ $pengajar->getFirstMediaUrl('pengajars','thumb') }}" alt="">
                </div>
                <div class="profil-sosmed text-center my-4"><a href="#"><span class="badge badge-pill badge-primary px-3 py-2 mb-2">{{ $pengajar->kategoriPengajar->kategori_pengajar }}</span></a>
                    <h2 class="font-weight-bold">{{ $pengajar->name }}</h2>
                </div>
                <div class="text-justify">
                    <p>
                        {{ $pengajar->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection