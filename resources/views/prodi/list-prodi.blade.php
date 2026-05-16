<x-layout title="List Prodi">
<style>
    [data-theme="dark"] .table {
        --bs-table-color: #e0e0e0;
        --bs-table-bg: transparent;
        --bs-table-border-color: #2e2e2e;
        --bs-table-hover-bg: rgba(255, 255, 255, 0.05);
    }
    [data-theme="dark"] .card {
        background-color: #1e1e1e;
        border-color: #2e2e2e !important;
        color: #e0e0e0;
    }
    [data-theme="dark"] thead {
        background-color: #252525;
        color: #aaa;
    }
    [data-theme="dark"] .alert-success {
        background-color: #1a3a2a;
        border-color: #2d6a4a;
        color: #6fcf97;
    }
    [data-theme="dark"] .btn-outline-secondary {
        color: #aaa;
        border-color: #555;
    }
    [data-theme="dark"] .btn-outline-secondary:hover {
        background-color: #333;
        color: #e0e0e0;
    }
    .foto-prodi {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }
    .foto-placeholder {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background-color: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
    }
    [data-theme="dark"] .foto-placeholder {
        background-color: #2e2e2e;
    }
    [data-theme="dark"] .foto-prodi {
        border-color: #2e2e2e;
    }
</style>

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 fw-semibold mb-0">List Prodi</h1>
        <a href="/prodi/create" class="btn btn-primary btn-sm">+ Tambah Prodi</a>
    </div>

    @session('Success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('Success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endsession

    <div class="card border">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 70px;">Foto</th>
                        <th>Nama Prodi</th>
                        <th>Nama Kaprodi</th>
                        <th style="width: 190px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prodi as $item)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->photo_kaprodi)
                                    <img src="{{ asset('storage/' . $item->photo_kaprodi) }}"
                                         alt="Foto {{ $item->nama_prodi }}"
                                         class="foto-prodi">
                                @else
                                    <div class="foto-placeholder">📷</div>
                                @endif
                            </td>
                            <td class="fw-medium">{{ $item->nama_prodi }}</td>
                            <td>{{ $item->nama_kaprodi }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="/prodi/{{ $item->id }}" class="btn btn-outline-secondary btn-sm">Detail</a>
                                    <a href="/prodi/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/prodi/{{ $item->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus prodi ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada data prodi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>