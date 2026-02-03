<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProduk' => \App\Models\Produk::count(),
            'totalKategori' => \App\Models\Kategori::count(),
            'totalStatus' => \App\Models\Status::count(),
        ]);
    }
}
