@extends('layouts.app')

@section('content')
<!-- contain main informative part of the site -->
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url({{ asset('assets/images/img23.jpg')}});">
        <div class="container holder">
            <div class="align">
                <h1>NYSC</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li class="active">NYSC</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
				<div class="row">
					<!-- content -->
					<article id="content" class="col-xs-12 col-md-12">
						
						<div class="row flex-wrap">
							
							@forelse ($nyscs as $nysc)
								<div class="col-xs-12 col-sm-6 col-lg-4">
									<!-- product module -->
									<article class="product-module">
										<div class="aligncenter">
											<a href="#">
												<img 
												 style="max-height: 100%; max-width:100%; object-fit:cover; height:200px" 
												src="{{ $nysc->image ? asset('storage/' . $nysc->image) : asset('assets/images/courses/default.jpg') }}" alt="image description"></a>
										</div>
										<h3 class="fw-semi"><a href="#"> {{ Str::limit($nysc->title, 30) }} </a></h3>
										
									</article>
								</div>
							@empty
								<p>No Data found </p>
							@endforelse
						</div>
						<nav aria-label="Page navigation">
							<!-- pagination -->
							 <!-- Pagination -->
							<nav aria-label="Page navigation" class="text-center">
								{{ $nyscs->links() }}
							</nav>
							
						</nav>
					</article>
					<!-- sidebar -->
					
				</div>
			</div>
</main>
@endsection
