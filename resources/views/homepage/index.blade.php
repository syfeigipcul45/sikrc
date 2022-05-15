@extends('homepage.layouts.app')

@section('title')
Home
@endsection

@section('extra-css')
<style>
    .card {
        margin: 0 auto;
        border: none;
    }

    .card .carousel-item {
        min-height: 190px;
    }

    .card .carousel-caption {
        padding: 0;
        right: 15px;
        left: 15px;
        top: 15px;
        color: #3d3d3d;
        border: 1px solid #ccc;
        min-height: 175px;
        padding: 15px;
    }

    .card .carousel-caption .col-sm-3 {
        display: flex;
        align-items: center;
    }

    .card .carousel-caption .col-sm-9 {
        text-align: left;
    }

    .card .carousel-control-prev,
    .card .carousel-control-next {
        color: #3d3d3d !important;
        opacity: 1 !important;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-image: none;
        color: #fff;
        font-size: 14px;
        background-color: #3bd9a5;
        height: 32px;
        line-height: 32px;
        width: 32px;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        opacity: 0.85;
    }

    .carousel-control-prev {
        left: 40%;
        top: 110%;
    }

    .carousel-control-next {
        right: 40%;
        top: 110%;
    }

    .midline {
        width: 60px;
        border-top: 1px solid #3bd9a5;
    }

    .carousel-caption h2 {
        font-size: 14px;
    }

    .carousel-caption h2 span {
        color: #cd3a54;
    }

    .card-comment {
        background-color: #F5F9F6;
    }

    @media (min-width: 320px) and (max-width: 575px) {
        .carousel-caption {
            position: relative;
        }

        .card .carousel-caption {
            left: 0;
            top: 0;
            margin-bottom: 15px;
        }

        .card .carousel-caption img {
            margin: 0 auto;
        }

        .carousel-control-prev {
            left: 35%;
            top: 105%;
        }

        .carousel-control-next {
            right: 35%;
            top: 105%;
        }

        .card .carousel-caption h3 {
            margin-top: 0;
            font-size: 16px;
            font-weight: 700;
        }
    }

    @media (min-width: 576px) and (max-width: 767px) {
        .carousel-caption {
            position: relative;
        }

        .card .carousel-caption {
            left: 0;
            top: 0;
            margin-bottom: 15px;
        }

        .card .carousel-caption img {
            margin: 0 auto;
        }

        .card .carousel-caption h3,
        .card .carousel-caption small {
            text-align: center;
        }

        .carousel-control-prev {
            left: 35%;
            top: 105%;
        }

        .carousel-control-next {
            right: 35%;
            top: 105%;
        }
    }

    @media (min-width: 767px) and (max-width: 991px) {
        .card .carousel-caption h3 {
            margin-top: 0;
            font-size: 16px;
            font-weight: 700;
        }
    }

    .carousel-text {
        position: absolute;
        right: 15%;
        bottom: 50%;
        top: 40%;
        left: 15%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
    }
</style>
@endsection

