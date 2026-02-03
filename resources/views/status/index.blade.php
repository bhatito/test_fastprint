@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0"><i class="bi bi-check-circle me-2"></i>Data Status</h5>

                    @if (session('success'))
                        <div class="alert alert-success py-2 px-3 mb-0">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                document.querySelector('.alert-success')?.remove();
                            }, 3000);
                        </script>
                    @endif

                    <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCreateStatus">
                        <i class="bi bi-plus"></i> Tambah
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="statusTable" class="table table-hover align-middle w-100">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $s)
                                <tr>
                                    <td class="fw-semibold">{{ $s->nama_status }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning btn-edit-trigger"
                                            data-id="{{ $s->id_status }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusStatus{{ $s->id_status }}">
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

    @foreach ($statuses as $s)
        <div class="modal fade" id="hapusStatus{{ $s->id_status }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <form method="POST" action="{{ route('status.destroy', $s->id_status) }}" class="modal-content">
                    @csrf @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title text-danger fw-bold">Hapus Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin menghapus status <strong>{{ $s->nama_status }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="modalCreateStatus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('status.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Status</label>
                        <input type="text" name="nama_status" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEditStatus" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEditStatus" method="POST" class="modal-content">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Status</label>
                        <input type="text" name="nama_status" id="edit_nama_status" class="form-control" required>
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
            $('#statusTable').DataTable({
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
            $('body').on('click', '.btn-edit-trigger', function() {
                const btn = $(this);
                const id = btn.data('id');
                const originalHtml = btn.html();

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span>');

                $.get(`/status/${id}/edit`, function(data) {
                        $('#formEditStatus').attr('action', `/status/${data.id_status}`);
                        $('#edit_nama_status').val(data.nama_status);
                        $('#modalEditStatus').modal('show');
                    })
                    .fail(() => alert("Gagal mengambil data status."))
                    .always(() => btn.prop('disabled', false).html(originalHtml));
            });
        });
    </script>
@endpush
