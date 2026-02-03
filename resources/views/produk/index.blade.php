@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-box me-2"></i>Data Produk
                    </h5>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-0 py-2 px-3">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                document.querySelector('.alert-success')?.remove();
                            }, 3000);
                        </script>
                    @endif
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#modalCreateProduk">
                            <i class="bi bi-plus"></i> Tambah
                        </button>
                    </div>
                </div>
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
                                        <button class="btn btn-sm btn-warning btn-edit-trigger"
                                            data-id="{{ $p->id_produk }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusProduk{{ $p->id_produk }}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @foreach ($produks as $p)
        <div class="modal fade" id="hapusProduk{{ $p->id_produk }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('produk.destroy', $p->id_produk) }}" class="modal-content">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title text-danger fw-bold">
                            <i class="bi bi-trash me-1"></i> Hapus Produk
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        Yakin ingin menghapus produk
                        <strong>{{ $p->nama_produk }}</strong>?
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modalCreateProduk" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form method="POST" action="{{ route('produk.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" class="form-select select2-js" required>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status_id" class="form-select select2-js" required>
                                @foreach ($statuses as $s)
                                    <option value="{{ $s->id_status }}">{{ $s->nama_status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEditProduk" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <form id="formEditProduk" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-pencil-square me-1"></i> Edit Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" id="edit_nama_produk" class="form-control"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" id="edit_harga" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="kategori_id" id="edit_kategori_id" class="form-select select2-edit" required>
                                @foreach ($kategoris as $k)
                                    <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status_id" id="edit_status_id" class="form-select select2-edit" required>
                                @foreach ($statuses as $s)
                                    <option value="{{ $s->id_status }}">{{ $s->nama_status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
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


        window.addEventListener('load', () => {
            $('.select2-js').select2({
                theme: 'bootstrap-5',
                dropdownParent: $('#modalCreateProduk'),
                width: '100%'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2-js, .select2-edit').each(function() {
                $(this).select2({
                    theme: 'bootstrap-5',
                    dropdownParent: $(this).closest('.modal'),
                    width: '100%'
                });
            });

            $('body').on('click', '.btn-edit-trigger', function() {
                const btn = $(this);
                const id = btn.data('id');
                const originalHtml = btn.html();

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

                $.get(`/produk/${id}/edit`, function(data) {
                        $('#formEditProduk').attr('action', `/produk/${data.id_produk}`);
                        $('#edit_nama_produk').val(data.nama_produk);
                        $('#edit_harga').val(data.harga);
                        $('#edit_kategori_id').val(data.kategori_id).trigger('change');
                        $('#edit_status_id').val(data.status_id).trigger('change');

                        $('#modalEditProduk').modal('show');
                    })
                    .fail(() => alert("Gagal mengambil data!"))
                    .always(() => btn.prop('disabled', false).html(originalHtml));
            });
        });
    </script>
@endpush
