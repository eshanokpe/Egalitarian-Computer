@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>404 Error</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
				<li class="active">404 Error</li>
            </ol>
        </div>
    </nav>
  
   
    <section class="no-page-block container text-center">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-8">
                <h1>Page Not Found!</h1>
                <p>Sorry, We couldn't find the page you're looking for. <br class="hidden-xs">Try returning to the Homepage</p>
                
                <strong class="element-block text-large">4<span class="text-bright">0</span>4</strong>
            </div>
        </div>
    </section>
</main>
@endsection
