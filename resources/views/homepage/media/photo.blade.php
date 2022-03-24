@extends('homepage.layouts.app')

@section('title')
Media Foto
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

    .thumb {
        margin-bottom: 15px;
        position: relative;
        float: left;
        overflow: hidden;
        /* min-width: 220px;
        max-width: 310px; */
        width: 100%;
        text-align: center;
        box-shadow: 0 0 5px(rgba 0, 0, 0, 0.15);
    }

    .thumb:last-child {
        margin-bottom: 0;
    }

    /* CSS Image Hover Effects: https://www.nxworld.net/tips/css-image-hover-effects.html */
    .thumb figure img {
        max-width: 100%;
        vertical-align: top;
        height: 210px;
    }

    .thumb figure:hover img {
        opacity: 0.3;
        filter: grayscale(100%);
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
                    <li class="breadcrumb-item" aria-current="page">Galeri Foto</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Galeri Foto</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($photos as $photo)
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                        <a href="#" data-toggle="modal" data-target="#photoModal_{{$photo->id}}" data-id="{{$photo->id}}">
                            <figure>
                                <img class="img-fluid img-thumbnail" src="{{ $photo->getFirstMediaUrl('media-photo','cover') }}" alt="Random Image">
                                <!-- <i class="fa fa-camera"></i> -->
                            </figure>


                            <span class="card-text">{{ $photo->caption }}</span>
                        </a>
                    </div>
                    <div class="modal fade" id="photoModal_{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document" id="photo-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ getPhoto($photo->id)->caption }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 mb-4">
                                            <p>
                                                @if(getPhoto($photo->id)->getFirstMediaUrl('media-photo', 'thumb'))
                                            <div class="carousel-container">
                                                @foreach(getPhoto($photo->id)->getMedia('media-photo') as $image)
                                                <div class="mySlides animate">
                                                    <img src="{{ $image->getUrl('cover') }}" alt="slide" />
                                                </div>
                                                @endforeach
                                                <!-- Next and previous buttons -->
                                                <a class="prev" onclick="prevSlide()">&#10094;</a>
                                                <a class="next" onclick="nextSlide()">&#10095;</a>

                                                <!-- The dots/circles -->
                                                <div class="dots-container">
                                                    @php $no=1; @endphp
                                                    @foreach(getPhoto($photo->id)->getMedia('media-photo') as $image)
                                                    <span class="dots" onclick="currentSlide($no++)"></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-12 my-5">
                        <div class="d-flex justify-content-center">
                            {{ $photos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div> <!-- .row -->
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
<script>
    $(document).ready(function() {
        let url = '{{ route("homepage.media.photo_detail") }}';
        $('#photoModal').on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'get',
                url: url,
                data: {
                    id: id
                },
                success: function(data) {
                    $('#photo-data').html(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });

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