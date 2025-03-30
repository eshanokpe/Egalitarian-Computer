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
                    <h2 class="text-black font-w600">Reset Password</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}}</p>
                </div>
               
            </div>
            <div class="row justify-content-center"> 
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('success'))
                                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                
                                
                                <form method="POST" action="{{ route('admin.password.update') }}" enctype="multipart/form-data">
                                    @csrf
                                
                                    <div class="row">
                                        <div class="mb-3 col-md-10">
                                            <label class="form-label"> Current Password </label>
                                            <input autocomplete="off" type="password" class="form-control" placeholder=" Current Password" name="current_password" required>
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                
                                        </div>
                                        <div class="mb-3 col-md-10">
                                            <label class="form-label">New Password </label>
                                            <input autocomplete="off" type="password" class="form-control" placeholder=" New Password " name="password"  required>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                
                                        </div>
                                        <div class="mb-3 col-md-10">
                                            <label class="form-label">Confirm New Password </label>
                                            <input autocomplete="off" type="password" class="form-control" placeholder=" Confirm New Password  " name="password_confirmation"  required>
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                
                                        </div>
                                        
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

