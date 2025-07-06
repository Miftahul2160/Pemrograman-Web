@extends('layouts.admin')
@section('title', 'Proses Permintaan Layanan')

@section('content')
<div class="container mt-5 pt-5">
    <h1>Proses Permintaan #{{ $permintaan->id }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Pemohon:</strong> {{ $permintaan->user->name }} ({{ $permintaan->user->email }})</p>
            <p><strong>Telepon:</strong> {{ $permintaan->telepon_pengguna }}</p>
            <p><strong>Layanan:</strong> {{ $permintaan->layanan->nama }}</p>
            <p><strong>Pesan:</strong> {{ $permintaan->pesan ?? '-' }}</p>
            <hr>
            <form action="{{ route('permintaan.update', $permintaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="status" class="form-label">Ubah Status Permintaan:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Baru" @selected($permintaan->status == 'Baru')>Baru</option>
                        <option value="Sudah Dihubungi" @selected($permintaan->status == 'Sudah Dihubungi')>Sudah Dihubungi</option>
                        <option value="Selesai" @selected($permintaan->status == 'Selesai')>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
        </div>
    </div>
</div>
@endsection