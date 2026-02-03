@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if ($totalProduk == 0)
            <!-- EMPTY STATE -->
            <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="text-center col-lg-6">

                    <i class="bi bi-inbox display-1 text-muted mb-4"></i>

                    <h3 class="fw-bold mb-3">Belum Ada Data Produk</h3>
                    <p class="text-muted mb-4">
                        Saat ini belum ada produk yang tersimpan.<br>
                        Silakan ambil data atau tambahkan produk baru untuk memulai.
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('produk.index') }}" class="btn btn-primary btn-lg rounded-pill">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Produk
                        </a>

                        <form action="{{ route('produk.fetch') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-secondary btn-lg rounded-pill">
                                <i class="bi bi-cloud-download me-1"></i> Ambil Data
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @else
            <!-- DASHBOARD NORMAL -->
            <h1 class="mb-4 text-center">
                <i class="bi bi-speedometer2"></i> Dashboard Overview
            </h1>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-box-seam display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Produk</h5>
                            <p class="card-text">Total Produk</p>
                            <h2 class="fw-bold">{{ $totalProduk }}</h2>
                            <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">Lihat Produk</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-tags display-4 text-warning mb-3"></i>
                            <h5 class="card-title">Kategori</h5>
                            <p class="card-text">Total Kategori</p>
                            <h2 class="fw-bold">{{ $totalKategori }}</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="bi bi-check-circle display-4 text-success mb-3"></i>
                            <h5 class="card-title">Status</h5>
                            <p class="card-text">Total Status</p>
                            <h2 class="fw-bold">{{ $totalStatus }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
