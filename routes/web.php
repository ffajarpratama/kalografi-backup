<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\BookingController;
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

Route::get('/',  [BookingController::class, 'home'])->name('landing');

Route::get('/portfolio', function () {
    return view('pages.portfolio.index');
})->name('portfolio');

Route::get('/pricelist', function () {
    return view('pages.pricelist.index');
})->name('pricelist.index');

Route::get('/portfolio/Pre-WeddingR&Bjepara', function () {
    return view('pages.portfolio.pre-wedding.index');
})->name('portfolio/pre-wedding');

/* Pricelist and ordering */
Route::get('pricelist/wedding', [WeddingController::class, 'index'])
    ->name('pricelist.wedding.index');

Route::get('pricelist/pre-wedding', [BookingController::class, 'prewedding'])
    ->name('pricelist.pre-wedding.index');

Route::get('pricelist/order', [BookingController::class, 'orderpackage'])
    ->name('pricelist.orderpackage');

Route::post('pricelist/post', [BookingController::class, 'orderfirststep']);

Route::get('pricelist/engagement', [BookingController::class, 'engagement'])
    ->name('pricelist.engagement.index');




Route::post('pricelist/wedding/postorder', [WeddingController::class, 'postCreateStep1']);

Route::get('pricelist/wedding/order/details', [OrderController::class, 'order'])
    ->name('pricelist.wedding.order');
Route::post('/pricelist/wedding/mahawira/order', [OrderController::class, 'kirim']);

Route::get('pricelist/wedding/order/checkout', [OrderController::class, 'checkout'])
    ->name('pricelist.wedding.checkout');
Route::post('/pricelist/wedding/mahawira/checkout',  [OrderController::class, 'store']);

/*-----------------------------------*/

Route::get('pricelist/wedding/mahesa', [WeddingController::class, 'Mahesa'])
    ->name('pricelist.wedding.mahesa');


Route::get('/payment-confirmation', [OrderController::class, 'payment'])
    ->name('payment.confirmation');



Route::get('/custom', [OrderController::class, 'custom'])->name('custom_package');
Route::post('/postcustom', [OrderController::class, 'postcustom'])->name('post-custom');


/* searching & adminsearch */
Route::get('trackingorder', [trackingcontroller::class, 'index']);
Route::get('search', [trackingcontroller::class, 'post'])->name('requestorder');
Route::get('adminsearch', [admincontroller::class, 'post'])->name('adminrequestorder');
Route::get('admin', [admincontroller::class, 'index'])->name('request-status');
Route::post('/request/status',  [admincontroller::class, 'edit']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/postpackage', [BookingController::class, 'index']);
Route::post('storepackage', [BookingController::class, 'create']);