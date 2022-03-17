@extends('homepage.layouts.app')

@section('title')
Pengajar
@endsection

@section('extra-css')
<style>
    .card {
        border: none;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        /* cursor: pointer */
    }

    .card:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #ace5c0;
        transform: scaleY(1);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #51BE78;
        transform: scaleY(0);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after {
        transform: scaleY(1)
    }

    .fonts {
        font-size: 11px
    }

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

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= asset('_homepage/assets/img/bg_image_1.jpg') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengajar</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Tenaga Pengajar</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="row d-flex justify-content-center">
                    @foreach($pengajars as $pengajar)
                    <div class="col-md-4">
                        <div class="card p-3 py-4">
                            <div class="img-gp-profil mb-3">
                                <img src="{{ $pengajar->getFirstMediaUrl('pengajars','thumb') }}" alt="">
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('homepage.pengajar.detail', $pengajar->id)}}"><span class="bg-secondary p-1 px-4 rounded text-white">{{ $pengajar->name }}</span></a>
                                <h5 class="mt-2 mb-0"></h5>
                                <span>{{ $pengajar->kategoriPengajar->kategori_pengajar }}</span>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $pengajars->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection