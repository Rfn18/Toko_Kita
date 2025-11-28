<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use App\Models\Kategoris;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
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

        return redirect()->route('admin.produk.index')->with('success', 'PRoduct created successfuly');
    }

    public function show($id)
    {
        $produk = Product::with('kategori')->findOrFail($id);
        $countItems = Keranjang::get()->sum(function ($item) {
                            return $item->jumlah;
                        });

        return view('products.detail', compact('produk', 'countItems'));;
    }

      public function edit(string $id)
    {       
        $produk = Product::find($id);
        $produks = Product::where('id', '!=', $id)->get();
        $kategori = Kategoris::all();
        return view('admin.produk.edit', compact('produk', 'produks', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required',
            'deskripsi'   => 'required',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120'
        ]); 

        if ($request->hasFile('gambar')) {

            if($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('produk', $filename, 'public');

            $produk->gambar = $path;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();        

        return redirect()->route('admin.produk.index')->with('success', 'Pooduct Edited successfuly');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('nama');

        $products = Product::where('nama_produk', 'LIKE', "%{$keyword}%")
            ->orWhere('deskripsi', 'LIKE', "%{$keyword}%")
            ->get();

        return view('products.search', compact('products', 'keyword'));
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('admin.produk.index')->with('success', 'Product Deleted Successfully');
    }
}
