@extends('layouts.admin')
@section('title', 'Kelola Halaman Layanan')

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kelola Halaman Layanan</h1>
    </div>

    <p>Admin berhak untuk mengedit konten dari halaman layanan statis seperti "Upgrade & Downgrade" dan "Konsultasi".</p>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Layanan</th>
                        <th>Judul Halaman</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanans as $layanan)
                    <tr>
                        <td>{{ $layanan->nama }}</td>
                        <td>{{ $layanan->judul_halaman }}</td>
                        <td>
                            <a href="{{ route('layanan.show', $layanan->slug) }}" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                            <a href="{{ route('layanan.edit', $layanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data layanan. Jalankan seeder.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
