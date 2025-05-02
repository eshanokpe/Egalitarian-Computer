    <!-- footer area container -->
    <div class="footer-area bg-dark text-gray">
        <!-- aside -->
        <aside class="aside container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col">
                    <div class="logo">
                        <a href="home.html">
                            <img width="60" height="60" src="{{ asset('assets/images/logoo.png')}}" alt="studyLMS">
                        </a>
                    </div>
                    <p>
                        We strongly believe that a learned society is a progressive society. 
                        We also believe that everyone has a role to play in the development and advancement of the human race.
                    </p>
                    <a href="{{ route('courses') }}" class="btn btn-default text-uppercase">Start Leaning Now</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col hidden-xs">
                    <h3>Popular Courses</h3>
                    <!-- widget cources list -->
                    <ul class="widget-cources-list list-unstyled">
                        @forelse ($randomCourses as $randomCourse)
                            <li>
                                <a href="course-single.html">
                                    <div class="alignleft">
                                        <img src="{{ asset('assets/images/img22.jpg')}}" alt="image description">
                                    </div>
                                    <div class="description-wrap">
                                        <h4>Software engineering</h4>
                                        <strong class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li>No data</li>
                        @endforelse
                       
                    </ul>
                </div>
                <nav class="col-xs-12 col-sm-6 col-md-3 col">
                    <h3>Quick Links</h3>
                    <!-- fooer navigation -->
                    <ul class="fooer-navigation list-unstyled">
                        <li><a href="{{ route('courses')}}">All Courses</a></li>
                        <li><a href="{{ route('about')}}">About</a></li>
                        <li><a href="{{ route('privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms')}}">Terms of Use</a></li>
                        <li><a href="{{ route('contact')}}">Contact Us</a></li>
                    </ul>
                </nav>
                <div class="col-xs-12 col-sm-6 col-md-3 col">
                    <h3>contact us</h3>
                    {{-- <p>If you want to contact us about any issue our support available to help you 8am-7pm Monday to saturday.</p> --}}
                    <!-- ft address -->
                    <address class="ft-address">
                        <dl>
                            <dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
                            <dd>Address: 
                                {{-- <b>LAGOS, NIGERIA</b> --}}
                                No. 24, Oyekola Shopping Complex, Jakande Gate, Oke-Afa Isolo Lagos.
                            </dd>
                            <dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
                            <dd>Call: <a href="tel:+22348124411984">+234 (812) 441 1984</a></dd>
                            <dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span></dt>
                            <dd>Email: <a href="mailto:contactegalitarian@gmail.com">contactegalitarian@gmail.com</a></dd>
                        </dl>
                    </address>
                </div>
            </div>
        </aside>
        <!-- page footer -->
        <footer id="page-footer" class="font-lato">
            <div class="container">
                <div class="row holder">
                    <div class="col-xs-12 col-sm-push-6 col-sm-6">
                        <ul class="socail-networks list-unstyled">
                            <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-pull-6 col-sm-6">
                        <p><a href="#">Egaliterian Computer</a> | &copy; {{ date('Y') }} <a href="#"></a>, All rights reserved</p>
                    </div> 
                </div>
            </div>
        </footer>
    </div>
    <!-- back top of the page -->
    <span id="back-top" class="text-center fa fa-caret-up"></span>
    <!-- loader of the page -->
    <div id="loader" class="loader-holder">
        <div class="block"><img src="{{ asset('assets/images/svg/hearts.svg')}}" width="100" alt="loader"></div>
    </div>
</div>

<div class="popup-holder">
    <div id="popup1" class="lightbox-demo">
        <form action="#" class="user-log-form">
            <h2>Login Form</h2>
            <div class="form-group">
                <input type="text" class="form-control element-block" placeholder="Username or email address *">
            </div>
            <div class="form-group">
                <input type="password" class="form-control element-block" placeholder="Password *">
            </div>
            <div class="btns-wrap">
                <div class="wrap">
                    <label for="rem" class="custom-check-wrap fw-normal font-lato">
                        <input type="checkbox" id="rem" class="customFormReset">
                        <span class="fake-label element-block">Remember me</span>
                    </label>
                    <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Login</button>
                </div>
                <div class="wrap text-right">
                    <p>
                        <a href="#" class="forget-link">Lost your Password?</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <div id="popup2" class="lightbox-demo">
        <form action="#" class="user-log-form">
            <h2>Register Form</h2>
            <div class="form-group">
                <input type="email" class="form-control element-block" placeholder="Email address *">
            </div>
            <div class="form-group">
                <input type="password" class="form-control element-block" placeholder="Password *">
            </div>
            <div class="btns-wrap">
                <div class="wrap">
                    <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- include jQuery -->
<script src="{{ asset('assets/js/jquery.js')}}"></script>
<!-- include jQuery -->
<script src="{{ asset('assets/js/plugins.js')}}"></script>
<!-- include jQuery -->
<script src="{{ asset('assets/js/jquery.main.js')}}"></script>
<!-- include jQuery -->
<script type="text/javascript" src="{{ asset('assets/js/init.js')}}"></script>

{{-- https://htmlbeans.com/html/studylms/home.html --}}