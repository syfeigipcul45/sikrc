<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | SI-KRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if(!empty(getOption()->favicon))
    <link href="{{ getOption()->favicon }}" rel="icon">
    @else
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    @endif

    <link href="{{ asset('_dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_homepage/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('_homepage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_homepage/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('_homepage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_homepage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('_homepage/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('_homepage/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('_homepage/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('_homepage/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('_homepage/css/aos.css') }}">
    <link href="{{ asset('_homepage/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('_homepage/css/style.css') }}">
    <script src="{{ asset('_homepage/js/jquery-3.3.1.min.js') }}"></script>
    <style>
        .container-menu {
            max-width: fit-content;
        }

        .footer-down {
            padding: 2rem 0;
            background: #183661;
            font-size: 14px;
            color: #fff;
        }
    </style>

    @yield('extra-css')

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <!-- <div class="py-2 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 d-none d-lg-block">
                        <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
                        <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
                        <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a>
                    </div>
                    <div class="col-lg-3 text-right">
                        <a href="login.html" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
                        <a href="register.html" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>
                    </div>
                </div>
            </div>
        </div> -->
        <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

            @include('homepage.layouts.header')

        </header>

        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <p class="mb-4"><img src="{{ getOption()->logo}}" style="height: 7rem;" alt="Image" class="img-fluid"></p>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
                        <p><a href="#">Learn More</a></p> -->
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Kontak</span></h3>
                        <p class="mt-3"><i class="fa fa-fw fa-phone mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->phone }}<br>
                            <i class="fa fa-fw fa-envelope mr-1 text-primary" aria-hidden="true"></i> {{ getOption()->email }}
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="footer-heading"><span>Alamat</span></h3>
                        <p class="mb-4">
                            {{ getOption()->address }}
                        </p>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="ml-auto">
                            <div class="social-wrap">
                                <a href="{{ getOption()->facebook }}" target="_blank"><span class="icon-facebook"></span></a>
                                <a href="{{ getOption()->instagram }}" target="_blank"><span class="icon-instagram"></span></a>
                                <a href="{{ getOption()->youtube }}" target="_blank"><span class="icon-youtube"></span></a>
                                <a href="mailto:{{ getOption()->email }}"><span class="icon-envelope-o"></span></a>
                                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-down">
            @include('homepage.layouts.footer')
        </div>


    </div>
    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78" />
        </svg>
    </div>


    <script src="{{ asset('_homepage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('_homepage/js/popper.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('_homepage/js/aos.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('_homepage/js/jquery.mb.YTPlayer.min.js') }}"></script>




    <script src="{{ asset('_homepage/js/main.js') }}"></script>

    @yield('extra-js')

</body>

</html>