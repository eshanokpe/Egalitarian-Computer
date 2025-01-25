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
            return response()->json([
                'status' => 'success', 
                'recipient_code' => $request->all();
            ]);

        // $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post('https://api.paystack.co/transferrecipient', [
        //     'type' => 'nuban', // Nigerian bank account
        //     'name' => $request->name,
        //     'account_number' => $request->account_number,
        //     'bank_code' => $request->bank_code, // Get bank codes from Paystack's bank list API
        //     'currency' => 'NGN',
        // ]);

        // $data = $response->json();

        // if ($response->successful()) {
        //     return response()->json(['status' => 'success', 'recipient_code' => $data['data']['recipient_code']]);
        // } else {
        //     return response()->json(['status' => 'error', 'message' => $data['message']]);
        // }
    }

   

    public function withDraw(PayStackWalletController $paystackWalletController){ 

        // $result = $paystackWalletController->createTransferRecipient();
        // dd($result);
 
        $data['banks'] = $paystackWalletController->getBanks(); 
        // dd($data['banks']);

        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        // return view('user.pages.wallet.withDraw.index', $data); 
        return view('user.pages.wallet.withDraw.index', [
            'banks' => $data['banks'],
            'user' => $data['user'],
            'referralsMade' => $data['referralsMade'],
            'hasMoreReferrals' => $data['hasMoreReferrals'],
        ]);
    }

    public function verifyAccount(Request $request, PayStackWalletController $paystackWalletController)
    {
        $validated = $request->validate([
            'account_number' => 'required|string',
            'bank_code' => 'required|string',
        ]);

        // Your verification logic
        return response()->json(['account_name' => $validated['bank_code'] ]); // Example
    }
 

    public function verifyAccountt(Request $request, PayStackWalletController $paystackWalletController){
        dd('Request');
        
        $request->validate([
            'account_number' => 'required|digits:10',
            'bank_code' => 'required|string',
        ]);
        dd($request->all());
        try {
            $result = $paystackWalletController->verifyAccount($request->account_number, $request->bank_code);
            return response()->json([
                'success' => true,
                'data' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    } 

    public function paymentHistory(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
      
        return view('user.pages.wallet.payment.history', $data);
    }

    public function resolveAccount(Request $request)
    {
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get('https://api.paystack.co/bank/resolve', [
                'account_number' => $request->account_number,
                'bank_code' => $request->bank_code,
            ]);
    
        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'account_name' => $response['data']['account_name'],
            ]);
        }
    
        return response()->json(['status' => 'error', 'message' => 'Unable to resolve account.']);
    }
}
