<?php

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


