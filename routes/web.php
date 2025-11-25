<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;


// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::apiResource('produk', ProductController::class);

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('keranjang', KeranjangController::class);
