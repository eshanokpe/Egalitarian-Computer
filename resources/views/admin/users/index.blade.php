@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Students</a></li>
                
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
                            <h3 class="card-title">Student List</h3>
                        </div>
                       
                    </div>

                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>DATE   </th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $data)
                                        <tr>
                                            <td><strong>{{  $index + 1 }}</strong></td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            
                                            <td>{{ $data->created_at->format('d F Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    {{-- <a class="btn btn-primary " style="margin-right: 5px;" href="{{ route('admin.users.edit',  encrypt($data->id) ) }}">Edit</a> --}}
                                                    <a class="btn btn-danger" href="{{ route('admin.users.destroy', encrypt($data->id) )  }}" onclick="return confirm('Are you sure you want to delete this User?');">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No User found.</td>
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