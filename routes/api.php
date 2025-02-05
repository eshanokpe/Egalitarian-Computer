<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\User\PropertyController;
use App\Http\Controllers\User\TransactionController;
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
    Route::get('/transactions', [TransactionController::class, 'index']);


    Route::post('logout', [AuthController::class, 'logout']);

    // Example of other protected routes
    // Route::post('/webhook/paystack', [WebhookController::class, 'handlePaystackWebhook']);
});