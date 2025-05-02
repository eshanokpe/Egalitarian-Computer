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
                    <h2 class="text-black font-w600">Edit Course</h2>
                    <p class="mb-0">Welcome to Egaliterian Computer</p>
                </div> 
                <a href="{{route('admin.courses.index')}}" class="btn btn-primary rounded light">View Course</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Course</h4>
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
                                
                                <form method="POST" action="{{ route('admin.courses.update', encrypt($course->id)) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" value="{{ old('title', $course->title) }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Price</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" placeholder="0.00" name="price" id="price" min="0" step="0.01" value="{{ old('price', $course->price) }}" required>
                                            </div>
                                            @error('price')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Content</label>
                                        <div class="col-sm-9">
                                            <div class="">
                                                <textarea name="description" id="ckeditor" class="form-control">{{ old('description', $course->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="previewImage(event)">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            @if($course->image)
                                                <div class="mt-2">
                                                    <p>Current Image:</p>
                                                    <img src="{{ asset('storage/'.$course->image) }}" alt="Current Course Image" class="img-thumbnail" style="max-width: 200px;">
                                                </div>
                                            @endif
                                            <img id="image-preview" src="" alt="New Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Course</button>
                                            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                
                                <script>
                                    // Initialize CKEditor
                                    document.addEventListener('DOMContentLoaded', function() {
                                        CKEDITOR.replace('ckeditor');
                                        
                                    });
            
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('image-preview');
                                        
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection