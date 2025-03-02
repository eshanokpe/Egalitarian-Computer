<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\WalletController  as APIWalletController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PropertyController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\Api\BuyPropertyController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\Wallet\WalletTransferController;
use App\Http\Controllers\User\Wallet\WalletController;
use App\Http\Controllers\Api\PropertyController as APIPropertyController;
use App\Http\Controllers\Api\TransactionController as APITransactionController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes (no authentication required)
Route::post('register', [RegisterController::class, 'register']);
Route::get('/check/email', [RegisterController::class, 'checkEmail']);
Route::post('login', [LoginController::class, 'login']);
 

 
// Protected routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::get('/properties/{id}', [APIPropertyController::class, 'propertiesShow']);

    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/wallet/balance', [APIWalletController::class, 'getBalance']);
    Route::post('/wallet/deduct', [APIWalletController::class, 'deductBalance']);
    Route::get('/get/assets', [DashboardController::class, 'index']);
    Route::get('/get/faqs', [DashboardController::class, 'faqs']);

    Route::post('/transactions', [APITransactionController::class, 'store']);
    Route::post('/buy/properties', [BuyPropertyController::class, 'store']);

    Route::get('/notifications', [NotificationController::class, 'index']);

    Route::get('/get/userProfile', [ProfileController::class, 'index']);
    Route::post('/update/profile', [ProfileController::class, 'update']);
    Route::put('/{id}/change-password', [SecurityController::class, 'changePasswordPost']);
    Route::put('/{id}/transaction/pin', [SecurityController::class, 'createTransactionPin']);
    Route::get('/{userId}/transaction/get/pin', [SecurityController::class, 'getTransactionPin']);
   
    Route::get('/get/bank', [APIWalletController::class, 'getBank']);
    Route::get('resolve/account', [WalletController::class, 'resolveAccount']);

    Route::post('create/recipient', [WalletTransferController::class, 'createRecipient']);
    Route::post('initiate/transfer', [WalletTransferController::class, 'initiateTransfer']);
    Route::get('get/wallet/transactions', [WalletTransferController::class, 'getWalletTransactions']);


    
  
    Route::post('logout', [AuthController::class, 'logout']);

    // Example of other protected routes
    // Route::post('/webhook/paystack', [WebhookController::class, 'handlePaystackWebhook']);
});