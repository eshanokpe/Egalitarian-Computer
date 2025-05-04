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
                <li><a href="{{ route('index') }}">Home</a></li>
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
                    @forelse ($courses as $course)
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <!-- popular post -->
                        <article class="popular-post">
                            <div class="aligncenter">
                                <img style="max-height: 100%; max-width:100%; object-fit:cover; height:200px" 
                                src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/images/courses/default.jpg') }}" 
                                alt="{{ $course->title }}">
                            </div>
                            <div>
                                <strong class="bg-success text-white font-lato text-uppercase price-tag">
                                    ${{ number_format($course->price, 2) }}
                                </strong>
                            </div>
                            <h3 class="post-heading">
                                <a href="{{ route('courses.show', $course->slug) }}">
                                    {{ Str::limit($course->title, 50) }} {{-- Limit title to 50 characters --}}
                                </a>
                            </h3>
                           
                            <footer class="post-foot gutter-reset">
                                <ul class="list-unstyled post-statuses-list">
                                    <li>
                                        <a href="#">
                                            <span class="fas icn fa-users no-shrink">
                                                <span class="sr-only">users</span></span>
                                            <strong class="text fw-normal">0</strong>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
                                            <strong class="text fw-normal">0</strong>
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
                    @empty
                        <p>No Data found </p>
                    @endforelse
                    
                 
                </div>
                <!-- Pagination -->
                <nav aria-label="Page navigation" class="text-center">
                    {{ $courses->links() }}
                </nav>
            </article>
            <!-- sidebar -->
            <aside class="col-xs-12 col-md-3" id="sidebar">
                <!-- widget search -->
                
                <!-- widget categories -->
               
                <!-- widget intro -->
              
                <!-- widget popular posts -->
                <section class="widget widget_popular_posts">
                    <h3>Popular Courses</h3>
                    <!-- widget cources list -->
                    <ul class="widget-cources-list list-unstyled">
                        @forelse ($randomCourses as $randomCourse)
                            <li>
                                <a href="{{ route('courses.show', $randomCourse->slug) }}">
                                    <div class="alignleft">
                                        <img 
                                        style="object-fit: cover; width: 100%; max-height: 200px;" 
                                        src="{{ asset('storage/' . $randomCourse->image) }}" 
                                        alt="image description">
                                    </div>
                                    <div class="description-wrap">
                                        <h4>{{ $randomCourse->title }}</h4>
                                        <strong class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li>No data</li>
                        @endforelse
                       
                    </ul>
                </section>
            </aside>
        </div>
    </div>
</main>
@endsection
