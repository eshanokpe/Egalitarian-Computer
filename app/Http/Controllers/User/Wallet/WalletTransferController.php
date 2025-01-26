<?php

namespace App\Http\Controllers\User\Wallet;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\WalletController  as PayStackWalletController;
use Illuminate\Support\Facades\Http;

class WalletTransferController extends Controller
{
    public function index(){ 

    }
    public function createRecipient(Request $request)
    {
        // return response()->json([
        //     'status' => 'success', 
        //     'data' => $request->all()
        // ]);


        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post('https://api.paystack.co/transferrecipient', [
            'type' => 'nuban', // Nigerian bank account
            'name' => $request->name,
            'account_number' => $request->account_number,
            'bank_code' => $request->bank_code, // Get bank codes from Paystack's bank list API
            'currency' => 'NGN',
        ]);

        $data = $response->json();
        // dd($data);
        if ($response->successful()) {
            return response()->json([
                'status' => 'success', 
                'recipient_code' => $data['data']['recipient_code']
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => $data['message']]);
        }
    }

    public function initiateTransfer(Request $request)
    {
        $validated = $request->validate([
            'recipient_code' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'reason' => 'nullable|string',
        ]);
        $user = auth()->user();
        // return response()->json(['status' => 'success', 'data' => $user->wallet->balance]);

        if ($user->wallet->balance < $validated['amount']) {
            return response()->json([
                'status' => 'error',
                'message' => 'Insufficient wallet balance.',
            ], 400);
        }
        
        $transferResponse = $this->processTransfer($validated); 
        if ($transferResponse['status'] === 'success') {
            return response()->json(['status' => 'success', 'data' => $transferResponse['data']]);
        } else {
            return response()->json(['status' => 'error', 'message' => $transferResponse['message']]);
        }
       
    }

    public function processTransfer(array $validated)
    {
        // return response()->json(['status' => 'success', 'data' => $validated['amount']]);

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post('https://api.paystack.co/transfer', [
            'source' => 'balance',
            'amount' => $validated['amount'] * 100, // Amount in kobo
            'recipient' => $validated['recipient_code'],
            'reason' => $validated['reason'],
        ]);

        $data = $response->json();

        if ($response->successful()) {
            return ['status' => 'success', 'data' => $data['data']];
        } else {
            return ['status' => 'error', 'message' => $data['message']];
        }

    }
   
}
