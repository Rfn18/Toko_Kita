<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Keranjang;
use App\Models\Checkout;

class AdminController extends Controller
{
    public function index() {
        $total_user = User::count();
        $total_product = Product::count();
        $total_stok = Product::sum('stok');
        $total_keranjang = Keranjang::sum('jumlah')     ;
        $total_pendapatan = Checkout::sum('total_harga');

        return view("admin.dashboard", compact('total_user', 'total_product', 'total_stok', 'total_keranjang', 'total_pendapatan'));
    }

    // Produk
    public function produk() {
        $produk = Product::with('kategori')->get();
        return view("admin.produk.index", compact('produk'));
    }

    public function createProduk() {
        $kategori = Kategoris::all();

        return view("admin.produk.create", compact('kategori'));
    }

    // Kategori
    public function kategori() {
        $kategori =  Kategoris::withCount('products')->get();
  

        return view("admin.kategori.index", compact('kategori'));
    }
}
