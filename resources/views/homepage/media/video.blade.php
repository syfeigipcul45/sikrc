@extends('homepage.layouts.app')

@section('title')
Media Video
@endsection

@section('extra-css')
<style>
    .carousel-container {
        border-radius: 30px;
        overflow: hidden;
        max-width: 800px;
        position: relative;
        box-shadow: 0 0 30px -20px #223344;
        margin: auto;
        z-index: 0;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    .mySlides img {
        display: block;
        width: 100%;
    }

    /* image gradient overlay [optional] */
    /*  .mySlides::after {
  content: "";
  position: absolute;
  inset: 0;
    background-image: linear-gradient(-45deg, rgba(110, 0, 255, .1), rgba(70, 0, 255, .2));
} */

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        width: auto;
        padding: 20px;
        color: white;
        font-weight: bold;
        font-size: 24px;
        border-radius: 0 8px 8px 0;
        background: rgba(173, 216, 230, 0.1);
        user-select: none;
    }

    .next {
        right: 0;
        border-radius: 8px 0 0 8px;
    }

    .prev:hover,
    .next:hover {
        background-color: rgba(173, 216, 230, 0.3);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        background-color: rgba(10, 10, 20, 0.1);
        backdrop-filter: blur(6px);
        border-radius: 10px;
        font-size: 20px;
        padding: 8px 12px;
        position: absolute;
        bottom: 60px;
        left: 50%;
        transform: translate(-50%);
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .number {
        color: #f2f2f2;
        font-size: 16px;
        background-color: rgba(173, 216, 230, 0.15);
        backdrop-filter: blur(6px);
        border-radius: 10px;
        padding: 8px 12px;
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .dots-container {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translate(-50%);
    }

    /* The dots/bullets/indicators */
    .dots {
        cursor: pointer;
        height: 14px;
        width: 14px;
        margin: 0 4px;
        background-color: rgba(173, 216, 230, 0.2);
        backdrop-filter: blur(2px);
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .active,
    .dots:hover {
        background-color: white;
    }

    /* transition animation */
    .animate {
        -webkit-animation-name: animate;
        -webkit-animation-duration: 1s;
        animation-name: animate;
        animation-duration: 2s;
    }

    @keyframes animate {
        from {
            transform: scale(1.1) rotateY(10deg);
        }

        to {
            transform: scale(1) rotateY(0deg);
        }
    }
</style>
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
        /* padding-bottom: 2.5rem; */
        margin: 0 auto 2.4rem;
        max-width: 17rem;
    }
</style>
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Galeri Video</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Galeri Video</span>
    </div>
</div>

<div class="site-section">
    <section class="container">
        <div class="row">
            @foreach($videos as $video)
            <div class="col-lg-4 col-md-6 col-xs-6 thumb">
                <figure>
                    {!! convertYoutubeHomepage($video->link_media) !!}
                    <span class="card-text">{{ $video->caption }}</span>
                </figure>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection

@section('extra-js')
@endsection