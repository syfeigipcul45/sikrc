@extends('homepage.layouts.app')

@section('title')
{{ $pengajar->name }}
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
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengajar</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

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
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection