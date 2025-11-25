<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function index() {
        $total_user = User::count();
        $total_product = Product::count();
        $total_stok = Product::sum('stok');

        return view("admin.dashboard", compact('total_user', 'total_product', 'total_stok'));
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
        $kategori = Kategoris::all();

        return view("admin.kategori.index", compact('kategori'));
    }
}
