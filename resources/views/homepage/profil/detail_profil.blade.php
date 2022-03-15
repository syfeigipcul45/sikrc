@extends('homepage.layouts.app')

@section('title')
{{ $profil->name }}
@endsection

@section('content')

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Profil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $profil->name }}</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-12">
                <article class="blog-details">
                    <h2 class="post-title h1">{{ $profil->name }}</h2>
                    <div class="post-content">
                        {!! $profil->content !!}
                    </div>
                </article> <!-- .blog-details -->
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection