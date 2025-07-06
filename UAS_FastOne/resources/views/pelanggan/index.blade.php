@extends('layouts.admin')
@section('title', 'Kelola Pelanggan')

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Paket Langganan</th>
                        <th>Status</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->id }}</td>
                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        {{-- Mengambil nama paket melalui relasi --}}
                        <td>{{ $pelanggan->paket->nama ?? 'Paket Dihapus' }}</td>
                        <td><span class="badge bg-{{ $pelanggan->status == 'Aktif' ? 'success' : 'warning' }}">{{ $pelanggan->status }}</span></td>
                        <td>
                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data pelanggan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
