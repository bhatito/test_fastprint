@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        @if ($totalProduk == 0)
            <div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
                <div class="text-center col-lg-6">
                    <i class="bi bi-inbox display-1 text-muted mb-4 d-block"></i>
                    <h3 class="fw-bold mb-3">Belum Ada Data Produk</h3>
                    <p class="text-muted mb-4">
                        Saat ini belum ada produk yang tersimpan.<br>
                        Silakan ambil data atau tambahkan produk baru untuk memulai.
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('produk.index') }}" class="btn btn-primary btn-lg rounded-pill px-4">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                        </a>

                        <form action="{{ route('produk.fetch') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-lg rounded-pill px-4">
                                <i class="bi bi-cloud-download me-2"></i>Ambil Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="bi bi-box-seam display-4 text-primary mb-3 d-block"></i>
                            <h5 class="card-title text-muted">Total Produk</h5>
                            <h2 class="display-5 fw-bold mb-3">{{ $totalProduk }}</h2>
                            <a href="{{ route('produk.index') }}" class="btn btn-primary w-100">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="bi bi-tags display-4 text-warning mb-3 d-block"></i>
                            <h5 class="card-title text-muted">Total Kategori</h5>
                            <h2 class="display-5 fw-bold mb-3">{{ $totalKategori }}</h2>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary w-100">Lihat Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <i class="bi bi-check-circle display-4 text-success mb-3 d-block"></i>
                            <h5 class="card-title text-muted">Total Status</h5>
                            <h2 class="display-5 fw-bold mb-3">{{ $totalStatus }}</h2>
                            <a href="{{ route('status.index') }}" class="btn btn-primary w-100">Lihat Status</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm border-top border-4 border-info text-center">
                        <div class="card-body p-4">
                            <i class="bi bi-arrow-repeat display-4 text-info mb-3 d-block"></i>
                            <h5 class="card-title fw-bold">Sinkronisasi Data</h5>
                            <p class="small text-muted mb-3">Perbarui data produk dari sumber eksternal.</p>
                            <form action="{{ route('produk.fetch') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info text-white w-100">
                                    <i class="bi bi-sync me-1"></i> Sinkron Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
