@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>Contact</h1>
            </div>
        </div> 
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </nav>
    <!-- contact block -->
    <section class="contact-block">
        <div class="container">
            <header class="seperator-head text-center">
                <h2>Contact Details</h2>
                <p>Welcome to our Website. We are glad to have you around.</p>
            </header>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <!-- detail column -->
                    <div class="detail-column">
                        <span class="icn-wrap no-shrink element-block">
                            <img src="{{ asset('assets/images/icon11.png')}}" alt="icon">
                        </span>
                        <div class="descr-wrap">
                            <h3 class="text-uppercase">give us a call</h3>
                            <p><a href="tel:+2348124411984">+234 (812) 441 1984</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <!-- detail column -->
                    <div class="detail-column">
                        <span class="icn-wrap no-shrink element-block">
                            <img src="{{ asset('assets/images/icon12.png')}}" alt="icon">
                        </span>
                        <div class="descr-wrap">
                            <h3 class="text-uppercase">send us a message</h3>
                            <p><a href="mailto:contactegalitarian@gmail.com"></a>contactegalitarian@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <!-- detail column -->
                    <div class="detail-column">
                        <span class="icn-wrap no-shrink element-block">
                            <img src="{{ asset('assets/images/icon13.png')}}" alt="icon">
                        </span>
                        <div class="descr-wrap">
                            <h3 class="text-uppercase">visit our location</h3>
                            <p><b>LAGOS, NIGERIA</b></p>
                            <p>No. 24, Oyekola Shopping Complex, Jakande Gate, Oke-Afa Isolo Lagos.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="sep-or element-block" data-text="or">
            <!-- contact form -->
            <form action="#" class="contact-form">
                <h3 class="text-center">Drop Us a Message</h3>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control element-block" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <input type="email" class="form-control element-block" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <textarea class="form-control element-block" placeholder="Message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold">send message</button>
                </div>
            </form>
        </div>
        <!-- mapHolder -->
        <div class="mapHolder">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3963.922456530144!2d3.305914309276729!3d6.531477723045969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sNo.%2024%2C%20Oyekola%20Shopping%20Complex%2C%20Jakande%20Gate%2C%20Oke-Afa%20Isolo%20Lagos.!5e0!3m2!1sen!2sng!4v1742021371383!5m2!1sen!2sng" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            <span class="mapMarker">
                <img src="{{ asset('assets/images/map-marker.png')}}" alt="marker">
            </span>
        </div>
        <!-- btn aside block -->
        <aside class="btn-aside-block container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col">
                    <h3>Have Any Questions?</h3>
                    <p>Various versions years, sometimes by accident, sometimes on purpose</p>
                </div>
                <div class="col-xs-12 col-sm-4 text-right col">
                    <a href="#" class="btn btn-warning btn-theme text-capitalize font-lato fw-normal">Ask Question Now</a>
                </div>
            </div>
        </aside>
    </section>
</main>
@endsection
