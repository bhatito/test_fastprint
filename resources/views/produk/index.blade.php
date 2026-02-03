@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">
                    <i class="bi bi-box me-2"></i>Data Produk
                </h5>
                <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCreateProduk">
                    <i class="bi bi-plus"></i> Tambah
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="produkTable" class="table table-hover align-middle w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $p)
                                <tr>
                                    <td class="fw-semibold">{{ $p->nama_produk }}</td>
                                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                    <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                                    <td>
                                        @if ($p->status->nama_status == 'bisa dijual')
                                            <span class="badge bg-success-subtle text-success border border-success">
                                                {{ $p->status->nama_status }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger border border-danger">
                                                {{ $p->status->nama_status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener('load', () => {
            const table = $('#produkTable').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10,
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "_START_–_END_ dari _TOTAL_",
                    paginate: {
                        next: "›",
                        previous: "‹"
                    }
                }
            });

            table.columns.adjust().responsive.recalc();
        });
    </script>
@endpush
