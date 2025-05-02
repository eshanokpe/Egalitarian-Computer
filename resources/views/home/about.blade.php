@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>About</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Home</a></li>
                <li class="active">About us</li>
            </ol>
        </div>
    </nav>
    <!-- text info block -->
    <article class="container text-info-block">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p>
                    We strongly believe that a learned society is a progressive society. 
                    We also believe that everyone has a role to play in the development and advancement of the human race. This is why we have taken up the burden to educate and teach the next generation of skilled entrepreneurs and job seekers.
                    We know that we are transforming lives one person at a time regardless of background, colour, history, and cultural descent. We are committed to raising a generation of confident and skilled problem solvers.
                </p>

                <h1>Our Story</h1>
                <p>
                    Tech E also known as Tech Egalitarian is a subsidiary of Egalitarian Computers. It was founded by Micheal Nnadi, and Edwin Osamezu with the objective of providing life-changing learning experiences to learners in Africa and beyond. Today, Tech E is a global online learning network that gives anyone, anywhere in the world, access to both online and offline courses and degrees. Tech E has a responsibility to create a positive impact on the society as we aim to reduce barriers to democratising technology education for all.
                </p>
                
            </div>
            <div class="col-xs-12 col-sm-6">
                <img src="{{ asset('assets/images/img56.jpg')}}" class="element-block image" alt="image description">
            </div>
        </div>
    </article>
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
    <!-- why lms block -->
    <article class="why-lms-block container">
        <div class="row">
            <div class="col-xs-12 col-md-6 col">
                <h2 class="sep-heading text-capitalize">Happy Students Say</h2>
                <!-- why say slider -->
                <div class="slider why-say-slider">
                    <div>
                        <!-- say quote -->
                        <blockquote class="say-quote">
                            <q class="element-block">&ldquo; The labour movement had the best opportunity in 50 years to transform not merely an industrial situation and win an impor tant battle for workers in struggle, but an opportunity to change the government of the day. &rdquo;</q>
                            <cite>
                                <span class="alignleft rounded-circle no-shrink">
                                    <img class="rounded-circle" src="{{ asset('assets/images/img57.jpg')}}" alt="Gregory Benford Developer">
                                </span>
                                <span class="description-wrap">
                                    <strong class="element-block author-title text-capitalize font-roboto fw-normal">Gregory Benford</strong>
                                    <strong class="element-block author-subtitle font-lato fw-normal text-capitalize">Developer</strong>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                    <div>
                        <!-- say quote -->
                        <blockquote class="say-quote">
                            <q class="element-block">&ldquo; The labour movement had the best opportunity in 50 years to transform not merely an industrial situation and win an impor tant battle for workers in struggle, but an opportunity to change the government of the day. &rdquo;</q>
                            <cite>
                                <span class="alignleft rounded-circle no-shrink">
                                    <img class="rounded-circle" src="{{ asset('assets/images/img57.jpg')}}" alt="Gregory Benford Developer">
                                </span>
                                <span class="description-wrap">
                                    <strong class="element-block author-title text-capitalize font-roboto fw-normal">Gregory Benford</strong>
                                    <strong class="element-block author-subtitle font-lato fw-normal text-capitalize">Developer</strong>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                    <div>
                        <!-- say quote -->
                        <blockquote class="say-quote">
                            <q class="element-block">&ldquo; The labour movement had the best opportunity in 50 years to transform not merely an industrial situation and win an impor tant battle for workers in struggle, but an opportunity to change the government of the day. &rdquo;</q>
                            <cite>
                                <span class="alignleft rounded-circle no-shrink">
                                    <img class="rounded-circle" src="{{ asset('assets/images/img57.jpg')}}" alt="Gregory Benford Developer">
                                </span>
                                <span class="description-wrap">
                                    <strong class="element-block author-title text-capitalize font-roboto fw-normal">Gregory Benford</strong>
                                    <strong class="element-block author-subtitle font-lato fw-normal text-capitalize">Developer</strong>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                    <div>
                        <!-- say quote -->
                        <blockquote class="say-quote">
                            <q class="element-block">&ldquo; The labour movement had the best opportunity in 50 years to transform not merely an industrial situation and win an impor tant battle for workers in struggle, but an opportunity to change the government of the day. &rdquo;</q>
                            <cite>
                                <span class="alignleft rounded-circle no-shrink">
                                    <img class="rounded-circle" src="{{ asset('assets/images/img57.jpg')}}" alt="Gregory Benford Developer">
                                </span>
                                <span class="description-wrap">
                                    <strong class="element-block author-title text-capitalize font-roboto fw-normal">Gregory Benford</strong>
                                    <strong class="element-block author-subtitle font-lato fw-normal text-capitalize">Developer</strong>
                                </span>
                            </cite>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col">
                <h2 class="sep-heading">Why Egalitarian Best?</h2>
                <!-- why panel group accrdion -->
                <div class="panel-group why-panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title fw-normal">
                                <a class="accOpener element-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Learn anything online</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <p>Areas tackled the most fundamental parts of medical research include cellular way and molecular biology medical genetics immunology neu science and psychology</p>
                            </div>
                        </div>
                    </div>
                    <!-- panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title fw-normal">
                                <a class="accOpener element-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Basic to advance course</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Areas tackled the most fundamental parts of medical research include cellular way and molecular biology medical genetics immunology neu science and psychology</p>
                            </div>
                        </div>
                    </div>
                    <!-- panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title fw-normal">
                                <a class="accOpener element-block" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Learn anything online</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>Areas tackled the most fundamental parts of medical research include cellular way and molecular biology medical genetics immunology neu science and psychology</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <p><strong class="fw-semi">New courses, interesting posts, popular books and much more!</strong></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col text-right">
                    <a href="#" class="btn btn-white btn-default text-capitalize font-lato fw-normal">Apply Course Now</a>
                </div>
            </div>
        </div>
    </aside>
    <!-- professionals block -->
    <section class="container professionals-block">
        <header class="seperator-head text-center">
            <h2>Meet the Team</h2>
        </header>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <!-- pro column -->
                <article class="pro-column over text-center">
                    <div class="aligncenter">
                        <a href="instructor-single.html">
                            <img src="{{ asset('assets/images/img58.png')}}" alt=" Michael Nnadi">
                        </a>
                        <div class="caption">
                            <ul class="socail-networks list-unstyled">
                                <li><a href="#" class="facebook"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#" class="twitter"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#" class="google"><span class="fab fa-google-plus-g"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="fw-normal text-capitalize">
                        Michael Nnadi
                    </h3>
                    <h4 class="fw-normal text-capitalize"> Co-Founder</h4>
                    <p>
                        Michael Nnadi is a serial entrepreneur, investor, and co-founder of Egalitarian Computers, the parent company of Tech_E. 
                    </p>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <!-- pro column -->
                <article class="pro-column over text-center">
                    <div class="aligncenter">
                        <a href="instructor-single.html"><img src="{{ asset('assets/images/img59.png')}}" alt="Edwin Osamezu"></a>
                        <div class="caption">
                            <ul class="socail-networks list-unstyled">
                                <li><a href="#" class="facebook"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#" class="twitter"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#" class="google"><span class="fab fa-google-plus-g"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="fw-normal text-capitalize">
                        Edwin Osamezu
                    </h3>
                    <h4 class="fw-normal text-capitalize">Tech Enthisiast</h4>
                    <p>
                        Edwin Osamezu is a tech enthusiast and instructor with decades worth of experience. He has facilitated training and workshops for over ...
                    </p>
                </article>
            </div>
            
        </div>
    </section>
</main>
@endsection
