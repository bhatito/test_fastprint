<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index', [
            'produks' => Produk::with(['kategori', 'status'])
                ->whereHas('status', function ($q) {
                    $q->where('nama_status', 'bisa dijual');
                })
                ->get(),

            'kategoris' => Kategori::all(),
            'statuses' => Status::all(),
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|regex:/^[0-9.]+$/',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'status_id'   => 'required|exists:statuses,id_status',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'harga.required'       => 'Harga wajib diisi',
            'harga.regex'          => 'Format harga tidak valid',
            'kategori_id.required' => 'Kategori wajib dipilih',
            'status_id.required'   => 'Status wajib dipilih',
        ]);
        $harga = (int) str_replace('.', '', $validated['harga']);

        Produk::create([
            'id_produk'   => Str::uuid(),
            'nama_produk' => $validated['nama_produk'],
            'harga'       => $harga,
            'kategori_id' => $validated['kategori_id'],
            'status_id'   => $validated['status_id'],
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::where('id_produk', $id)->firstOrFail();
        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required',
            'kategori_id' => 'required|exists:kategoris,id_kategori',
            'status_id'   => 'required|exists:statuses,id_status',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'harga.required'       => 'Harga wajib diisi',
            'harga.regex'          => 'Format harga tidak valid',
            'kategori_id.required' => 'Kategori wajib dipilih',
            'status_id.required'   => 'Status wajib dipilih',
        ]);

        $harga = (int) str_replace(['.', ','], '', $request->harga);

        Produk::where('id_produk', $id)->update([
            'nama_produk' => $validated['nama_produk'],
            'harga'       => $harga,
            'kategori_id' => $validated['kategori_id'],
            'status_id'   => $validated['status_id'],
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return back()->with('success', 'Produk dihapus');
    }

    public function fetch()
    {
        Artisan::call('fastprint:fetch');
        return back()->with('success', 'Data berhasil diambil');
    }
}
