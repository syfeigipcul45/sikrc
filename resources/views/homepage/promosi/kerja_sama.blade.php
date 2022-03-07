@extends('homepage.layouts.app')

@section('title')
Kerja Sama
@endsection

@section('extra-css')
<style>
    .card-elegant {
        background-color: #FAFAFA;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .25);
        border: none;
    }

    .card-elegant .card-block {
        padding: 2rem 0 2.5rem 0;
        text-align: center;
    }

    .card-elegant .card-title {
        font-weight: normal;
        letter-spacing: .20rem;
        margin: 2.9rem 0;
        font-size: 1.2rem;
        color: #8B9185;
    }

    .card-elegant .card-title small {
        color: #999;
        display: inline-block;
        font-size: .85rem;
        font-weight: 300;
        margin-bottom: 1.5rem;
    }

    .card-elegant .card-text {
        border-bottom: .15rem solid #C7C7C5;
        color: #AAA7A0;
        font-size: .8rem;
        padding-bottom: 2.5rem;
        margin: 0 auto 2.4rem;
        max-width: 17rem;
    }

    .card-elegant .btn-link {
        color: #8B9185;
        font-size: .8rem;
        letter-spacing: .34rem;
        text-decoration: none;
    }

    .card-elegant .btn-link:hover,
    .card-elegant .btn-link:focus {
        color: #666;
    }
</style>
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Kerja Sama</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Kerja Sama</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($kerja_sama as $item)
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card card-elegant">
                    <img class="card-img-top" src="{{ $item->getFirstMediaUrl('kerja-sama', 'thumb') }}" width="100%" alt="Card image cap">
                    <div class="card-block">
                        <h5 class="card-title text-uppercase">{{ $item->name }}</h5>
                        <div class="card-text">{!! shrinkText($item->description) !!}</div>
                        <a href="{{ route('homepage.promosi.detail_kerja_sama', $item->slug) }}" class="btn btn-link text-uppercase">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $kerja_sama->links('pagination::bootstrap-4') }}
    </div>
</div>
</div>
@endsection