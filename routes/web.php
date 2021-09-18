<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\trackingcontroller;
use App\Http\Controllers\WeddingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [BookingController::class, 'home'])->name('landing');

Route::get('/portfolio', function () {
    return view('pages.portfolio.index');
})->name('portfolio');

Route::get('/pricelist', function () {
    return view('pages.pricelist.index');
})->name('pricelist.index');

Route::get('/portfolio/Pre-WeddingR&Bjepara', function () {
    return view('pages.portfolio.pre-wedding.index');
})->name('portfolio/pre-wedding');


/* Pricelist and Custom Order */
Route::get('pricelist/wedding', [WeddingController::class, 'index'])
    ->name('pricelist.wedding.index');

Route::get('pricelist/pre-wedding', [BookingController::class, 'prewedding'])
    ->name('pricelist.pre-wedding.index');

Route::get('pricelist/engagement', [BookingController::class, 'engagement'])
    ->name('pricelist.engagement.index');

Route::post('pricelist/post', [BookingController::class, 'orderfirststep']);

Route::get('/custom', [OrderController::class, 'custom'])->name('custom_package');
Route::post('/postcustom', [OrderController::class, 'postcustom'])->name('post-custom');


/* creating bookings & custom */
Route::get('pricelist/order', [BookingController::class, 'orderpackage'])
    ->name('pricelist.orderpackage');

Route::post('pricelist/postorder', [OrderController::class, 'postCreateStep1']);

Route::get('pricelist/order/details', [OrderController::class, 'order'])
    ->name('pricelist.wedding.order');
Route::post('/pricelist/detail/order', [OrderController::class, 'kirim']);

Route::get('pricelist/order/checkout', [OrderController::class, 'checkout'])
    ->name('pricelist.order.checkout');
Route::post('/pricelist/order/checkout/store', [OrderController::class, 'store']);


/*-----------------------------------*/
Route::get('/payment-confirmation', [OrderController::class, 'payment'])
    ->name('payment.confirmation');


/* searching */
Route::get('trackingorder', [trackingcontroller::class, 'index']);
Route::get('search', [trackingcontroller::class, 'post'])->name('requestorder');

//ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //ADMIN DASHBOARD
    Route::get('/dashboard', [admincontroller::class, 'dashboard'])->name('dashboard');

    //ADMIN SEARCH ROUTES
    Route::get('/search', [admincontroller::class, 'index'])->name('search-booking');
    Route::get('/request-status', [admincontroller::class, 'post'])->name('request-status');
    Route::post('/update-status', [admincontroller::class, 'edit'])->name('update-status');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/postpackage', [BookingController::class, 'index']);
Route::post('storepackage', [BookingController::class, 'create']);
