@extends('homepage.layouts.app')

@section('title')
Kerja Sama
@endsection

@section('extra-css')
<style>
    .card-elegant {
        background-color: #FAFAFA;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .25);
        border: none;
    }

    .card-elegant .card-block {
        padding: 2rem 0 2.5rem 0;
        text-align: center;
    }

    .card-elegant .card-title {
        font-weight: normal;
        letter-spacing: .20rem;
        margin: 2.9rem 0;
        font-size: 1.2rem;
        color: #8B9185;
    }

    .card-elegant .card-title small {
        color: #999;
        display: inline-block;
        font-size: .85rem;
        font-weight: 300;
        margin-bottom: 1.5rem;
    }

    .card-elegant .card-text {
        border-bottom: .15rem solid #C7C7C5;
        color: #AAA7A0;
        font-size: .8rem;
        padding-bottom: 2.5rem;
        margin: 0 auto 2.4rem;
        max-width: 17rem;
    }

    .card-elegant .btn-link {
        color: #8B9185;
        font-size: .8rem;
        letter-spacing: .34rem;
        text-decoration: none;
    }

    .card-elegant .btn-link:hover,
    .card-elegant .btn-link:focus {
        color: #666;
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
                    <li class="breadcrumb-item"><a href="#">Promosi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kerja Sama</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Kerja Sama</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="row">
                    @foreach($kerja_sama as $item)
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <div class="card card-elegant">
                            <img class="card-img-top" src="{{ $item->getFirstMediaUrl('kerja-sama', 'thumb') }}" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h5 class="card-title text-uppercase">{{ $item->name }}</h5>
                                <div class="card-text">{!! shrinkText($item->description) !!}</div>
                                <a href="{{ route('homepage.promosi.detail_kerja_sama', $item->slug) }}" class="btn btn-link text-uppercase">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $kerja_sama->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection