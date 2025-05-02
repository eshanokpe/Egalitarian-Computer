@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>Teams</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">Teams</li>
            </ol>
        </div>
    </nav>
    <!-- text info block -->
    <article class="container text-info-block">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p>
                    Teams Content
                </p>

                
                
            </div>
            <div class="col-xs-12 col-sm-6">
                <img src="{{ asset('assets/images/img56.jpg')}}" class="element-block image" alt="image description">
            </div>
        </div>
    </article>
   
    <!-- aside note block -->
    <aside class="bg-theme aside-note-block text-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col">
                    <span class="icn-wrap alignleft element-block">
                        <img src="{{ asset('assets/images/icon10.png')}}" alt="image description">
                    </span>
                    <div class="descr-wrap">
                        <h3>New Student Join Every Week</h3>
                        <p><strong class="fw-semi">New courses, interesting posts, 
                            popular books and much more!</strong></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col text-right">
                    <a href="#" class="btn btn-white btn-default text-capitalize font-lato fw-normal">Apply Course Now</a>
                </div>
            </div>
        </div>
    </aside>
   
</main>
@endsection
