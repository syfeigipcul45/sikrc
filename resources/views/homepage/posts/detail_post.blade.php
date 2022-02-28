@extends('homepage.layouts.app')

@section('title')
Detail Post
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">{{ $post->title }}</h2>
                <p style="color: white;">{{ $post->created_at }} by {{ $post->usersCreated->name }}</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Posts</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-4">
                <p class="mb-5">
                    @if($post->getFirstMediaUrl('posts', 'cover'))
                    <img src="{{ $post->getFirstMediaUrl('posts', 'cover') }}" alt="Image" class="img-fluid">
                    @else
                    @endif
                </p>
                {!! $post->content !!}
            </div>
            <div class="col-md-4">
                @foreach($other_posts as $other_post)
                <div class="post-entry-big horizontal d-flex mb-4">
                    <a href="{{ route('homepage.post.detail', $other_post->slug) }}" class="img-link mr-4"><img src="{{ $other_post->getFirstMediaUrl('posts', 'preview') }}" alt="Image" class="img-fluid"></a>
                    <div class="post-content">
                        <div class="post-meta">
                            <span style="font-size: small;">{{ $other_post->created_at }}</span>
                        </div>
                        <h6 class="post-heading"><a href="{{ route('homepage.post.detail', $other_post->slug) }}">{{shrinkTitle($other_post->title)}}</a></h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection