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
        $toal_product = Product::count();

        return view("admin.dashboard", compact('total_user', 'toal_product'));
    }

    // Produk
    public function produk() {
        $produk = Product::all();

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
