@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>Courses</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Courses</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-9">
                <!-- show head -->
                
                <div class="row flex-wrap">
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img04.jpg')}}" alt="image description">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img03.jpg')}}" alt="image description">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fix:cover; height:200px" src="{{ asset('assets/images/courses/img044.jpg')}}" alt="image description">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                    <div class="col-xs-12 col-sm-6 col-lg-4">
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
                <nav aria-label="Page navigation">
                    <!-- pagination -->
                    <ul class="pagination">
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&rsaquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </article>
            <!-- sidebar -->
            <aside class="col-xs-12 col-md-3" id="sidebar">
                <!-- widget search -->
                <section class="widget widget_search">
                    <h3>Course Search</h3>
                    <!-- search form -->
                    <form action="#" class="search-form">
                        <fieldset>
                            <input placeholder=" Search&hellip;" class="form-control" name="s" type="search">
                            <button type="button" class="fas fa-search"><span class="sr-only">search</span></button>
                        </fieldset>
                    </form>
                </section>
                <!-- widget categories -->
                <section class="widget widget_categories">
                    <h3>Course Categories</h3>
                    <ul class="list-unstyled text-capitalize font-lato">
                        <li class="cat-item cat-item-1"><a href="#">Business</a></li>
                        <li class="cat-item active cat-item-2"><a href="#">Design</a></li>
                        <li class="cat-item cat-item-3"><a href="#">Programing Language</a></li>
                        <li class="cat-item cat-item-4"><a href="#">Photography</a></li>
                        <li class="cat-item cat-item-5"><a href="#">Language</a></li>
                        <li class="cat-item cat-item-6"><a href="#">Life Style</a></li>
                        <li class="cat-item cat-item-7"><a href="#">IT &amp; Software</a></li>
                    </ul>
                </section>
                <!-- widget intro -->
                <section class="widget widget_intro">
                    <h3>Course Intro</h3>
                    <div class="aligncenter overlay">
                        <a href="http://www.youtube.com/embed/9bZkp7q19f0?autoplay=1" class="btn-play far fa-play-circle lightbox fancybox.iframe"></a>
                        <img src="{{ asset('assets/images/img32.jpg')}}" alt="image description">
                    </div>
                </section>
                <!-- widget popular posts -->
                <section class="widget widget_popular_posts">
                    <h3>Popular Courses</h3>
                    <!-- widget cources list -->
                    <ul class="widget-cources-list list-unstyled">
                        <li>
                            <a href="course-single.html">
                                <div class="alignleft large">
                                    <img src="{{ asset('assets/images/img33.jpg')}}" alt="image description">
                                </div>
                                <div class="description-wrap">
                                    <h4>Introduction to Mobile Apps Development</h4>
                                    <strong class="price text-primary element-block font-lato text-uppercase">$99.00</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="course-single.html">
                                <div class="alignleft large">
                                    <img src="{{ asset('assets/images/img33.jpg')}}" alt="image description">
                                </div>
                                <div class="description-wrap">
                                    <h4>Become a Professional Film Maker</h4>
                                    <strong class="price text-success element-block font-lato text-uppercase">Free</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="course-single.html">
                                <div class="alignleft large">
                                    <img src="{{ asset('assets/images/img33.jpg')}}" alt="image description">
                                </div>
                                <div class="description-wrap">
                                    <h4>Swift Programming For Beginners</h4>
                                    <strong class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
                                </div>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</main>
@endsection
