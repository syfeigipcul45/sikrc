<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="copyright" content="MACode ID, https://macodeid.com/" />

    <title>@yield('title') | SI-KRC</title>

    @if(!empty(getOption()->favicon))
    <link href="{{ getOption()->favicon }}" rel="icon">
    @else
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    @endif

    <link rel="stylesheet" href="{{ asset('_homepage/assets/css/maicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('_homepage/assets/css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('_homepage/assets/vendor/owl-carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ asset('_homepage/assets/vendor/animate/animate.css') }}" />

    <link rel="stylesheet" href="{{ asset('_homepage/assets/css/theme.css') }}" />
    
    <script src="{{ asset('_homepage/assets/js/jquery-3.5.1.min.js') }}"></script>
    <style>
        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }

        @media (max-width: 767px) {
            .dropdown:hover .dropdown-menu {
                display: none;
                margin-top: auto;
            }
        }
    </style>
    @yield('extra-css')
</head>

<body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        @include('homepage.layouts.header')
    </header>

    @yield('content')

    <footer class="page-footer">
        @include('homepage.layouts.footer')
    </footer>


    <script src="{{ asset('_homepage/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('_homepage/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('_homepage/assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('_homepage/assets/js/theme.js') }}"></script>
    @yield('extra-js')
</body>

</html>