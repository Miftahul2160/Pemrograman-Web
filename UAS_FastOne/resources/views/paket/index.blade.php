@extends('layouts.admin')
@section('title', 'Kelola Paket Internet')

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Paket Internet</h1>
    </div>

    {{-- Menampilkan pesan sukses setelah create, update, atau delete --}}
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
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th style="width: 220px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Looping data paket dari database --}}
                    @forelse($pakets as $paket)
                    <tr>
                        <td>{{ $paket->id }}</td>
                        <td>{{ $paket->nama }}</td>
                        <td>{!! $paket->harga !!}</td>
                        <td>
                            {{-- Tombol untuk melihat halaman detail publik --}}
                            <a href="{{ route('paket.show', $paket->slug) }}" class="btn btn-info btn-sm">Lihat</a>
                            {{-- Tombol untuk menuju form edit --}}
                            <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            {{-- Form untuk menghapus data --}}
                            <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {{-- Tampil jika tidak ada data sama sekali --}}
                    <tr>
                        <td colspan="4" class="text-center">Belum ada data paket. Silakan tambahkan paket baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
