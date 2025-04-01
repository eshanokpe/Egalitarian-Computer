@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- intro block -->
    <section class="intro-block">
        <div class="slider fade-slider">
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{ asset('assets/images/img01.jpg')}});">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">Education &amp; Training Organization</h1>
                            </div>
                            <div class="anim delay1">
                                <p>We offer the most complete course pakage in the country, for the research, design and development of Education.</p>
                            </div>
                            <div class="anim delay2">
                                <div class="btns-wrap">
                                    <a href="courses-list.html" class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                    <a href="contact.html" class="btn btn-white text-uppercase">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> 
            </div>
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{ asset('assets/images/courses/img02.jpg')}});">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">Education Organization</h1>
                            </div>
                            <div class="anim delay1">
                                <p>We offer the most complete course pakage in the country, for the research, design and development of Education.</p>
                            </div>
                            <div class="anim delay2">
                                <div class="btns-wrap">
                                    <a href="courses-list.html" class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                    <a href="contact.html" class="btn btn-white text-uppercase">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div>
                <!-- intro block slide -->
                <article class="intro-block-slide overlay bg-cover" style="background-image: url({{ asset('assets/images/courses/img03.jpg')}});">
                    <div class="align-wrap container">
                        <div class="align">
                            <div class="anim">
                                <h1 class="intro-block-heading">Training Organization</h1>
                            </div>
                            <div class="anim delay1">
                                <p>We offer the most complete course pakage in the country, for the research, design and development of Education.</p>
                            </div>
                            <div class="anim delay2">
                                <div class="btns-wrap">
                                    <a href="courses-list.html" class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
                                    <a href="contact.html" class="btn btn-white text-uppercase">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
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
                
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img03.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-success text-white font-lato text-uppercase price-tag">$25.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="course-single.html">UI / UX</a></h3>
                           
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">150</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">3</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="far fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/img04.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$465.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Artificial Intelligent</a></h3>
                          
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">200</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">3</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="far fa-star-half"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img05.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$260.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Data Analysis Using Python</a></h3>
                           
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">48</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">5</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img02.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$385.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Machine Learning</a></h3>
                          
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">98</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">10</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/img03.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-success text-white font-lato text-uppercase price-tag">$155.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Web Development</a></h3>
                           
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">200</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">3</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="far fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img04.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$250.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Web Development with Django</a></h3>
                           
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">200</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">3</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="far fa-star-half"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/img055.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$250.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Python Development</a></h3>
                          
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">48</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">5</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">   
                            
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/img056.png')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$385.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">Computer Vision with OpenCV</a></h3>
                          
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">48</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">5</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
                <div>
                    <div class="col-xs-12">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/img066.jpg')}}" alt="image description">
                            </div>
                            <div>
                                <strong class="bg-primary text-white font-lato text-uppercase price-tag">$385.00</strong>
                            </div>
                            <h3 class="post-heading"><a href="#">MicroSoft Office - Word, Excel, PowerPoint & Access </a></h3>
                          
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">48</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">5</strong>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="star-rating list-unstyled">
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                    <li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
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
    <section class="testimonials-block text-center bg-gray" style="background-image: url({{ asset('assets/images/bg-pattern01.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <h2>What People Say</h2>
                    <!-- testimonail slider -->
                    <div class="slick-slider slider testimonail-slider">
                        <div>
                            <!-- testimonial quote -->
                            <blockquote class="testimonial-quote font-roboto">
                                <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a bludger where he hasn't got a damper. As stands out like brass razoo heaps it'll be relo. As busy as a paddock.”</p>
                                <cite class="element-block font-lato">
                                    <span class="avatar rounded-circle element-block">
                                        <img class="rounded-circle" src="{{ asset('assets/images/img16.jpg')}}" alt="Nethor Doct -Developer">
                                    </span>
                                    <strong class="element-block h5 h">Nethor Doct -<span class="text-gray">Developer</span></strong>
                                </cite>
                            </blockquote>
                        </div>
                        <div>
                            <!-- testimonial quote -->
                            <blockquote class="testimonial-quote font-roboto">
                                <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a bludger where he hasn't got a damper. As stands out like brass razoo heaps it'll be relo. As busy as a paddock.”</p>
                                <cite class="element-block font-lato">
                                    <span class="avatar rounded-circle element-block">
                                        <img class="rounded-circle" src="{{ asset('assets/images/img16.jpg')}}" alt="Nethor Doct -Developer">
                                    </span>
                                    <strong class="element-block h5 h">Nethor Doct -<span class="text-gray">Developer</span></strong>
                                </cite>
                            </blockquote>
                        </div>
                        <div>
                            <!-- testimonial quote -->
                            <blockquote class="testimonial-quote font-roboto">
                                <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a bludger where he hasn't got a damper. As stands out like brass razoo heaps it'll be relo. As busy as a paddock.”</p>
                                <cite class="element-block font-lato">
                                    <span class="avatar rounded-circle element-block">
                                        <img class="rounded-circle" src="{{ asset('assets/images/img16.jpg')}}" alt="Nethor Doct -Developer">
                                    </span>
                                    <strong class="element-block h5 h">Nethor Doct -<span class="text-gray">Developer</span></strong>
                                </cite>
                            </blockquote>
                        </div>
                        <div>
                            <!-- testimonial quote -->
                            <blockquote class="testimonial-quote font-roboto">
                                <p>“ Trent from punchy rollie grab us a waggin school. Flat out like a bludger where he hasn't got a damper. As stands out like brass razoo heaps it'll be relo. As busy as a paddock.”</p>
                                <cite class="element-block font-lato">
                                    <span class="avatar rounded-circle element-block">
                                        <img class="rounded-circle" src="{{ asset('assets/images/img16.jpg')}}" alt="Nethor Doct -Developer">
                                    </span>
                                    <strong class="element-block h5 h">Nethor Doct -<span class="text-gray">Developer</span></strong>
                                </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news block -->
    <section class="news-block container">
        <header class="seperator-head text-center">
            <h2>Recent News</h2>
            <p>Share your work to collaboratve with our vibrant design element.</p>
        </header>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <!-- news post -->
                <article class="news-post">
                    <div class="aligncenter">
                        <a href="blog-single.html"><img src="{{ asset('assets/images/img17.jpg')}}" alt="image desciption"></a>
                    </div>
                    <h3><a href="blog-single.html">Best Educational Psd Template Launching Today</a></h3>
                    <p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
                    <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <!-- news post -->
                <article class="news-post">
                    <div class="aligncenter">
                        <a href="blog-single.html"><img src="{{ asset('assets/images/img18.jpg')}}" alt="image desciption"></a>
                    </div>
                    <h3><a href="blog-single.html">Your one stop Solution for Android Development Needs</a></h3>
                    <p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
                    <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <!-- news post -->
                <article class="news-post">
                    <div class="aligncenter">
                        <a href="blog-single.html"><img src="{{ asset('assets/images/img19.jpg')}}" alt="image desciption"></a>
                    </div>
                    <h3><a href="blog-single.html">Online Learning students council meeting 2017</a></h3>
                    <p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
                    <time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
                </article>
            </div>
        </div>
    </section>
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
