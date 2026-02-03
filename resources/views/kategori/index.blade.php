@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0"><i class="bi bi-tag me-2"></i>Data Kategori</h5>

                    @if (session('success'))
                        <div class="alert alert-success py-2 px-3 mb-0">
                            {{ session('success') }}
                        </div>
                    @endif

                    <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCreateKategori">
                        <i class="bi bi-plus"></i> Tambah
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="kategoriTable" class="table table-hover align-middle w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Kategori</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $k)
                                <tr>
                                    <td class="fw-semibold">{{ $k->nama_kategori }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning btn-edit-trigger"
                                            data-id="{{ $k->id_kategori }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusKategori{{ $k->id_kategori }}">
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

    {{-- Modal Delete --}}
    @foreach ($kategoris as $k)
        <div class="modal fade" id="hapusKategori{{ $k->id_kategori }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('kategori.destroy', $k->id_kategori) }}" class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title text-danger fw-bold">Hapus Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus kategori <strong>{{ $k->nama_kategori }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    {{-- Modal Create --}}
    <div class="modal fade" id="modalCreateKategori" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('kategori.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEditKategori" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEditKategori" method="POST" class="modal-content">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="edit_nama_kategori" class="form-control" required>
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
        $(document).ready(function() {
            const table = $('#kategoriTable').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: 1
                }],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data"
                }
            });

            // 2. Logic Edit AJAX
            $('body').on('click', '.btn-edit-trigger', function() {
                const btn = $(this);
                const id = btn.data('id');
                const originalHtml = btn.html();

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

                $.get(`/kategori/${id}/edit`, function(data) {
                        $('#formEditKategori').attr('action', `/kategori/${data.id_kategori}`);
                        $('#edit_nama_kategori').val(data.nama_kategori);
                        $('#modalEditKategori').modal('show');
                    })
                    .fail(() => alert("Gagal mengambil data!"))
                    .always(() => btn.prop('disabled', false).html(originalHtml));
            });
        });
    </script>
@endpush
