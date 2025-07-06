@extends('layouts.admin')
@section('title', 'Kelola Permintaan Layanan')

@section('content')
<div class="container mt-5 pt-5">
    <h1>Kelola Permintaan Layanan</h1>
    <p>Daftar permintaan yang masuk dari pelanggan untuk layanan konsultasi jaringan, upgrade/downgrade.</p>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemohon</th>
                <th>Layanan yang Diminta</th>
                <th>Status</th>
                <th>Tanggal Masuk</th>
                <th style="width: 120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permintaans as $permintaan)
            <tr>
                <td>{{ $permintaan->id }}</td>
                <td>{{ $permintaan->user->name }} <br><small class="text-muted">{{ $permintaan->user->email }}</small></td>
                <td>{{ $permintaan->layanan->nama }}</td>
                <td><span class="badge bg-{{ $permintaan->status == 'Baru' ? 'primary' : ($permintaan->status == 'Selesai' ? 'success' : 'secondary') }}">{{ $permintaan->status }}</span></td>
                <td>{{ $permintaan->created_at->format('d M Y, H:i') }}</td>
                <td>
                    <a href="{{ route('permintaan.edit', $permintaan->id) }}" class="btn btn-warning btn-sm">Proses</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada permintaan layanan yang masuk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection