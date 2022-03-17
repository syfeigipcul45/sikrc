@extends('homepage.layouts.app')

@section('title')
Detail Post
@endsection

@section('content')
<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('homepage.post.post') }}">Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details">
                    <div class="post-thumb">
                        @if($post->getFirstMediaUrl('posts', 'cover'))
                        <img src="{{ $post->getFirstMediaUrl('posts', 'cover') }}" alt="Image">
                        @else
                        @endif
                    </div>
                    <div class="post-meta">
                        <div class="post-author">
                            <span class="text-grey">By</span> <a href="#">{{ $post->usersCreated->name }}</a>
                        </div>
                        <span class="divider">|</span>
                        <div class="post-date">
                            <a href="#">{{ $post->created_at }}</a>
                        </div>
                    </div>
                    <h2 class="post-title h1">{{ $post->title }}</h2>
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </article> <!-- .blog-details -->
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Berita Lain</h3>
                        @foreach($other_posts as $other_post)
                        <div class="blog-item">
                            <a class="post-thumb" href="">
                                <img src="{{ $other_post->getFirstMediaUrl('posts', 'preview') }}" alt="">
                            </a>
                            <div class="content">
                                <h5 class="post-title"><a href="{{ route('homepage.post.detail', $other_post->slug) }}">{{ shrinkTitle($other_post->title) }}</a></h5>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> {{ $other_post->created_at }}</a>
                                    <a href="#"><span class="mai-person"></span> {{ $other_post->usersCreated->name }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection