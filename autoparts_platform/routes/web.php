<?php

use App\Mail\PurchaseMail;
use App\Mail\SellMail;
use App\Models\Parts;
use App\Models\Seller;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::post('/purchase', [App\Http\Controllers\HomeController::class, 'purchase'])->name('checkout.purchase');


Route::get('/sell', [App\Http\Controllers\SellerController::class, 'sellaccount'])->name('sellaccount');
Route::post('/createseller', [App\Http\Controllers\SellerController::class, 'store'])->name('seller.store');

Route::get('/sellparts', [App\Http\Controllers\SellerController::class, 'sellparts'])->name('sellparts');
Route::get('/getmodels', [App\Http\Controllers\SellerController::class, 'getModels'])->name('vehicle.getmodels');
Route::get('/getmodels2', [App\Http\Controllers\SellerController::class, 'getModels'])->name('vehicle.getmodels');
Route::post('/getmsg', [App\Http\Controllers\SellerController::class, 'getMsg'])->name('vehicle.getMsg');

// Route::get('/uploadpartimagepreview', [App\Http\Controllers\VehiclePartsController::class, 'getModels'])->name('vehicle.getmodels');
Route::post('/uploadpart', [App\Http\Controllers\VehiclePartsController::class, 'store'])->name('part.store');
Route::get('/getparts', [App\Http\Controllers\VehiclePartsController::class, 'getParts'])->name('parts.getparts');
Route::get('/getonepart', [App\Http\Controllers\VehiclePartsController::class, 'getOnePart'])->name('parts.getonepart');
Route::get('/filterparts', [App\Http\Controllers\VehiclePartsController::class, 'filterParts'])->name('parts.filterparts');
Route::get('/addcart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('carts.addcart');
Route::get('/removecart', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('carts.removecart');

// Route::post('\checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');
// Route::get('stripe', 'StripeController@stripe');
// Route::post('payment', 'StripeController@payStripe');

Route::get('/email', function() {
    return new PurchaseMail();
});
Route::get('/sellemail', function() {

    $user = auth()->user();

    $seller = Seller::where('user_id', '339b4f23-8229-4143-8f9d-1224775c04af')->get();
    $part = Parts::where('id', '95191f59-2e4f-463c-b288-6eeb79b289e8')->get();

    return new SellMail($part, $user);
});


