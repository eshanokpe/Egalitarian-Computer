@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-">Dashboard /</li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Courses</a></li>
                
            </ol>
        </div> 
        <!-- row -->
 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-12 align-center mt-2">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <script>
                         window.setTimeout(function() {
                            var alert = document.getElementById('success-alert');
                            if (alert) {
                                alert.remove();
                            }
                        }, 3000);
                    </script>

                    <div class="card-header border-0 pb-0">
                        <div class="clearfix">
                            <h3 class="card-title">Courses List</h3>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Add Course</a>
                        </div>
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Content</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $data)
                                        <tr>
                                            <td><strong>{{ $index + 1 }}</strong></td>
                                            <td>
                                                @if($data->image)
                                                    <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}" class="img-thumbnail" style="max-width: 80px; max-height: 60px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($data->title, 30) }}</td>
                                            <td>${{ number_format($data->price, 2) }}</td>
                                            <td>{{ Str::limit(strip_tags($data->description), 50) }}</td>
                                            <td>{{ $data->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-primary btn-sm" style="margin-right: 5px;" 
                                                       href="{{ route('admin.courses.edit', encrypt($data->id)) }}">
                                                       <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin.courses.destroy', encrypt($data->id)) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Are you sure you want to delete this course?');">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No courses found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                           
                            
                        </div>
                    </div>
                </div>
            </div>
           
          
           
            
           
        </div>
    </div>
</div>
    @endsection