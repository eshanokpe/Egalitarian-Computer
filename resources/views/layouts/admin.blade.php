<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from omah.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 10:44:52 GMT -->

<head>
    <!-- Title -->
    <title>{{$contactUs->company_name ?? "Admin Egaliterian Computer" }}</title>

    <!-- Meta -->
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
     <!-- Favicon icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logoo.png')}}">
    

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta property="og:title" content="{{ asset($contactUs->company_name ?? 'Egaliterian Computer') }}">
    <meta property="og:description" content="">
    <meta name="format-detection" content="telephone=no">
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Vectormap -->
    <link href="{{ asset ('backend/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/css/style.css')}}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset ('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/datatables/responsive/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/dropzone/dist/dropzone.css')}}" rel="stylesheet">
    <link href="{{ asset ('backend/vendor/nestable2/css/jquery.nestable.min.css')}}" rel="stylesheet">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     
</head>

<body>

    @include('admin/partials.navbar');
    @include('admin/partials.sidebar');

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <main>
        @yield('content')
    </main>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    
    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="https://morgansconsortium.com/"
                    target="_blank"> The Morgans</a> <span id="currentYear"></span> </p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset ('backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/chartjs/chart.bundle.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/owl-carousel/owl.carousel.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset ('backend/vendor/apexchart/apexchart.js')}}"></script>
    <!-- Vectormap --> 
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset ('backend/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset ('backend/vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset ('backend/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{ asset ('backend/js/custom.min.js')}}"></script>
    <script src="{{ asset ('backend/js/deznav-init.js')}}"></script>
    <!-- ckeditor -->
    {{-- <script src="{{ asset ('backend/vendor/ckeditor/ckeditor.js')}}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    
    <!-- Datatable --> 
    <script src="{{ asset ('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset ('backend/vendor/datatables/responsive/responsive.js')}}"></script>
    <script src="{{ asset ('backend/vendor/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{ asset ('backend/vendor/dropzone/dist/dropzone.js')}}"></script>
    <script src="{{ asset ('backend/vendor/nestable2/js/jquery.nestable.min.js')}}"></script>
    <script src="{{ asset ('backend/vendor/global/global.min.js')}}"></script>
    <!-- Dashboard 1 -->
    <script>
        // JavaScript to automatically update the current year
        document.getElementById("currentYear").textContent = new Date().getFullYear();
      </script>
    <script>
        function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:0,
				nav:true,
				dots: false,
				navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					
					480:{
						items:1
					},			
					
					767:{
						items:1
					},
					1000:{
						items:1
					}
				}
			})		
			/*Custom Navigation work*/
			jQuery('#next-slide').on('click', function(){
			   $('.testimonial-one').trigger('next.owl.carousel');
			});

			jQuery('#prev-slide').on('click', function(){
			   $('.testimonial-one').trigger('prev.owl.carousel');
			});
			/*Custom Navigation work*/
		} 
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
    </script>
     <style>
        /* Increase font size of Toastr */
        #toast-container > .toast {
            font-size: 18px; /* You can change 18px to any size you want */
        }
    </style>
    <script>
        @if(session('status'))
            $(document).ready(function() {
                toastr.success("{{ session('status') }}");
            });
        @endif
        @if(session('success'))
            $(document).ready(function() {
                toastr.success("{{ session('success') }}");
            });
        @endif
    
        @if($errors->any())
            $(document).ready(function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            });
        @endif
    </script>
    

</body>

<!-- Mirrored from omah.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2024 10:46:42 GMT -->

</html>