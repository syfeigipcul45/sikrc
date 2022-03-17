@extends('homepage.layouts.app')

@section('title')
Detail Produk
@endsection

@section('extra-css')
<link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css">
<style>
    .product__carousel {
        display: block;
        max-width: 700px;
        margin: 1em auto 3em;
    }

    .product__carousel a {
        display: block;
        margin-bottom: 15px;
    }

    .product__carousel .gallery-top {
        border: 1px solid #ebebeb;
        border-radius: 3px;
        margin-bottom: 5px;
    }

    .product__carousel .gallery-top .swiper-slide {
        position: relative;
        overflow: hidden;
    }

    .product__carousel .gallery-top .swiper-slide a {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .product__carousel .gallery-top .swiper-slide a img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .product__carousel .gallery-top .swiper-slide .easyzoom-flyout img {
        min-width: 100%;
        min-height: 100%;
    }

    .product__carousel .swiper-button-next.swiper-button-white,
    .product__carousel .swiper-button-prev.swiper-button-white {
        color: #ff3720;
    }

    .product__carousel .gallery-thumbs .swiper-slide {
        position: relative;
        transition: border .15s linear;
        border: 1px solid #ebebeb;
        border-radius: 3px;
        cursor: pointer;
        overflow: hidden;
        height: calc(100% - 2px);
    }

    .product__carousel .gallery-thumbs .swiper-slide.swiper-slide-thumb-active {
        border-color: #000;
    }

    .product__carousel .gallery-thumbs .swiper-slide img {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
    }

    .card-deck {
        margin: 0 -15px;
        justify-content: space-between;
    }

    .card-deck .card {
        margin: 0 0 1rem;
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
        .card-deck .card {
            -ms-flex: 0 0 48.7%;
            flex: 0 0 48.7%;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .card-deck .card {
            -ms-flex: 0 0 32%;
            flex: 0 0 32%;
        }
    }

    @media (min-width: 992px) {
        .card-deck .card {
            -ms-flex: 0 0 24%;
            flex: 0 0 24%;
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
                        <li class="breadcrumb-item"><a href="{{ route('homepage.promosi.produk') }}">Promosi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $produk->name }}</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <!-- default start -->
            <section id="default" class="padding-top0">
                <div class="row">
                    <div class="col-md-5">
                        <div class="xzoom-container">
                            <img class="xzoom" id="xzoom-default" width="400" src="{{ $produk->getFirstMediaUrl('produk', 'cover')}}" />
                            <div class="xzoom-thumbs" style="margin-top: 10px;">
                                @foreach($produk->getMedia('produk') as $image)
                                <a href="{{ $image->getUrl('cover') }}">
                                    <img class="xzoom-gallery" width="80" src="{{ $image->getUrl('cover') }}">
                                </a>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2>{{ $produk->name }}</h2>
                        <h4>Deskripsi Produk</h4>
                        <p>{!! $produk->description !!}</p>
                        <div class="row">
                            <div class="col-md-2">
                                <strong>Harga</strong>
                            </div>
                            <div class="col-md-10">
                                :&nbsp;{{ convertToRupiah($produk->price) }}
                            </div>
                            <div class="col-md-2">
                                <strong>Jumlah</strong>
                            </div>
                            <div class="col-md-10">
                                :&nbsp;{{ $produk->stock }}
                            </div>
                        </div>
                        <a href="https://wa.me/{{ convertWhatsappNumber(getOption()->whatsapp) }}?text=Saya ingin membeli {{$produk->name}}" target="_blank" class="btn btn-primary mt-5 w-25">Pesan</a>
                        <hr>
                    </div>
                </div>
            </section>
            <!-- default end -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection

@section('extra-js')
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script>
    (function($) {
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 400,
                title: true,
                tint: '#333',
                Xoffset: 15
            });
            $('.xzoom2, .xzoom-gallery2').xzoom({
                position: '#xzoom2-id',
                tint: '#ffa200'
            });
            $('.xzoom3, .xzoom-gallery3').xzoom({
                position: 'lens',
                lensShape: 'circle',
                sourceClass: 'xzoom-hidden'
            });
            $('.xzoom4, .xzoom-gallery4').xzoom({
                tint: '#006699',
                Xoffset: 15
            });
            $('.xzoom5, .xzoom-gallery5').xzoom({
                tint: '#006699',
                Xoffset: 15
            });

            //Integration with hammer.js
            var isTouchSupported = 'ontouchstart' in window;

            if (isTouchSupported) {
                //If touch device
                $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function() {
                    var xzoom = $(this).data('xzoom');
                    xzoom.eventunbind();
                });

                $('.xzoom, .xzoom2, .xzoom3').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1,
                            ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        xzoom.eventleave = function(element) {
                            element.hammer().on('tap', function(event) {
                                xzoom.closezoom();
                            });
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom4').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1,
                            ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openfancy, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openfancy() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                $.fancybox.open(xzoom.gallery().cgallery);
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom5').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1,
                            ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openmagnific, 300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openmagnific() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                var gallery = xzoom.gallery().cgallery;
                                var i, images = new Array();
                                for (i in gallery) {
                                    images[i] = {
                                        src: gallery[i]
                                    };
                                }
                                $.magnificPopup.open({
                                    items: images,
                                    type: 'image',
                                    gallery: {
                                        enabled: true
                                    }
                                });
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

            } else {
                //If not touch device

                //Integration with fancybox plugin
                $('#xzoom-fancy').bind('click', function(event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    $.fancybox.open(xzoom.gallery().cgallery, {
                        padding: 0,
                        helpers: {
                            overlay: {
                                locked: false
                            }
                        }
                    });
                    event.preventDefault();
                });

                //Integration with magnific popup plugin
                $('#xzoom-magnific').bind('click', function(event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = {
                            src: gallery[i]
                        };
                    }
                    $.magnificPopup.open({
                        items: images,
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                    event.preventDefault();
                });
            }
        });
    })(jQuery);
</script>
@endsection