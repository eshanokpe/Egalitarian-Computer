@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- intro block -->
    <section class="intro-block">
        <div class="slider fade-slider">
            @forelse ($sliders as $slider)
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{ asset('storage/'.$slider->image) }});">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">{{ $slider->title }}</h1>
                            </div>
                            <div class="anim delay1">
                                <p>{{ $slider->content }}</p>
                            </div>
                            <div class="anim delay2">
                                <div class="btns-wrap">
                                    <a href="{{ route('courses') }}" class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                    <a href="{{ route('contact') }}" class="btn btn-white text-uppercase">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <p>No slider data available.</p>
            @endforelse
        </div>
        
        <div class="container">
            <!-- features aside -->
            <aside class="features-aside">
                <a href="#" class="col">
                    <span class="icn-wrap text-center no-shrink">
                        <img src="{{ asset('assets/images/icon01.svg')}}" width="44" height="43" alt="trophy">
                    </span>
                    <div class="description">
                        <h2 class="features-aside-heading">World’d Best Instructors</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
                <a href="#" class="col">
                    <span class="icn-wrap text-center no-shrink">
                        <img src="{{ asset('assets/images/icon02.svg')}}" width="43" height="39" alt="computer">
                    </span>
                    <div class="description">
                        <h2 class="features-aside-heading">Learn Courses Onlines</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
                <a href="#" class="col">
                    <span class="icn-wrap text-center no-shrink">
                        <img src="{{ asset('assets/images/icon03.svg')}}" width="43" height="39" alt="computer">
                    </span>
                    <div class="description">
                        <h2 class="features-aside-heading">Online Library &amp; Store</h2>
                        <span class="view-more element-block text-uppercase">view more</span>
                    </div>
                </a>
            </aside>
        </div>
    </section>
    <!-- popular posts block -->
    <section class="popular-posts-block container">
        <header class="popular-posts-head">
            <h2 class="popular-head-heading">Most Popular Courses</h2>
        </header>
        <div class="row">
            <!-- popular posts slider -->
            <div class="slider popular-posts-slider">
                @forelse ($courses as $course)
                    <div>
                        <div class="col-xs-12">
                            <!-- popular post -->
                            <article class="popular-post">
                                <div class="aligncenter">
                                    <img style="max-height: 100%; max-width:100%; object-fit:cover; height:200px" 
                                         src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/images/courses/default.jpg') }}" 
                                         alt="{{ $course->title }}">
                                </div>
                                <div>
                                    <strong class="bg-primary text-white font-lato text-uppercase price-tag">
                                        ${{ number_format($course->price, 2) }}
                                    </strong>
                                </div>
                                <h3 class="post-heading">
                                    <a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                                </h3>
                              
                                <footer class="post-foot gutter-reset">
                                    <ul class="list-unstyled post-statuses-list">
                                        <li>
                                            <a href="{{ route('courses.show', $course->slug) }}">
                                                <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                                <strong class="text fw-normal">{{ $course->enrollments_count ?? 0 }}</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                                <strong class="text fw-normal">{{ $course->reviews_count ?? 0 }}</strong>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="star-rating list-unstyled">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li>
                                                @if ($i <= floor($course->average_rating ?? 0))
                                                    <span class="fas fa-star"><span class="sr-only">star</span></span>
                                                @elseif ($i == ceil($course->average_rating ?? 0) && ($course->average_rating ?? 0) - floor($course->average_rating ?? 0) > 0)
                                                    <span class="fas fa-star-half-alt"><span class="sr-only">star</span></span>
                                                @else
                                                    <span class="far fa-star"><span class="sr-only">star</span></span>
                                                @endif
                                            </li>
                                        @endfor
                                    </ul>
                                </footer>
                            </article>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>No popular courses found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- counter aside -->
    <aside class="bg-cover counter-aside" style="background-image: url({{ asset('assets/images/img10.jpg')}});">
        <div class="container align-wrap">
            <div class="align">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col">
                        <h2 class="counter-aside-heading">
                            <strong class="counter countdown element-block">150</strong>
                            <strong class="text element-block">COUNTRIES REACHED</strong>
                        </h2>
                    </div>
                    <div class="col-xs-12 col-sm-3 col">
                        <h2 class="counter-aside-heading">
                            <strong class="counter countdown element-block">28000</strong>
                            <strong class="text element-block">PASSED GRADUATES</strong>
                        </h2>
                    </div>
                    <div class="col-xs-12 col-sm-3 col">
                        <h2 class="counter-aside-heading">
                            <strong class="counter countdown element-block">750</strong>
                            <strong class="text element-block">QUALIFIED STAFF</strong>
                        </h2>
                    </div>
                    <div class="col-xs-12 col-sm-3 col">
                        <h2 class="counter-aside-heading">
                            <strong class="counter countdown element-block">1200</strong>
                            <strong class="text element-block">COURSES PUBLISHED</strong>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </aside>
  
    <!-- categories aside -->
    <aside class="bg-cover categories-aside text-center" style="background-image: url({{ asset('assets/images/img14.jpg')}});">
        <div class="container holder">
            <!-- categories list -->
            <ul class="list-unstyled categories-list">
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon04.svg')}}" width="43" height="43" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Business</strong>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon05.svg')}}" width="44" height="48" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Language</strong>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon06.svg')}}" width="51" height="42" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Programming</strong>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon07.svg')}}" width="51" height="42" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Film &amp; Video</strong>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon08.svg')}}" width="51" height="39" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Photography</strong>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="align">
                            <span class="icn-wrap">
                                <img src="{{ asset('assets/images/icon09.svg')}}" width="51" height="51" alt="image description">
                            </span>
                            <strong class="h h5 element-block text-uppercase">Web Design</strong>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
   
    <!-- testimonials block -->
   @include('home.testimonial')

   
    <!-- subscription aside block -->
    <aside class="subscription-aside-block bg-theme text-white">
        <!-- newsletter sub form -->
        <form action="#" class="container newsletter-sub-form">
            <div class="row form-holder">
                <div class="col-xs-12 col-sm-6 col">
                    <div class="text-wrap">
                        <span class="element-block icn no-shrink rounded-circle"><i class="far fa-envelope-open"><span class="sr-only">icn</span></i></span>
                        <div class="inner-wrap">
                            <label for="email">Signup for Newsletter</label>
                            <p>Subscribe now and receive weekly newsletter with new updates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col">
                    <div class="input-group">
                        <input type="email" id="email" class="form-control" placeholder="Enter your email&hellip;">
                        <span class="input-group-btn">
                            <button class="btn btn-dark text-uppercase" type="button">Submit</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </aside>
</main>
@endsection
