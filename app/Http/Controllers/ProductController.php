<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use App\Models\Kategoris;
use App\Models\Keranjang;
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            
            // Generate nama file unik
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Simpan ke storage/app/public/products
            $path = $file->storeAs('produk', $filename, 'public');
        }

        $produk = new Product();
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->gambar = $path; 
        $produk->save();

        return redirect()->route('admin.produk.index')->with('success', 'User created successfuly');
    }

    // Detail produk
    public function show($id)
    {
        $produk = Product::with('kategori')->findOrFail($id);

        return view('products.detail', compact('produk'));;
    }

      public function edit(string $id)
    {
        $produk = Product::find($id);
        $produks = Product::where('id', '!=', $id)->get();
        $kategori = Kategoris::all();
        return view('admin.produk.edit', compact('produk', 'produks', 'kategori'));
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
