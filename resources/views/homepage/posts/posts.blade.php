@extends('homepage.layouts.app')

@section('title')
Berita
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">Berita</h2>
                <p style="color: white;"></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Berita</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-1-item">
                    <figure class="thumnail">
                        @if($post->getFirstMediaUrl('posts', 'preview'))
                        <a href="{{ route('homepage.post.detail', $post->slug) }}"><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="Image" class="img-fluid"></a>
                        @else
                        <a href=""><img src="{{asset('img/placeholder.png') }}" alt="Image" class="img-fluid"></a>
                        @endif
                        <div class="category">
                            <h3>{{shrinkTitle($post->title)}}</h3>
                        </div>
                    </figure>
                    <div class="course-1-content pb-4">
                        <p class="desc mb-4">{!!shrinkText($post->content)!!}</p>
                        <p><a href="{{ route('homepage.post.detail', $post->slug) }}" class="btn btn-primary rounded-0 px-4">Lihat Detail</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection