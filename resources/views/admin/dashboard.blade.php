@extends('layouts.admin')
@section('content')

<div id="main-wrapper">
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row --> 
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Dashboard</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name ?? ''}} backend</p>
                </div>
                <a href="{{ route('admin.index') }}" class="btn btn-primary rounded light">Refresh</a>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12"> 
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card bg-danger property-bx text-white">
                                <div class="card-body">
                                    <div class="media d-sm-flex d-block align-items-center">
                                        <span class="me-4 d-block mb-sm-0 mb-3"> 
                                            <svg width="120" height="120" viewBox="0 0 120 120" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <!-- User Icon 1 (Center) -->
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" fill="white"/>
                                                <!-- User Icon 2 (Left - Slightly smaller/offset) -->
                                                <path d="M6 14c-1.66 0-3 1.34-3 3v2h6v-2c0-1.66-1.34-3-3-3zm0-2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" fill="white" opacity="0.7"/>
                                                <!-- User Icon 3 (Right - Slightly smaller/offset) -->
                                                <path d="M18 14c-1.66 0-3 1.34-3 3v2h6v-2c0-1.66-1.34-3-3-3zm0-2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z" fill="white" opacity="0.7"/>
                                            </svg>
                                        </span>
                                        <div class="media-body mb-sm-0 mb-3 me-5">
                                            <h4 class="fs-22 text-white">Total Users</h4>
                                            <div class="progress mt-3 mb-2" style="height:8px;">
                                                
                                            </div>
                                            <span class="fs-13">
                                                <a href="{{ route('admin.user.index') }}" class="text-white">Click here</a>
                                            </span>

                                        </div>
                                        <span class="fs-35 font-w500">{{ $userCount ?? 0}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $courseCount ?? 0}}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Courses </p>
                                            <span class="fs-13"><a href="{{ route('admin.courses.index') }}" class="text-muted">Click here</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                       
                       
                    </div>
                </div>
                
               
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $contactMessageCount ?? 0 }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Contact </p>
                                            <span class="fs-13"><a href="#" class="text-muted">Click here</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                        
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

</div>

@endsection
