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

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Produk</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Produk</span>
    </div>
</div>

<div class="site-section">
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
            @foreach($produk as $key => $item)
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
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $produk->links('pagination::bootstrap-4') }}
    </div>
</div>
</div>
@endsection