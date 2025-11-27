<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategoris::withCount('products')->get();
        return view("products.kategori.index", compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori = Kategoris::create($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategory Create Successfully');
    }

    public function show($id)
    {
        $kategori = Kategoris::with('products')->findOrFail($id);
        $detailKategori = Kategoris::withCount('products')->findOrFail($id);
        $countItems = Keranjang::get()->sum(function ($item) {
                            return $item->jumlah;
                        });
        return view('products.kategori.detail', compact('kategori', 'detailKategori', 'countItems'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategoris::findOrFail($id);
        $kategori->update($request->all());

         return redirect()->route('admin.kategori.index')->with('success', 'Kategory Updated Successfully');
    }

    public function destroy($id)
    {
        Kategoris::destroy($id);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategory Deleted Successfully');
    }
}
