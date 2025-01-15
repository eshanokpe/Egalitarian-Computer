<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Transaction;
use App\Notifications\WalletFundedNotification;


class WebhookController extends Controller
{
    public function test(){
        $paystackSecretKey = env('PAYSTACK_SECRET_KEY');
        dd($paystackSecretKey);
    }

    public function handlePaystackWebhook(Request $request)
    {
        Log::info('Webhook invoked.');
        Log::info('Headers:', $request->headers->all());
        Log::info('Payload:', json_decode($request->getContent(), true));
    
        // Define your Paystack secret key
        $paystackSecretKey = env('PAYSTACK_SECRET_KEY');

        // Ensure it's a POST request and has the necessary Paystack signature header
        $signature = $request->header('X-Paystack-Signature');
        $input = $request->getContent();

        if (!$signature || $signature !== hash_hmac('sha512', $input, $paystackSecretKey)) {
            Log::error('Invalid signature:', ['signature' => $signature]);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Parse the incoming JSON payload
        $event = json_decode($input);

        if (!$event) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        // Log the event for debugging (optional)
        Log::info('Paystack Webhook Received', (array) $event);

        // Handle the event based on the type
        switch ($event->event) {
            case 'charge.success':
                $this->handleChargeSuccess($event->data);
                break;
            // Add other event cases as needed
            default:
                Log::warning('Unhandled Paystack Event: ' . $event->event);
                break;
        }

        // Return a 200 response to acknowledge receipt of the webhook
        return response()->json(['status' => 'success'], 200);
    }

    protected function handleChargeSuccess($data)
    {
        // Example: Process the payment data
        Log::info('Charge Successful', (array) $data);


        $email = $data->customer->email;
        $amount = $data->amount / 100; // Convert amount to Naira (Paystack sends amount in kobo)
        $reference = $data->reference;

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
}

