@extends('layouts.dashboard')


@section('content')

 
<div class="dashboard__page--wrapper">
    <!-- Dashboard sidebar .\ -->
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        
        <main class="main__content_wrapper">
            <!-- dashboard container -->
            <div class="dashboard__container dashboard__reviews--container">
                <div class="reviews__heading mb-30">
                    <h2 class="reviews__heading--title">Notification</h2>
                </div>
                
                <div class="properties__wrapper">
                    <div class="properties__table table-responsive">
                       
                        @forelse ($notifications as $notification)
                        <div class="card notification-card mb-3">
                            <div class="card-body d-flex flex-column flex-md-row">
                                <!-- Property Image -->
                                @if(!empty($notification['data']['property_image']))
                                    <div class="notification-image mb-3 mb-md-0">
                                        <img src="{{ asset($notification['data']['property_image']) }}" alt="{{ $notification['data']['property_name'] }}" class="img-fluid rounded">
                                    </div>
                                @endif
                
                                <!-- Notification Details -->
                                <div class="notification-details flex-grow-1 ms-md-3">
                                    <h3 class="card-title">{{ $notification['data']['property_name'] }}</h3>
                            
                                    <!-- Property Details -->
                                    <div class="property-details">
                                        {{-- <p><strong>Land Size:</strong> {{ $notification['data']['land_size'] }} per/sqm</p> --}}
                                        {{-- <p><strong>Total Price:</strong> ₦{{ number_format($notification['data']['total_price'], 2) }}</p> --}}
                                        @isset($notification['data']['market_value'])
                                            <p><strong>Market Value:</strong> ₦{{ number_format($notification['data']['market_value'], 2) }}</p>
                                        @endisset
                                        @isset($notification['data']['percentage_increase'])
                                            <p><strong>Increase:</strong> {{ $notification['data']['percentage_increase'] }}%</p>
                                        @endisset
                                    </div>
                
                                    <!-- Status and Date -->
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        {{-- <span class="badge status-badge {{ getStatusClass($notification['data']['status']) }}">
                                            {{ ucfirst($notification['data']['status']) }}
                                        </span> --}}
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                
                                    <!-- Action Buttons -->
                                    <div class="mt-3">
                                        @if(!empty($notification['data']['status']))
                                            @if($notification['data']['status'] === 'pending')
                                                <a href="{{ route('user.transfer.property.confirm', ['propertyMode' => $notification['data']['property_mode'], 'slug' => $notification['data']['property_slug']]) }}" class="btn btn-success btn-sm">
                                                    Confirm Property
                                                </a>
                                            @endif
                                        @endif
                                        <!-- Add more actions if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p>No notifications available</p>
                        @endforelse
                            
                    </div>
                
                    <!-- Pagination -->
                    <div class="pagination__area">
                        <nav class="pagination justify-content-center">
                            {{ $notifications->links() }}
                        </nav>
                    </div>
                </div>

                
            </div>
            <!-- dashboard container .\ -->
            
        </main>
    </div>
</div>
        
       

@endsection 
