@csrf
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Lengkap Pelanggan</label>
        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pelanggan->email ?? '') }}" required>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="telepon" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $pelanggan->telepon ?? '') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="paket_id" class="form-label">Paket Langganan</label>
        <select class="form-select" id="paket_id" name="paket_id" required>
            <option value="">Pilih Paket...</option>
            @foreach($pakets as $paket)
                <option value="{{ $paket->id }}" @selected(old('paket_id', $pelanggan->paket_id ?? '') == $paket->id)>
                    {{ $paket->nama }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <label for="alamat" class="form-label">Alamat Lengkap</label>
    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
        <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ old('tanggal_bergabung', $pelanggan->tanggal_bergabung ?? date('Y-m-d')) }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            @foreach(['Aktif', 'Tidak Aktif', 'Menunggu Pemasangan'] as $status)
                <option value="{{ $status }}" @selected(old('status', $pelanggan->status ?? '') == $status)>{{ $status }}</option>
            @endforeach
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">Simpan Data Pelanggan</button>
<a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
