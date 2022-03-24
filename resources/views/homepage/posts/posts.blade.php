@extends('homepage.layouts.app')

@section('title')
Berita
@endsection

@section('content')

<div class="page-banner overlay-dark bg-image" style="background-image: url(<?= getOption()->getFirstMediaUrl('banner', 'cover') ?>);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
            </nav>
            <h1 class="font-weight-normal">Berita</h1>
        </div> <!-- .container -->
    </div> <!-- .banner-section -->
</div> <!-- .page-banner -->

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @forelse($posts as $post)
                    <div class="col-sm-6 py-3">
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
                    @empty
                    <div class="text-center">Data tidak ditemukan</div>
                    @endforelse

                    <div class="col-12 my-5">
                        <div class="d-flex justify-content-center">
                            {{ $posts->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div> <!-- .row -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Search</h3>
                        <form action="{{ route('homepage.post.post') }}" class="search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Type a keyword and hit enter">
                                <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

@endsection