@extends('homepage.layouts.app')

@section('title')
Produk
@endsection

@section('extra-css')
<style>
    .card-deck {
        margin: 0 -15px;
        justify-content: center;
    }

    .card-deck .card {
        margin: 0 5px 1rem;
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

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= asset('_homepage/assets/img/bg_image_1.jpg') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Promosi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Produk</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section bg-light">
    <div class="container">
        <form action="{{ route('homepage.promosi.produk') }}" method="GET">
            <div class="row mb-4">
                <div class="d-flex col-md-5">
                    <input type="text" name="keyword" placeholder="Cari berdasarkan nama, harga ..." class="form-control shadow-none no-focus" />
                    <input type="submit" value="Cari Produk" class="btn btn-primary ml-1" />
                </div>
            </div>
        </form>
        <div class="card-deck">
            @forelse($produk as $key => $item)
            <div class="card cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                <img class="card-img-top" src="{{ $item->getFirstMediaUrl('produk', 'thumb') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('homepage.promosi.detail_produk', $item->slug) }}">{{ $item->name }}</a></h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Harga</strong>
                        </div>
                        <div class="col-md-8">
                            :&nbsp;{{ convertToRupiah($item->price) }}
                        </div>
                        <div class="col-md-4">
                            <strong>Jumlah</strong>
                        </div>
                        <div class="col-md-8">
                            :&nbsp;{{ $item->stock }}
                        </div>
                    </div>
                </div>
            </div>
            @empty
                    <div class="text-center">Data tidak ditemukan</div>
                    @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $produk->links('pagination::bootstrap-4') }}
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection