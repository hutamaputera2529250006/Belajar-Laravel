<x-layout title="edit-fakultas">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 fw-semibold mb-0">EDIT PRODI</h1>
        <a href="/prodi" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>
    <div class="card border p-4">
        <form action="/prodi/{{ $prodi->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas_id" class="form-select">
                <option value="">Pilih Fakultas</option>
                @foreach ($fakultas as $item)
                    <option value="{{ $item->id }}" {{ $prodi->fakultas_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input name="nama_prodi" type="text" class="form-control" value="{{ $prodi->nama_prodi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Kaprodi</label>
                <input name="nama_kaprodi" type="text" class="form-control" value="{{ $prodi->nama_kaprodi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Kaprodi</label>

                {{-- klo ada foto lama kalau ada --}}
                @if ($prodi->photo_kaprodi)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $prodi->photo_kaprodi) }}"
                             alt="Foto saat ini"
                             style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                        <small class="text-muted d-block mt-1">Foto saat ini</small>
                    </div>
                @endif
                {{-- input foto baru --}}
                <input name="photo_kaprodi" type="file" accept="image/*" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>

        </form>
    </div>
</x-layout>