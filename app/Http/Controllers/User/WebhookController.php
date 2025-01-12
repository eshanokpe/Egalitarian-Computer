<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Transaction;
use App\Notifications\WalletFundedNotification;

class WebhookController extends Controller
{
    public function handlePaystackWebhook(Request $request)
    {
        // Log the incoming webhook for debugging
        Log::info('Paystack Webhook Received', $request->all());

        // Verify the Paystack webhook signature
        $paystackSignature = $request->header('x-paystack-signature');
        $secretKey = env('PAYSTACK_SECRET_KEY');

        if (!$paystackSignature || !hash_equals(hash_hmac('sha512', $request->getContent(), $secretKey), $paystackSignature)) {
            Log::warning('Invalid Paystack Webhook Signature');
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        }

        // Handle the `charge.success` event
        if ($request->event === 'charge.success') {
            $data = $request->input('data');

            $email = $data['customer']['email']; // Get the customer's email
            $amount = $data['amount'] / 100; // Convert amount to Naira (Paystack sends amount in kobo)
            $reference = $data['reference'];

            // Find the user by email
            $user = User::where('email', $email)->first();

            if ($user) {
                // Update the wallet balance
                $user->wallet->increment('balance', $amount);

                // Log the transaction
                Transaction::create([
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'amount' => $amount,
                    'reference' => $reference,
                    'status' => 'success',
                    'description' => 'Fund added to wallet',
                    'payment_method' => 'Transfer'
                ]);
                // Trigger the notification
                $newBalance = $user->wallet->balance;
                $user->notify(new WalletFundedNotification($amount, $newBalance));


                Log::info("Wallet updated successfully for user: {$email}");
            } else {
                Log::warning("User with email {$email} not found.");
            }
        }

        return response()->json(['status' => 'success']);
    }
}
