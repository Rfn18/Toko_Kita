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
        $user = Auth::user();
        $request->validate([
            'alamat' => 'required|string|max:255',
            'items'  => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.jumlah'     => 'required|integer|min:1',
            'items.*.total_harga'=> 'required|numeric|min:0',
        ]);


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
                'alamat'       => $request->alamat,
                'status'       => 'pending',
            ]);
        }

            Keranjang::where('user_id', $user->id)->delete();
            
            
            return redirect()->back()->with('success', 'Checkout berhasil!');
        }


    public function index()
    {
        $checkouts = Checkout::where('user_id', Auth::id())->with('product')->get();
        return view('customer.history', compact('checkouts'));
    }
}
