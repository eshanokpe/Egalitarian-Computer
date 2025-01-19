@extends('layouts.dashboard')

<style>
    .copy-success {
        font-size: 14px;
        color: #28a745;
        margin-left: 8px;
        animation: fadeInOut 3s forwards;
    }

    .copy-fail {
        font-size: 14px;
        color: #dc3545;
        margin-left: 8px;
        animation: fadeInOut 3s forwards;
    }

    @keyframes fadeInOut {
        0% { opacity: 0; }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; }
    }
    button:disabled {
        background-color: #ccc;
        cursor: not-allowed;
        opacity: 0.6;
    }

</style>

@section('content')

<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
   
    <!-- End header area -->
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container d-flex">
            <div class="main__content--left">
                <div class="main__content--left__inner">
                    <!-- Welcome section -->
                    <div class="dashboard__chart--box mb-30">
                        <h2 class="dashboard__chart--title"> Transfer to </h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        
                                        <section class="">
                                            <div class="welcome__content">
                                                <div class="setting__profile--inner">
                                                    <form action="{{ route('user.wallet.transferPost') }}" method="POST">
                                                        @csrf
                                                        <!-- Account Number Input -->
                                                        <div class="add__listing--input__box mb-20">
                                                            <label class="add__listing--input__label" for="name">Recipient Account</label>
                                                            <input 
                                                                class="add__listing--input__field" 
                                                                id="name" 
                                                                name="account_number" 
                                                                placeholder="Enter 10 digits Account Number" 
                                                                type="number" 
                                                                value="">
                                                        </div>
                                                    
                                                        <!-- Bank Select -->
                                                        <div class="add__listing--input__box mb-20">
                                                            <label class="add__listing--input__label" for="bank">Select Bank</label>
                                                            <select name="bank_code" id="bank" class="add__listing--input__field">
                                                                <option value="">Select a bank</option>
                                                                @if(!empty($banks))
                                                                    @foreach($banks as $bank)
                                                                        <option value="{{ $bank['code'] }}">{{ $bank['name'] }}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="">No banks available</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    
                                                        <!-- Account Name Display -->
                                                        <div class="add__listing--input__box mb-20">
                                                            <label class="add__listing--input__label">Account Name</label>
                                                            <div id="account_name" style="font-weight: bold; color: green;"> </div>
                                                        </div>
                                                    
                                                        <!-- Submit Button -->
                                                        <button type="submit" id="next-button" class="solid__btn add__property--btn" disabled>Next</button>
                                                    </form>
                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                    <script>
                                                        $(document).ready(function () {
                                                            const $accountNumber = $('#name');
                                                            const $bankSelect = $('#bank');
                                                            const $nextButton = $('#next-button');

                                                            function toggleNextButton() {
                                                                const isAccountNumberValid = $accountNumber.val().length === 10;
                                                                const isBankSelected = $bankSelect.val() !== '';
                                                                $nextButton.prop('disabled', !(isAccountNumberValid && isBankSelected));
                                                            }

                                                            // Listen for input changes
                                                            $accountNumber.on('input', function () {
                                                                // Ensure the input does not exceed 10 digits
                                                                const currentValue = $accountNumber.val();
                                                                if (currentValue.length > 10) {
                                                                    $accountNumber.val(currentValue.slice(0, 10)); // Truncate to 10 characters
                                                                }
                                                                toggleNextButton();
                                                            });
                                                            $bankSelect.on('change', toggleNextButton);
                                                        });
                           
                                                        $(document).ready(function () {
                                                            $('#bank, #name').on('input change', function () {
                                                                const accountNumber = $('#name').val();
                                                                const bankCode = $('#bank').val();

                                                                if (accountNumber.length === 10 && bankCode) {
                                                                    // Show loading indicator (optional)
                                                                    $('#account_name').text('Verifying...');

                                                                    // Send AJAX request
                                                                    $.ajax({
                                                                        url: "{{ route('user.wallet.verifyAccount') }}",
                                                                        method: "POST",
                                                                        data: {
                                                                            _token: "{{ csrf_token() }}",
                                                                            account_number: accountNumber,
                                                                            bank_code: bankCode,
                                                                        },
                                                                        success: function (response) {
                                                                            $('#account_name').text(response.account_name || 'Account name not found');
                                                                        },
                                                                        error: function () {
                                                                            $('#account_name').text('Unable to verify account. Please try again.');
                                                                        },
                                                                    });
                                                                } else {
                                                                    $('#account_name').text(''); // Clear the name if inputs are incomplete
                                                                }
                                                            });
                                                        });


                                                    </script>
                                                    
                                                </div>
                                                 
                                            </div>
                                            
                                            
                                        </section>
                                        
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Transaction Report Section -->
                     <div class="sales__report--section">
                        <div class="sales__report--heading d-flex align-items-center justify-content-between mb-30">
                            <h2 class="sales__report--heading__title">Latest Transaction </h2>
                            <div class="sales__report--short-by select">
                               View all
                            </div>
                        </div>
                        <table class="sales__report--table table-responsive">
                            <thead>
                                <tr> 
                                    <th style="width: 5%; padding: 10px;">#</th> <!-- Minimal space for index -->
                                    <th style="width: 20%; padding: 5px;">Transaction Ref</th>
                                    <th style="width: 20%; padding: 5px;">Payment Method</th>
                                    <th style="width: 15%; padding: 5px;">Amount</th>
                                    <th style="width: 15%; padding: 5px;">Created</th>
                                    <th style="width: 10%; padding: 5px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 10px;">1</td>
                                    <td style="padding: 5px;">
                                        <span class="sales__report--body__text"> Top up</span>
                                    </td>
                                    <td style="padding: 5px;">
                                        <span class="sales__report--body__text">Card</span>
                                    </td>
                                    <td style="padding: 5px;">
                                        <span class="sales__report--body__text">₦120,000.00</span>
                                    </td>
                                    <td style="padding: 5px;">
                                        <span class="sales__report--body__text">date</span>
                                    </td>
                                    <td style="padding: 5px;">
                                        <button class="btn btn-warning btn-sm">Success</button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        {{-- @if($totalTransactions > 6)
                            <div class="text-center mt-3">
                                <a class="welcome__content--btn solid__btn" href="{{ route('user.transactions') }}">View More Transactions</a>
                            </div>
                        @endif --}}
                    </div>
                    <!-- Transaction Report Section End -->

                </div>
            </div>
            <div class="main__content--right">
                <div class="dashboard__chart--box mb-30">
                    <h2 class="dashboard__chart--title">  Main Balance</h2>
                    @include('user.partial.mainBalance')
                </div>

                <div class="dashboard__chart--box mb-30">
                    <h2 class="dashboard__chart--title"> Refer and Earn </h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="swiper-slide">
                                <div class="currency__card" style="border: 1px solid #ddd; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                    <h3 class="currency__card--title">
                                        Refer Your Friend and Earn to Your Wallet
                                    </h3>
                                    <div class="referral-code" >
                                        <span class="currency__weekly  referral_code" >
                                            {{ url('/user/register/referral/' . $user->referral_code) }}
                                        </span>
                                        <button class="copy-btn btn btn-success btn-lg" onclick="copyReferralLink()">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="recent__activity--box">
                    <div class="recent__activity--header d-flex align-items-center justify-content-between mb-25">
                        <h2 class="recent__activity--title">Referral history</h2>
                       
                    </div>
                    <ul class="recent__activity--message">
                       
                        @if ($referralsMade->isNotEmpty())
                            @foreach ($referralsMade as $referral)
                                <li class="recent__activity--message__list one d-flex justify-content-between">
                                    <div class="recent__activity--message__content">
                                        <p class="recent__activity--message__desc">
                                            {{ $referral->referred->last_name ?? 'Unknown' }}
                                            {{ $referral->referred->first_name ?? 'Name' }}
                                        </p>
                                    </div>
                                    <span class="recent__activity--message__time">
                                        {{ $referral->created_at->format('g:i A') ?? 'N/A' }}
                                    </span>
                                </li>
                            @endforeach
                            {{-- Display "View More" link if there are additional referrals --}}
                            @if ($hasMoreReferrals)
                                <a href="{{ route('user.referrals.show') }}" class="view-more-link">View More</a>
                            @endif
                        @else
                            <p>No referrals made yet.</p>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <!-- dashboard container .\ -->

       
    </main>
</div>

@endsection 
<script>
    function copyReferralLink() {
        const referralLink = document.querySelector('.referral_code').innerText;
        navigator.clipboard.writeText(referralLink).then(() => {
            const message = document.createElement('span');
            message.className = 'copy-success';
            message.innerText = 'Referral link copied!';
            
            const referralContainer = document.querySelector('.referral-code');
            referralContainer.appendChild(message);

            // Remove the message after 3 seconds
            setTimeout(() => {
                referralContainer.removeChild(message);
            }, 3000);
        }).catch(() => {
            const message = document.createElement('span');
            message.className = 'copy-fail';
            message.innerText = 'Failed to copy referral link.';
            
            const referralContainer = document.querySelector('.referral-code');
            referralContainer.appendChild(message);

            // Remove the message after 3 seconds
            setTimeout(() => {
                referralContainer.removeChild(message);
            }, 3000);
        });
    }
   
   


</script>
