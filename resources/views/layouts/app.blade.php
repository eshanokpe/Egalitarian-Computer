<!DOCTYPE html>
<html>
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8"> 
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the description -->
	<meta name="description" content="Computer Training">
	<!-- set the Keyword -->
	<meta name="keywords" content="">
	<meta name="author" content="Computer Training">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logoo.png')}}">
   
	<!-- set the page title -->
	<title>Egaliterian Computer</title>
	<!-- include google roboto font cdn link -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/plugins.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/colors.css')}}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/style.css')}}">
	<!-- include the site responsive stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">

	<!-- Add Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
</head>
<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
        @include('layouts.navbar')
		<!-- contain main informative part of the site -->
        <main class="main"> 
            @yield('content')
        </main>

        @include('layouts.footer')
		
	</div>
	
</body>
</html>