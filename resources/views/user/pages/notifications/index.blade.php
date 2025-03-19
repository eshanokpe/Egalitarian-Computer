@extends('layouts.dashboard')

@section('content')

<div class="dashboard__page--wrapper">
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        
        <main class="main__content_wrapper">
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
                                {{-- @if(!empty($notification['data']['property_image']))
                                    <div class="notification-image mb-3 mb-md-0">
                                        <img src="{{ asset($notification['data']['property_image']) }}" alt="{{ $notification['data']['property_name'] }}" class="img-fluid rounded">
                                    </div>
                                @endif --}}
                
                                <!-- Notification Details -->
                                <div class="notification-details flex-grow-1 ms-md-3">
                                    @if($notification['data']['notification_status'] == 'WalletFundedNotification')
                                        <h3 class="card-title">Wallet Funded</h3>
                                        <div class="property-details">
                                            <p><strong>Amount:</strong> ₦{{ number_format($notification['data']['amount'], 2) }}</p>
                                            <p><strong>New Balance:</strong> ₦{{ number_format($notification['data']['balance'], 2) }}</p>
                                        </div>
                                    @endif
                                        {{-- <h3 class="card-title">{{ $notification['data']['property_name'] }}</h3>
                                        <div class="property-details">
                                            @isset($notification['data']['market_value'])
                                                <p><strong>Market Value:</strong> ₦{{ number_format($notification['data']['market_value'], 2) }}</p>
                                            @endisset
                                            @isset($notification['data']['percentage_increase'])
                                                <p><strong>Increase:</strong> {{ $notification['data']['percentage_increase'] }}%</p>
                                            @endisset
                                        </div> --}}
                                    
                                    @if($notification['data']['notification_status'] == 'Recipient Submitted Notification')
                                        <h3 class="card-title">{{ $notification['data']['property_name'] }}</h3>
                                        <div class="property-details">
                                            <!-- Status and Date -->
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                        @if($notification['data']['status'] === 'pending' && isset($notification['data']['property_mode'], $notification['data']['property_slug']))
                                            <a href="{{ route('user.transfer.property.confirm', [
                                                'propertyMode' => $notification['data']['property_mode'],
                                                'slug' => $notification['data']['property_slug']
                                            ]) }}" class="btn btn-success btn-sm">
                                                Confirm Property
                                            </a>
                                        @endif
                                    @endif

                                    
                
                                    
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
                            <ul class="pagination__menu d-flex align-items-center justify-content-center">
                                <!-- Render pagination links dynamically -->
                                @if ($notifications->onFirstPage())
                                    <li class="pagination__menu--items pagination__arrow disabled">
                                        <span class="pagination__arrow-icon">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.583 20.5832L0.999675 10.9998L10.583 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </li>
                                @else
                                    <li class="pagination__menu--items pagination__arrow">
                                        <a href="{{ $notifications->previousPageUrl() }}" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.583 20.5832L0.999675 10.9998L10.583 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </li>
                                @endif

                                <!-- Page numbers -->
                                @foreach ($notifications->links()->elements[0] as $page => $url)
                                    <li class="pagination__menu--items">
                                        <a href="{{ $url }}" class="pagination__menu--link {{ $page == $notifications->currentPage() ? 'active color-accent-1' : '' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                @if ($notifications->hasMorePages())
                                    <li class="pagination__menu--items pagination__arrow">
                                        <a href="{{ $notifications->nextPageUrl() }}" class="pagination__arrow-icon link">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.00098 20.5832L10.5843 10.9998L1.00098 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </li>
                                @else
                                    <li class="pagination__menu--items pagination__arrow disabled">
                                        <span class="pagination__arrow-icon">
                                            <svg width="12" height="22" viewBox="0 0 12 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.00098 20.5832L10.5843 10.9998L1.00098 1.4165" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div> 

                </div>
                
            </div>
        </main>
    </div>
</div>

@endsection
