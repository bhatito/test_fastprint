<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_status' => 'required|string|max:255',
        ], [
            'nama_status.required' => 'Nama Status wajib diisi',
        ]);

        Status::create([
            'id_status'   => Str::uuid(),
            'nama_status' => $validated['nama_status'],
        ]);

        return redirect()->back()->with('success', 'Status berhasil ditambahkan');
    }

    public function edit($id)
    {
        $status = Status::where('id_status', $id)->firstOrFail();
        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_status' => 'required|string|max:255',
        ], [
            'nama_status.required' => 'Nama Status wajib diisi',
        ]);

        Status::where('id_status', $id)->update([
            'nama_status' => $validated['nama_status'],
        ]);

        return redirect()->route('status.index')->with('success', 'Status berhasil diperbarui');
    }

    public function destroy($id)
    {
        Status::where('id_status', $id)->delete();
        return back()->with('success', 'Status berhasil dihapus');
    }
}
