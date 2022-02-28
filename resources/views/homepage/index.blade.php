@extends('homepage.layouts.app')

@section('title')
Home
@endsection

@section('content')
<!-- Hero Images -->
<div class="hero-slide owl-carousel site-blocks-cover">
    @foreach($hero_images as $hero_image)
    <div class="intro-section" style="background-image: url('{{ $hero_image->getFirstMediaUrl("hero-image", "cover") }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    <h1>{{ $hero_image->title }}</h1>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<div></div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4 mb-5">
                <h2 class="section-title-underline mb-5">
                    <span>Why Academics Works</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="flaticon-mortarboard text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Personalize Learning</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="flaticon-school-material text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Trusted Courses</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="feature-1 border">
                    <div class="icon-wrapper bg-primary">
                        <span class="flaticon-library text-white"></span>
                    </div>
                    <div class="feature-1-content">
                        <h2>Tools for Students</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi hendrerit elit</p>
                        <p><a href="#" class="btn btn-primary px-4 rounded-0">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">


        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                    <span>Tema Pelatihan</span>
                </h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p> -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-slide-3 owl-carousel">
                    @foreach($tema_pelatihans as $tema)
                    <div class="course-1-item">
                        <figure class="thumnail">
                            @if($tema->getFirstMediaUrl('tema-pelatihan', 'thumb'))
                            <a href=""><img src="{{ $tema->getFirstMediaUrl('tema-pelatihan', 'thumb') }}" alt="Image" class="img-fluid"></a>
                            @else
                            <a href=""><img src="{{asset('img/placeholder.png') }}" alt="Image" class="img-fluid"></a>
                            @endif
                            <div class="category">
                                <h3>{{ $tema->name }}</h3>
                            </div>
                        </figure>
                        <div class="course-1-content pb-4">
                            <!-- <h2>How To Create Mobile Apps Using Ionic</h2>
                            <div class="rating text-center mb-3">
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                            </div> -->
                            <p class="desc mb-4">{!!shrinkText($tema->description)!!}</p>
                            <p><a href="" class="btn btn-primary rounded-0 px-4">Lihat Detail</a></p>
                        </div>
                    </div>
                    @endforeach

                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="{{ asset('_homepage/images/course_2.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="price">$99.00</div>
                            <div class="category">
                                <h3>Web Design</h3>
                            </div>
                        </figure>
                        <div class="course-1-content pb-4">
                            <h2>How To Create Mobile Apps Using Ionic</h2>
                            <div class="rating text-center mb-3">
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                                <span class="icon-star2 text-warning"></span>
                            </div>
                            <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                            <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </div>
</div>




<div class="section-bg style-1" style="background-image: url('{{ asset('_homepage/images/about_1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2 class="section-title-underline style-2">
                    <span>About Our University</span>
                </h2>
            </div>
            <div class="col-lg-8">
                <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem nesciunt quaerat ad reiciendis perferendis voluptate fugiat sunt fuga error totam.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus assumenda omnis tempora ullam alias amet eveniet voluptas, incidunt quasi aut officiis porro ad, expedita saepe necessitatibus rem debitis architecto dolore? Nam omnis sapiente placeat blanditiis voluptas dignissimos, itaque fugit a laudantium adipisci dolorem enim ipsum cum molestias? Quod quae molestias modi fugiat quisquam. Eligendi recusandae officiis debitis quas beatae aliquam?</p>
                <p><a href="#">Read more</a></p>
            </div>
        </div>
    </div>
</div>

<!-- // 05 - Block -->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>Testimonials</span>
                </h2>
            </div>
        </div>


        <div class="owl-slide owl-carousel">

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_1.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_2.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_4.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_3.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_2.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>&ldquo;Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!&rdquo;</p>
                </div>
            </div>

            <div class="ftco-testimonial-1">
                <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                    <img src="{{ asset('_homepage/images/person_4.jpg') }}" alt="Image" class="img-fluid mr-3">
                    <div>
                        <h3>Allison Holmes</h3>
                        <span>Designer</span>
                    </div>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, mollitia. Possimus mollitia nobis libero quidem aut tempore dolore iure maiores, perferendis, provident numquam illum nisi amet necessitatibus. A, provident aperiam!</p>
                </div>
            </div>

        </div>

    </div>
</div>


<div class="section-bg style-1" style="background-image: url('{{ asset('_homepage/images/hero_1.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-mortarboard"></span>
                <h3>Our Philosphy</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea? Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-school-material"></span>
                <h3>Academics Principle</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                    Dolore, amet reprehenderit.</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                <span class="icon flaticon-library"></span>
                <h3>Key of Success</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis delectus ea?
                    Dolore, amet reprehenderit.</p>
            </div>
        </div>
    </div>
</div>

<div class="news-updates">
    <div class="container">

        <div class="row">
            <div class="col-lg-9">
                <div class="section-heading">
                    <h2 class="text-black">News &amp; Updates</h2>
                    <a href="#">Read All News</a>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="post-entry-big">
                            <a href="{{ route('homepage.post.detail', $post->slug) }}" class="img-link"><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="mx-1">{{ $post->created_at }}</span>
                                    <!-- <span class="mx-1">/</span> -->
                                    <!-- <a href="#">Admission</a>, <a href="#">Updates</a> -->
                                </div>
                                <h3 class="post-heading"><a href="{{ route('homepage.post.detail', $post->slug) }}">{{shrinkTitle($post->title)}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @foreach($other_posts as $other_post)
                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="{{ route('homepage.post.detail', $other_post->slug) }}" class="img-link mr-4"><img src="{{ $other_post->getFirstMediaUrl('posts', 'preview') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="mx-1">{{ $other_post->created_at }}</span>
                                </div>
                                <h3 class="post-heading"><a href="{{ route('homepage.post.detail', $other_post->slug) }}">{{shrinkTitle($other_post->title)}}</a></h3>
                            </div>
                        </div>
                        @endforeach

                        <!-- <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="news-single.html" class="img-link mr-4"><img src="{{ asset('_homepage/images/blog_2.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div>

                        <div class="post-entry-big horizontal d-flex mb-4">
                            <a href="news-single.html" class="img-link mr-4"><img src="{{ asset('_homepage/images/blog_1.jpg') }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content">
                                <div class="post-meta">
                                    <a href="#">June 6, 2019</a>
                                    <span class="mx-1">/</span>
                                    <a href="#">Admission</a>, <a href="#">Updates</a>
                                </div>
                                <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning Session</a></h3>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="section-heading">
                    <h2 class="text-black">Campus Videos</h2>
                    <a href="#">View All Videos</a>
                </div>
                @foreach($videos as $video)
                <!-- <a href="https://vimeo.com/45830194" class="video-1 mb-4" data-fancybox="" data-ratio="2"> -->
                {!! convertYoutube($video->link_media) !!}
                <!-- <img src="{{ asset('_homepage/images/course_5.jpg') }}" alt="Image" class="img-fluid"> -->
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="site-section ftco-subscribe-1" style="background-image: url('{{ asset('_homepage/images/bg_1.jpg') }}')">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h2>Subscribe to us!</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>
            </div>
            <div class="col-lg-5">
                <form action="" class="d-flex">
                    <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email">
                    <button class="btn btn-primary rounded py-3 px-4" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection