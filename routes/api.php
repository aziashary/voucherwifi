<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransaksiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('paymentVa', [PaymentController::class, 'createVa']);
// Route::post('callbackVa', [PaymentController::class, 'callbackVa']);

// Route::post('paymentQR', [PaymentController::class, 'createQR']);
// Route::post('callbackQR', [PaymentController::class, 'callbackQR']);

// Route::post('paymentWallet', [PaymentController::class, 'createWallet']);
// Route::post('callbackWallet', [PaymentController::class, 'callbackWallet']);

Route::post('callbackinvoice', [TransaksiController::class, 'callback']);
