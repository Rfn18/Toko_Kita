<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(Kategoris::all());
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
        return response()->json(Kategoris::with('products')->findOrFail($id));
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
