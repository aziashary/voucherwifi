<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('menu.index');
});

Route::get('/backoffice', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Checkout
    Route::group(['prefix' => 'bayar'], function () {
Route::post('/store/{lokasi}', [TransaksiController::class, 'store']);
Route::get('/proses/{kode_transaksi}', [TransaksiController::class, 'proses']);
Route::get('/showvoucher/{kode_transaksi}', [TransaksiController::class, 'showvoucher']);
Route::post('/cekkode', [TransaksiController::class, 'cekkode']);
});

// Menu
    Route::group(['prefix' => 'menu'], function () {
Route::get('/{lokasi}', [MenuController::class, 'menu']);
Route::get('/checkout/{paket}/{lokasi}', [MenuController::class, 'checkout']);
    });

// Voucher 
    Route::group(['prefix' => 'voucher'], function () {
Route::get('/', [VoucherController::class, 'index']);
Route::get('/used', [VoucherController::class, 'used']);
    });

// Paket
    Route::group(['prefix' => 'paket'], function () {
Route::get('/', [PaketController::class, 'index']);
Route::get('/used', [PaketController::class, 'used']);
    });

// Transaksi
    Route::group(['prefix' => 'transaksi'], function () {
Route::get('/index', [VoucherController::class, 'index']);

    });

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
