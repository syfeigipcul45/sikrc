@extends('homepage.layouts.app')

@section('title')
Detail Kerja Sama
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
@endsection

@section('content')

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('homepage.promosi.kerja_sama') }}">Promosi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $kerja_sama->name }}</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details">
                    <p>
                        @if($kerja_sama->getFirstMediaUrl('kerja-sama', 'cover'))
                    <div class="carousel-container">
                        @php $no=1; @endphp
                        @foreach($kerja_sama->getMedia('kerja-sama') as $image)
                        <div class="mySlides animate">
                            <img src="{{ $image->getUrl('cover') }}" alt="slide" />
                            <div class="number">{{$no++}} / {{$total}}</div>
                        </div>
                        @endforeach
                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="prevSlide()">&#10094;</a>
                        <a class="next" onclick="nextSlide()">&#10095;</a>

                        <!-- The dots/circles -->
                        <div class="dots-container">
                            @php $no=1; @endphp
                            @foreach($kerja_sama->getMedia('kerja-sama') as $image)
                            <span class="dots" onclick="currentSlide($no++)"></span>
                            @endforeach
                        </div>
                    </div>
                    @else
                    @endif
                    </p>
                    {!! $kerja_sama->description !!}
                </article> <!-- .blog-details -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Kerja Sama Lain</h3>
                        @foreach($other_kerja_sama as $other)
                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="{{ route('homepage.promosi.detail_kerja_sama', $other->slug) }}" class="img-link mr-4">
                                <img src="{{ $other->getFirstMediaUrl('kerja_sama', 'preview') }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-content">
                                <h6 class="post-heading"><a href="{{ route('homepage.promosi.detail_kerja_sama', $other->slug) }}">{{shrinkTitle($other->name)}}</a></h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
<script>
    let slideIndex = 0;
    showSlides();

    // Next-previous control
    function nextSlide() {
        slideIndex++;
        showSlides();
        timer = _timer; // reset timer
    }

    function prevSlide() {
        slideIndex--;
        showSlides();
        timer = _timer;
    }

    // Thumbnail image controlls
    function currentSlide(n) {
        slideIndex = n - 1;
        showSlides();
        timer = _timer;
    }

    function showSlides() {
        let slides = document.querySelectorAll(".mySlides");
        let dots = document.querySelectorAll(".dots");

        if (slideIndex > slides.length - 1) slideIndex = 0;
        if (slideIndex < 0) slideIndex = slides.length - 1;

        // hide all slides
        slides.forEach((slide) => {
            slide.style.display = "none";
        });

        // show one slide base on index number
        slides[slideIndex].style.display = "block";

        dots.forEach((dot) => {
            dot.classList.remove("active");
        });

        dots[slideIndex].classList.add("active");
    }

    // autoplay slides --------
    let timer = 7; // sec
    const _timer = timer;

    // this function runs every 1 second
    setInterval(() => {
        timer--;

        if (timer < 1) {
            nextSlide();
            timer = _timer; // reset timer
        }
    }, 1000); // 1sec
</script>
@endsection