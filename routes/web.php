<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Middleware\AdminMiddleware;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::apiResource('produk', ProductController::class);
Route::get("/search", [ProductController::class, "search"])->name('products.search');

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

     // Chcekout Report
     Route::get('/laporan', [AdminController::class, 'checkout'])->name('admin.report');
     Route::post('/laporan/update/{id}', [AdminController::class, 'checkoutEditStatus'])->name('admin.report.update');
});

// Middleware Customer
Route::middleware(['auth'])->group(function() {
     // Keranjang
     Route::get("/keranjang", [KeranjangController::class, 'index'])->name('customer.keranjang');
     Route::post('/keranjang/add', [KeranjangController::class, 'store'])->name('customer.keranjang.store');
     Route::post('/keranjang/addMany', [KeranjangController::class, 'tambahBanyak'])->name('customer.keranjang.storeMany');
     Route::put('/keranjang/min/{id}', [KeranjangController::class, 'minJumlah'])->name('customer.keranjang.min');
     Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'destroy'])->name('customer.keranjang.delete');

     // Profile
     Route::get("/profile", [UserController::class, 'index'])->name('customer.profile');

     // Checkout
     Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
     Route::get('/riwayat', [CheckoutController::class, 'index'])->name('checkout.index');
});

Route::apiResource('kategori', KategoriController::class);
