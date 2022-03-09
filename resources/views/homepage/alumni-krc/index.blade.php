@extends('homepage.layouts.app')

@section('title')
Alumni KRC
@endsection

@section('extra-css')
<style>
    .card {
        border: none;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        /* cursor: pointer */
    }

    .card:before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #ace5c0;
        transform: scaleY(1);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background-color: #51BE78;
        transform: scaleY(0);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after {
        transform: scaleY(1)
    }

    .fonts {
        font-size: 11px
    }

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

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Alumni KRC</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Alumni KRC</span>
    </div>
</div>

<div class="site-section">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-6 col-6 d-flex mb-3 p-md-2 p-1">
                <a href="https://sekolah.penggerak.kemdikbud.go.id/gurupenggerak/detil-profil?pid=327536" style="width: 100%;">
                    <div class="card bg-card">
                        <div class="img-gp-profil">
                            <img src="https://files1.simpkb.id/foto-ptk/3301/201511408941-20170712155308-321.jpeg" alt="..." class="card-img-top">
                        </div>
                        <div class="card-body text-center">
                            <div class="font-weight-bold"><span style="color: #8088A5;"> OKKI KRISHNA...</span></div>
                            <div class="small"><span style="color: #8088A5;"> SMP YOS SUDARSO...</span></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6 d-flex mb-3 p-md-2 p-1">
                <a href="https://sekolah.penggerak.kemdikbud.go.id/gurupenggerak/detil-profil?pid=327536" style="width: 100%;">
                    <div class="card bg-card">
                        <div style="height: 130px; overflow: hidden;">
                            <img src="https://files1.simpkb.id/foto-ptk/3301/201511408941-20170712155308-321.jpeg" alt="..." class="card-img-top">
                        </div>
                        <div class="card-body text-center">
                            <div class="font-weight-bold"> OKKI KRISHNA...</div>
                            <div class="small">SMP YOS SUDARSO...</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6 d-flex mb-3 p-md-2 p-1">
                <a href="https://sekolah.penggerak.kemdikbud.go.id/gurupenggerak/detil-profil?pid=327536" style="width: 100%;">
                    <div class="card bg-card">
                        <div style="height: 130px; overflow: hidden;">
                            <img src="https://files1.simpkb.id/foto-ptk/3301/201511408941-20170712155308-321.jpeg" alt="..." class="card-img-top">
                        </div>
                        <div class="card-body text-center">
                            <div class="font-weight-bold"> OKKI KRISHNA...</div>
                            <div class="small">SMP YOS SUDARSO...</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6 d-flex mb-3 p-md-2 p-1">
                <a href="https://sekolah.penggerak.kemdikbud.go.id/gurupenggerak/detil-profil?pid=327536" style="width: 100%;">
                    <div class="card bg-card">
                        <div style="height: 130px; overflow: hidden;">
                            <img src="https://files1.simpkb.id/foto-ptk/3301/201511408941-20170712155308-321.jpeg" alt="..." class="card-img-top">
                        </div>
                        <div class="card-body text-center">
                            <div class="font-weight-bold"> OKKI KRISHNA...</div>
                            <div class="small">SMP YOS SUDARSO...</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            
        </div>
    </div>
</div>
@endsection