@section('content')
<div id="carouselExample" class="carousel slide w-100">
    <div class="carousel-inner" style="height: 872px;">
        @php $no=0; $active = ''; @endphp
        @foreach($hero_images as $key => $hero_image)
        @if($no === $key)
        @php $active = 'active'; @endphp
        @else
        @php $active = ''; @endphp
        @endif
        <div class="carousel-item {{ $active }}">
            <img class="d-block w-100" style="height: 872px;" src="{{ $hero_image->getFirstMediaUrl("hero-image", "cover") }}" alt="First slide">
            <div class="carousel-text d-none d-md-block">
                <div class="container text-center wow zoomIn">
                    <h1 class="display-4" style="font-weight: bold;">{{ $hero_image->title }}</h1>
                    <h4 class="subhead">{{ $hero_image->description }}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-light">

    <div class="page-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1>
                        {{ getOption()->profile_title ?? 'Selamat Datang di SI-KRC'}}
                    </h1>
                    <p class="text-grey mb-4" style="text-align: justify;">
                        {{ getOption()->profile_description ?? ''}}
                    </p>
                    <!-- <a href="about.html" class="btn btn-primary">Learn More</a> -->
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="custom-img-1">
                        {!!  convertVideoProfile(getOption()->profile_url) ?? 'Selamat Datang di SI-KRC' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .bg-light -->
</div>
<!-- .bg-light -->

<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Pengajar Kami</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach($pengajars as $pengajar)
            <div class="item">
                <div class="card-doctor">
                    <div class="header">
                        <img src="{{ $pengajar->getFirstMediaUrl('pengajars','thumb') }}" alt="" />
                    </div>
                    <div class="body">
                        <p class="text-m mb-0"> <a href="{{ route('homepage.pengajar.detail', $pengajar->id)}}">{{ $pengajar->name }}</a></p>
                        <span class="text-sm text-grey">{{ $pengajar->kategoriPengajar->kategori_pengajar }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="page-section bg-light">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Berita Terbaru</h1>
        <div class="row mt-5">
            @foreach($posts as $post)
            <div class="col-lg-4 py-2 wow zoomIn">
                <div class="card-blog">
                    <div class="header">
                        @if($post->getFirstMediaUrl('posts', 'preview'))
                        <a href="{{ route('homepage.post.detail', $post->slug) }}" class="post-thumb">
                            <img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="Image">
                        </a>
                        @else
                        <a href=""><img src="{{asset('img/placeholder.png') }}" alt="Image" class="img-fluid"></a>
                        @endif
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="{{ route('homepage.post.detail', $post->slug) }}">{{shrinkTitle($post->title)}}</a></h5>
                        <div class="site-info">
                            <div class="meta">
                                <!-- <div class="avatar-img">
                                            <img src="{{ asset('_dashboard/img/undraw_profile.svg') }}" alt="">
                                        </div> -->
                                <span class="mai-calendar"></span> {{ $post->created_at }} &nbsp;
                                <span class="mai-person"></span> {{ $post->usersCreated->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-12 text-center mt-4 wow zoomIn">
                <a href="{{ route('homepage.post.post') }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- .page-section -->


<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Pelatihan Kami</h1>

        <div class="owl-carousel wow fadeInUp" id="temaSlideshow">
            @foreach($tema_pelatihans as $tema_pelatihan)
            <div class="item">
                <div class="card-doctor">
                    <div class="header" style="height: auto;">
                        @if($tema_pelatihan->getFirstMediaUrl('tema-pelatihan', 'thumb'))
                        <a href="{{ route('homepage.pelatihan.show_materi', $tema_pelatihan->slug) }}"><img src="{{ $tema_pelatihan->getFirstMediaUrl('tema-pelatihan', 'thumb') }}" alt="Image"></a>
                        @else
                        <a href="{{ route('homepage.pelatihan.show_materi', $tema_pelatihan->slug) }}"><img src="{{asset('img/placeholder.png') }}" alt="Image"></a>
                        @endif
                    </div>
                    <div class="body">
                        <p class="text-xl mb-0">{{ $tema_pelatihan->name }}</p>
                        <span class="text-sm text-grey">{!! shrinkText($tema_pelatihan->description) !!}</span>
                        <p><a href="{{ route('homepage.pelatihan.show_materi', $tema_pelatihan->slug) }}" class="btn btn-primary rounded-0 px-4">Lihat Detail</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="page-section bg-light">
    <div class="section">
        <section class="pt-5 pb-5">
            <div class="container">
                <h1 class="text-center wow fadeInUp">Testimonial</h1>
                <h6 class="text-center wow fadeInUp"><a href="{{ route('homepage.testimoni.index') }}">Isi Testimoni</a></h6>
                <hr class="midline">
                <div class="card card-comment col-md-12 mt-2">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">
                        <div class="w-100 carousel-inner mb-5" role="listbox">
                            @php $no=0; $active = ''; @endphp
                            @foreach($testimonials as $key => $testimonial)
                            @if($no === $key)
                            @php $active = 'active'; @endphp
                            @else
                            @php $active = ''; @endphp
                            @endif
                            <div class="carousel-item {{ $active }}">
                                <div class="bg"></div>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="carousel-caption">
                                            <div class="row">
                                                <div class="col-sm-12 col-8">
                                                    <h2>{{ $testimonial->name }}</h2>
                                                    <small>{{ $testimonial->pesan }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="carousel-item">
                                <div class="bg"></div>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="carousel-caption">
                                            <div class="row">
                                                <div class="col-sm-12 col-8">
                                                    <h2>John Doe - <span>Ceo Mobile company</span></h2>
                                                    <small>Well incremented. Comes with recommended workout. I'm using it to help with bladder leakage issues that I've been experiencing since a recent vasectomy.</small>
                                                    <small class="smallest mute">- willi</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('extra-js')
<script>
    $('.carousel').carousel({
        interval: 6500
    })
</script>
@endsection