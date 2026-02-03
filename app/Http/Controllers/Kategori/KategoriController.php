<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('Kategori.index', compact('kategoris'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ], [
            'nama_kategori.required' => 'Nama Kategori wajib diisi',
        ]);

        Kategori::create([
            'id_kategori'   => Str::uuid(),
            'nama_kategori' => $validated['nama_kategori'],

        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $Kategori = Kategori::where('id_kategori', $id)->firstOrFail();
        return response()->json($Kategori);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ], [
            'nama_kategori.required' => 'Nama Kategori wajib diisi',
        ]);

        Kategori::where('id_kategori', $id)->update([
            'nama_kategori' => $validated['nama_kategori'],
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return back()->with('success', 'Kategori dihapus');
    }
}
