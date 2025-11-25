<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(Kategori::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori = Kategori::create($request->all());

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data'    => $kategori
        ]);
    }

    public function show($id)
    {
        return response()->json(Kategori::with('products')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data'    => $kategori
        ]);
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return response()->json([
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
