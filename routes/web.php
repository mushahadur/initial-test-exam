<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::post('/add/{id}', 'addToCart')->name('cart.add');
    Route::get('/', 'index')->name('cart');
    Route::delete('/remove/{index}', 'remove')->name('cart.remove');
});