<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WalletService; 
// or
use function App\Helpers\getWalletBalance; 

class WalletController extends Controller
{
    public function getBalance()
    {
        $walletBalance = (new WalletService())->getWalletBalance(); 
        // or
        // $walletBalance = getWalletBalance(); 

        return response()->json([
            'success' => true,
            'balance' => $walletBalance,
        ]);
    }
}