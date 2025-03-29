<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Buy;  
use Yabacon\Paystack;  
use App\Models\Wallet;
use App\Models\Property;  
use App\Models\Transaction;   
use App\Models\ReferralLog;
use App\Notifications\ReferralCommissionEarnedNotification;
use App\Notifications\ReferredUserPurchasedNotification;

class PaymentController extends Controller
{
    protected $paystack;

    public function __construct()
    {
        $this->middleware('auth'); 
        $this->paystack = new Paystack(env('PAYSTACK_SECRET_KEY')); // Initialize Paystack
    }

    public function initializePayment(Request $request)
    {
        
        $request->validate([
            'remaining_size' => 'required',
            'property_slug' => 'required',
            'quantity' => 'required',
            'total_price' => 'required|numeric|min:1',
        ]);
        $user = Auth::user();
        $propertySlug  = $request->input('property_slug');
        $property = Property::where('slug', $propertySlug)->first();
        // Check if the property exists
        if (!$property) {
            return back()->with('error', 'Property not found.');
        }
        // Check if the user has enough balance
        
        $wallet = $user->wallet; // Access the wallet via relationship
        $amount = $request->input('total_price');

        // Ensure wallet exists and check the balance
        if (!$wallet || $wallet->balance < $amount) {
            return back()->with('error', 'Insufficient funds in your wallet. Please add funds to proceed.');
        }

        // Generate a unique transaction reference
        $reference = 'DOHREF-' . time() . '-' . strtoupper(Str::random(8));

        $selectedSizeLand  = $request->input('quantity');
        $remainingSize  = $request->input('remaining_size');
        $amount  = $request->input('total_price');

        $propertyId  = $property->id;
        $propertyName  =  $property->name;
        $propertyData = Property::where('id', $propertyId)->where('name', $propertyName)->first();
        // Prepare the data to send to Paystack
        $data = [
            'amount' => $amount * 100, 
            'email' => $user->email,
            'metadata' => [
                'property_id' => $propertyData->id,
                'property_name' => $propertyData->name,
                'remaining_size' => $remainingSize,
                'selected_size_land' => $selectedSizeLand,
            ],
            'reference' => $reference,
            'property_state' => $property->property_state,
            'callback_url' => route('user.payment.callback'),
        ];
       
        try {
            $response = $this->paystack->transaction->initialize($data);

            return redirect($response->data->authorization_url);
        } catch (\Exception $e) {
            return back()->with('error', 'Unable to initiate payment: ' . $e->getMessage());
        }
    }
   
    public function paymentCallback(Request $request)
    {
        try {
            $user = Auth::user();
            $paymentDetails = $this->paystack->transaction->verify([
                'reference' => $request->get('reference'),
                'trxref' => $request->get('trxref'),
            ]);
            $property = Property::where('id', $paymentDetails->data->metadata->property_id)
            ->where('name', $paymentDetails->data->metadata->property_name)->first();

            if (!$property) {
                return redirect()->back()->with('error', 'Property not found.');
            }

            if ($paymentDetails->data->status === 'success') {
                $amount = $paymentDetails->data->amount / 100;
                $reference = $paymentDetails->data->reference;
                $channel = $paymentDetails->data->channel;
                // Create the transaction record
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'property_id' => $property->id,
                    'property_name' => $property->name,
                    'amount' => $amount,
                    'status' =>  $paymentDetails->data->status,
                    'payment_method' => 'card',
                    'reference' => $reference,
                    'transaction_state' => $paymentDetails->data->status,
                ]);
                // Create the buy record
                $buy = Buy::create([
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'transaction_id' => $transaction->id,
                    'property_id' => $property->id,
                    'selected_size_land' => $paymentDetails->data->metadata->selected_size_land,
                    'remaining_size' => $paymentDetails->data->metadata->remaining_size,
                    'total_price' => $amount,
                    'status' => 'available',
                ]);
                
                // if (is_numeric($property->available_size) && is_numeric($property->available_size) == 1) {
                //     $property->update([
                //         'status' => 'sold out',
                //     ]);
                // }
            
                // if (is_numeric($buy->remaining_size) && ($property->available_size) == 1) {
                //     $buy->update([
                //         'status' => 'sold out',
                //     ]);
                // }
                $user = Auth::user();
                // Deduct from Wallet 
                $wallet = $user->wallet;
                if ($wallet) {
                    $userBalance = $wallet->balance;
                    // Check if the user has sufficient balance
                    if ($userBalance >= $amount) {
                        $v = $userBalance - $amount;
                        $wallet->update([
                            'balance' => $userBalance - $amount
                        ]); 
                    } else {
                        return redirect()->route('user.dashboard')->with('error', 'Insufficient wallet balance.');
                    }
                } else {
                    return redirect()->route('user.dashboard')->with('error', 'Wallet not found. Please contact support.');
                }

                // Handle referral commission if this is user's first purchase
                $this->processReferralCommission($user, $property, $amount, $transaction);

                return redirect()->route('user.dashboard')->with('success', 'Payment successful!');
            }

            if ($paymentDetails->data->status !== 'success') {
                $transaction->update([
                    'status' => $paymentDetails->data->status,
                    'property_state' => 'failed',
                ]);

                return redirect()->route('user.dashboard')->with('error', 'Payment failed. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    protected function processReferralCommission($user, $property, $amount, $transaction)
    {
        // Check if user has any previous purchases
        $hasPreviousPurchases = Buy::where('user_id', $user->id)
        ->where('transaction_id', '!=', $transaction->id)
        ->exists();

        if ($hasPreviousPurchases) {
            return; // Skip if not first purchase
        }

        // Check if user was referred
        $referralLog = ReferralLog::where('referred_id', $user->id)
            ->where('status', ReferralLog::STATUS_REGISTERED)
            ->first();
        if ($referralLog) {
            // Calculate 3% commission
            $commissionAmount = $amount * 0.03;

            // Update referral log
            $referralLog->update([
                'property_id' => $property->id,
                'transaction_id' => $transaction->id,
                'commission_amount' => $commissionAmount,
                'status' => ReferralLog::STATUS_PENDING,
            ]);
            // Credit referrer's wallet
            $referrer = $referralLog->referrer;
            if ($referrer && $referrer->wallet) {
                $referrer->wallet->increment('balance', $commissionAmount);
                // Create commission transaction
                Transaction::create([
                    'user_id' => $referrer->id,
                    'amount' => $commissionAmount,
                    'type' => 'referral_commission',
                    'status' => 'completed',
                    'description' => 'Commission from referral purchase',
                    'reference' => 'COMM-'.Str::uuid(),
                ]);
                // Notify referrer
                $referrer->notify(new ReferralCommissionEarnedNotification(
                    $user,
                    $property,
                    $commissionAmount
                ));
                // Notify referred user
                $user->notify(new ReferredUserPurchasedNotification(
                    $referrer,
                    $property
                ));
            }else {
                // Create a wallet if it doesn’t exist (optional)
                $referrer->wallet()->create(['balance' => $commissionAmount]);
            }
        }
    }
}
