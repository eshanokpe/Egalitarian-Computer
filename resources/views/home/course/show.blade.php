@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>Course Single</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('courses') }}">Course</a></li>
                <li class="active">{{ $course->title}}</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-9">
                <!-- content h1 -->
                <h1 class="content-h1 fw-semi">{{ $course->title}}</h1>
                <!-- view header -->
             
                <div class="aligncenter content-aligncenter">
                    <img 
                    style="object-fit: cover; width: 100%; max-height: 400px;" 
                    src="{{ asset('storage/' . $course->image) }}" 
                    alt="image description">
                </div>
                
                <p>
                    {!! $course->description!!}
                </p>
                
                
            </article>
            <!-- sidebar -->
            <aside class="col-xs-12 col-md-3" id="sidebar">
                <!-- widget course select -->
                <section class="widget widget_box widget_course_select">
                    <header class="widgetHead text-center bg-theme">
                        <h3 class="text-uppercase">Take This Course</h3>
                    </header>
                    <strong class="price element-block font-lato" data-label="price:">${{ number_format($course->price, 2) }}</strong>
                    <ul class="list-unstyled font-lato">
                        <li><i class="far fa-user icn no-shrink"></i> 199 Students</li>
                        <li><i class="far fa-clock icn no-shrink"></i> Duration: 30 days</li>
                        <li><i class="fas fa-bullhorn icn no-shrink"></i> Lectures: 10</li>
                        <li><i class="far fa-play-circle icn no-shrink"></i> Video: 12 hours</li>
                        <li><i class="far fa-address-card icn no-shrink"></i> Certificate of Completion</li>
                    </ul>
                </section>
                
                
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
                <!-- widget tags -->
               
            </aside>
        </div>
    </div>
</main>
@endsection
