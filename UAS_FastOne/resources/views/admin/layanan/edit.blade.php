@extends('layouts.admin')
@section('title', 'Edit Layanan: ' . $layanan->nama)

@section('content')
<div class="container mt-5 pt-5">
    <h1>Edit Layanan: {{ $layanan->nama }}</h1>
    <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul_halaman" class="form-label">Judul Halaman</label>
            <input type="text" class="form-control" id="judul_halaman" name="judul_halaman" value="{{ old('judul_halaman', $layanan->judul_halaman) }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
            <input type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" value="{{ old('deskripsi_singkat', $layanan->deskripsi_singkat) }}">
        </div>
        <div class="mb-3">
            <label for="konten_lengkap" class="form-label">Konten Lengkap Halaman</label>
            <textarea class="form-control" id="konten_lengkap" name="konten_lengkap" rows="10">{{ old('konten_lengkap', $layanan->konten_lengkap) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection