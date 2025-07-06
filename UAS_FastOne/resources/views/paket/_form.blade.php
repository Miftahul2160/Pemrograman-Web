@csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama Paket</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $paket->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $paket->slug ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $paket->harga ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="gambar" class="form-label">Nama File Gambar (cth: paket-basic-hero.jpg)</label>
    <input type="text" class="form-control" id="gambar" name="gambar" value="{{ old('gambar', $paket->gambar ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="judul" class="form-label">Judul Halaman Detail</label>
    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $paket->judul ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $paket->deskripsi ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="fitur" class="form-label">Fitur (pisahkan dengan baris baru/enter)</label>
    {{-- Kita ubah array menjadi string dengan pemisah baris baru --}}
    <textarea class="form-control" id="fitur" name="fitur" rows="5" required>{{ old('fitur', isset($paket->fitur) ? implode("\n", $paket->fitur) : '') }}</textarea>
</div>
<button type="submit" class="btn btn-primary">Simpan Paket</button>
