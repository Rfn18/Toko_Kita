<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
{
    $user = auth()->user();

    foreach ($request->items as $item) {

        $product = Product::find($item['product_id']);

        if ($product->stok < $item['jumlah']) {
            return back()->with('error', 'Stok produk ' . $product->nama_produk . ' tidak mencukupi.');
        }

        $product->stok -= $item['jumlah'];
        $product->save();

        Checkout::create([
            'user_id'      => $user->id,
            'product_id'   => $item['product_id'],
            'jumlah'       => $item['jumlah'],
            'total_harga'  => $item['total_harga'],
            'status'       => 'pending',
        ]);
    }

Keranjang::where('user_id', $user->id)->delete();

    return redirect()->route('home')->with('success', 'Checkout berhasil! Stok diperbarui dan keranjang telah dikosongkan.');
}


    public function index()
    {
        $checkouts = Checkout::where('user_id', Auth::id())->get();
        return view('customer.history', compact('checkouts'));
    }
}
