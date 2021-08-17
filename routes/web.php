<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\trackingcontroller;
use App\Http\Controllers\WeddingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;

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
    return view('pages.landing.index');
})->name('landing');

Route::get('/portfolio', function () {
    return view('pages.portfolio.index');
})->name('portfolio');

Route::get('/pricelist', function () {
    return view('pages.pricelist.index');
})->name('pricelist.index');

Route::get('pricelist/wedding', [WeddingController::class, 'index'])
    ->name('pricelist.wedding.index');

Route::get('pricelist/wedding/mahawira', [WeddingController::class, 'show'])
    ->name('pricelist.wedding.show');
Route::post('pricelist/wedding/mahawira', [WeddingController::class, 'postCreateStep1']);

Route::get('pricelist/wedding/mahawira/order', [OrderController::class, 'order'])
    ->name('pricelist.wedding.order');
Route::post('/pricelist/wedding/mahawira/order', [OrderController::class, 'kirim']);

Route::get('pricelist/wedding/mahawira/checkout', [OrderController::class, 'checkout'])
    ->name('pricelist.wedding.checkout');
Route::post('/pricelist/wedding/mahawira/checkout',  [OrderController::class, 'store']);

Route::get('/payment-confirmation', [OrderController::class, 'payment'])
    ->name('payment.confirmation');

Route::get('pricelist/pre-wedding', function () {
    return view('pages.pricelist.pre-wedding.index');
})->name('pricelist.pre-wedding.index');
Route::get('post', [OrderController::class, 'postpaket']);

Route::post('post', [OrderController::class, 'storeimage'])->name('post');

Route::get('track', [trackingcontroller::class, 'index']);

Route::post('search', [trackingcontroller::class, 'post'])->name('requestorder');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
