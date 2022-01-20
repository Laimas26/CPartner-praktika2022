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


Route::get('/sell', [App\Http\Controllers\SellerController::class, 'sellaccount'])->name('sellaccount');
Route::post('/createseller', [App\Http\Controllers\SellerController::class, 'store'])->name('seller.store');

Route::get('/sellparts', [App\Http\Controllers\SellerController::class, 'sellparts'])->name('sellparts');

