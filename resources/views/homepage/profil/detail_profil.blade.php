@extends('homepage.layouts.app')

@section('title')
{{ $profil->name }}
@endsection

@section('content')

<div class="section-bg style-1">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <h2 class="mb-0" style="color: white;">{{ $profil->name }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profil</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mb-4">
                {!! $profil->content !!}
            </div>

        </div>
    </div>
</div>
@endsection