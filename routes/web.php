<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;
use App\Middleware\AdminMiddleware;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::apiResource('produk', ProductController::class);

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Middleware admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function() {
     // Dashboard
     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
     
     // Produk
     Route::get('/produk', [AdminController::class, 'produk'])->name('admin.produk.index');
     Route::get('/produk/create', [AdminController::class, 'createProduk'])->name('admin.produk.create');
     Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('admin.produk.edit');
     Route::post('/produk/create', [ProductController::class, 'store'])->name('admin.produk.store');;
     Route::put('produk/edit/{id}', [ProductController::class, 'update'])->name('admin.produk.update');
     Route::delete('produk/delete/{id}', [ProductController::class, 'destroy'])->name('admin.produk.delete');

     // Kategori
     Route::get('/kategori', [AdminController::class, 'kategori'])->name('admin.kategori.index');
     Route::post('/kategori/create', [KategoriController::class, 'store'])->name('admin.kategori.store');;
     Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');;
     Route::delete('kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.delete');
});

Route::apiResource('kategori', KategoriController::class);
Route::apiResource('keranjang', KeranjangController::class);
