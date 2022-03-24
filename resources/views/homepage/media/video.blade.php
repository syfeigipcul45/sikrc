@extends('homepage.layouts.app')

@section('title')
Media Video
@endsection

@section('extra-css')
<style>
    .thumb {
        /* margin-bottom: 15px; */
        position: relative;
        float: left;
        overflow: hidden;
        /* min-width: auto; */
        /* max-width: 310px; */
        width: 100%;
        text-align: center;
        box-shadow: 0 0 5px(rgba 0, 0, 0, 0.15);
    }

    .thumb:last-child {
        margin-bottom: 0;
    }

    /* CSS Image Hover Effects: https://www.nxworld.net/tips/css-image-hover-effects.html */
    .thumb figure {
        max-width: 100%;
        vertical-align: top;
        /* height: 300px; */
    }

    .thumb i {
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        font-size: 34px;
        color: #000;
        width: 60px;
        height: 60px;
        line-height: 60px;
        background: #ffc125;
    }

    .thumb i {
        transform: translate(-50%, -50%) scale(0);
        transition: transform 300ms 0ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .thumb:hover i {
        transform: translate(-50%, -50%) scale(1);
        transition: transform 300ms 100ms cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-text {
        border-bottom: .10rem solid #C7C7C5;
        color: #AAA7A0;
        font-size: .8rem;
        padding-bottom: 2.5rem;
        margin: 0 auto 2.4rem;
        max-width: 17rem;
    }
</style>
@endsection

@section('content')

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= getOption()->getFirstMediaUrl('banner', 'cover') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Media</a></li>
                    <li class="breadcrumb-item" aria-current="page">Galeri Video</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Galeri Video</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-lg-4 col-md-6 col-xs-6 thumb">
                        <figure>
                            {!! convertYoutubeHomepage($video->link_media) !!}
                            <span class="card-text">{{ $video->caption }}</span>
                        </figure>
                    </div>
                    @endforeach

                    <div class="col-12 my-5">
                        <div class="d-flex justify-content-center">
                            {{ $videos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div> <!-- .row -->
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
@endsection