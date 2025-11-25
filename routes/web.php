<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);

Route::apiResource('produk', ProductController::class);
Route::apiResource('kategori', KategoriController::class);
Route::apiResource('keranjang', KeranjangController::class);
