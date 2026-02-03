<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ProdukController extends Controller
{
    public function index()
    {
        $data = [
            'produks' => Produk::with(['kategori', 'status'])->get(),
            'kategoris' => Kategori::all(),
            'statuses' => Status::all(),
            'totalProduk' => Produk::count(),
            'totalKategori' => Kategori::count(),
            'totalStatus' => Status::count(),
        ];
        return view('produk.index', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'status_id' => 'required|exists:statuses,id_status',
        ]);
        Produk::create($validated);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);
        $produk->update($validated);
        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        $produk = Produk::findOrFail($request->id_produk);
        $produk->delete();
        return back()->with('success', 'Berhasil dihapus');
    }


    public function fetch()
    {
        Artisan::call('fastprint:fetch');

        return redirect()->back()->with('success', 'Data produk berhasil diambil');
    }
}
