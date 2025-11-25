<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Tampilkan semua item di keranjang user
    public function index()
    {
        $keranjang = Keranjang::with('product')->get();
        return response()->json($keranjang);
    }

    // Tambah item ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'jumlah'     => 'required|integer|min:1',
        ]);

        $item = Keranjang::create($request->all());

        return response()->json([
            'message' => 'Berhasil menambahkan ke keranjang',
            'data'    => $item
        ]);
    }

    public function show() {
        
    }

    // Update jumlah item
    public function update(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);

        $item->update([
            'jumlah' => $request->jumlah
        ]);

        return response()->json([
            'message' => 'Jumlah berhasil diperbarui',
            'data'    => $item
        ]);
    }

    // Hapus item dari keranjang
    public function destroy($id)
    {
        Keranjang::destroy($id);

        return response()->json([
            'message' => 'Item berhasil dihapus dari keranjang'
        ]);
    }
}
