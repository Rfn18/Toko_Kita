<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));;
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
            'gambar'      => 'required',
        ]);

        $produk = Product::create($request->all());

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data'    => $produk
        ]);
    }

    // Detail produk
    public function show($id)
    {
        $product = Product::with('kategori')->findOrFail($id);

        return view('products.detail', compact('product'));;
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'data'    => $product
        ]);
    }

    // Hapus produk
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json([
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}
