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

Route::get('/', function () {
    return view('welcome');
});

Route::get('total-active-product',
    \App\Http\Controllers\TotalActiveProductController::class)
    ->name('total-active-product');

Route::get('total-active-product-not-belong-to-user',
    \App\Http\Controllers\TotalActiveProductNotBelongToUserController::class)
    ->name('total-active-product-not-belong-to-user');

Route::get('total-amount-activated-product',
    \App\Http\Controllers\TotalAmountActivatedProductController::class)
    ->name('total-amount-activated-product');

Route::get('total-price-activated-product',
    \App\Http\Controllers\TotalPriceActivatedProductController::class)
    ->name('total-price-activated-product');

Route::get('total-price-activated-product-per-user',
    \App\Http\Controllers\TotalPriceActivatedProductPerUserController::class)
    ->name('total-price-activated-product-per-user');

Route::get('total-user-active-and-verified',
    \App\Http\Controllers\TotalUsersActiveAndVerifiedController::class)
    ->name('total-user-active-and-verified');

Route::get('total-user-active-and-verified-and-has-active-product',
    \App\Http\Controllers\TotalUsersActiveAndVerifiedHasProductController::class)
    ->name('total-user-active-and-verified-and-has-active-product');
