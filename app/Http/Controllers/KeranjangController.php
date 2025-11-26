<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Tampilkan semua item di keranjang user
    public function index()
    {
        $keranjang = Keranjang::with('product')->get();
        $subtotal = Keranjang::with('product')
                        ->get()
                        ->sum(function ($item) {
                            return $item->product->harga * $item->jumlah;
                        });
        $countItems = Keranjang::get()->sum(function ($item) {
                            return $item->jumlah;
                        });
        return view('customer.cart', compact('keranjang', 'subtotal', 'countItems'));
    }

    // Tambah item ke keranjang
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $keranjang = Keranjang::where('user_id', Auth::id())
                                ->where('product_id', $product_id)
                                ->first();
        if ($keranjang) {

            $keranjang->jumlah += 1;
            $keranjang->save();
        } else {
            Keranjang::create([
            'user_id' => Auth::id(),
            'product_id' => $product_id,
            'jumlah' => 1
        ]);
        }
          return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function tambahBanyak(Request $request)
    {       
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        $product_id = $request->product_id;
        $qty = $request->qty;

        $keranjang = Keranjang::where('user_id', Auth::id())
                                ->where('product_id', $product_id)
                                ->first();

        if ($keranjang) {
            $keranjang->jumlah += $qty;
            $keranjang->save();
        } else {
            Keranjang::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'jumlah' => $qty
            ]);
        }

       return response()->json([
            'success' => true,
            'message' => 'Berhasil tambah keranjang'
        ]);
    }   


    public function minJumlah($id) {
        $item = Keranjang::findOrFail($id);

        if ($item->jumlah > 1) {
            $item->jumlah -= 1;
            $item->save();
        } else {
            $item->delete();
        }

        return redirect()->back()->with('success', 'Jumlah produk berhasil dikurangi');
    }    

 // Hapus item dari keranjang
    public function destroy($id)
    {
        Keranjang::destroy($id);

         return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
