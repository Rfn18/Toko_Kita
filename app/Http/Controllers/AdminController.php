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
        $total_keranjang = Keranjang::sum('jumlah');
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
    // Checkout
    public function checkout() {
        $checkout = Checkout::with('product', 'user')->get();
        $totalCheckoutToday = Checkout::whereDate('created_at', today())->count();
        $totalCheckoutYesterday = Checkout::whereDate('created_at', today()->subDay())->count();
        $totalPendingToday = Checkout::whereDate('created_at', today())->where('status', 'pending')->count();
        $totalPendingYesterday = Checkout::whereDate('created_at', today()->subday())->where('status', 'pending')->count();

        $reportTotal = floor(($totalCheckoutToday - $totalCheckoutYesterday) / $totalCheckoutToday * 100);
        $reportPending = $totalPendingToday - $totalPendingYesterday;

        return view('admin.report', compact('checkout', 'totalCheckoutToday', 'reportTotal', 'totalPendingToday', 'reportPending'));
    }

    public function checkoutEditStatus(Request $request, $id) {
        $request = validate([
            'status' => 'require',
        ]);

        $checkout = Checkout::find($id);
        $checkout->status = $request->alamat;
        $checkout->save();

        return redirect()->route('admin.report')->with('success', 'Updated status successfuly');
    }
}
