<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ProductsController;

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


Route::get('/', [ProductsController::class, 'index']);

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update-cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove-from-cart');

Route::post('place-order', [OrderController::class, 'placeOrder'])->name('order-details');
Route::get('order-details/{order_id}', [OrderController::class, 'orderDetails'])->name('order-details');

