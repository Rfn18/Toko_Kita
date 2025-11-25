<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'gambar' => 'required|image|max:5120'
        ]);

        $uploadedFileUrl = Cloudinary::upload($request->file('gambar')->getRealPath())->getSecurePath();

         $produk = Product::create([
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'gambar'      => $uploadedFileUrl
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'User created successfuly');
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

        return redirect()->route('admin.produk.index')->with('success', 'User Deleted Successfully');
    }
}
