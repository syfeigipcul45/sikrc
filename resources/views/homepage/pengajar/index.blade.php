@extends('homepage.layouts.app')

@section('title')
Pengajar
@endsection

@section('extra-css')
<style>
    .card {
        border: none;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer
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
</style>
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Pengajar</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Pengajar</span>
    </div>
</div>

<div class="site-section">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            @foreach($pengajars as $pengajar)
            <div class="col-md-4">
                <div class="card p-3 py-4">
                    <div class="text-center"> 
                        <img src="{{ $pengajar->getFirstMediaUrl('pengajars','thumb') }}" width="100" class="rounded-circle"> 
                    </div>
                    <div class="text-center mt-3"> 
                        <span class="bg-secondary p-1 px-4 rounded text-white">{{ $pengajar->name }}</span>
                        <h5 class="mt-2 mb-0"></h5> 
                        <span>{{ $pengajar->kategoriPengajar->kategori_pengajar }}</span>
                        <div class="px-4 mt-1">
                            <p class="fonts">{{ $pengajar->description }} </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $pengajars->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection