@extends('layouts.customer')
@section('title', 'Dashboard Pelanggan')

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">

    {{-- Menampilkan notifikasi sukses atau info dari controller --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        {{-- Kolom Kiri: Informasi Pengguna --}}
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header"><h4>Profil Pengguna</h4></div>
                <div class="card-body text-center d-flex flex-column">
                    <i class="bi bi-person-circle display-1 text-secondary"></i>
                    <h5 class="card-title mt-3">{{ $user->name }}</h5>
                    <p class="card-text text-muted">{{ $user->email }}</p>
                    <div class="mt-auto">
                        <p class="card-text"><small class="text-muted">Bergabung pada: {{ $user->created_at->format('d F Y') }}</small></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Detail Langganan --}}
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header"><h4>Detail Langganan Anda</h4></div>
                <div class="card-body">
                    @if($pelanggan && $pelanggan->paket)
                        <div class="alert alert-success"><h5 class="alert-heading mb-0">Status: <span class="badge bg-primary">{{ $pelanggan->status }}</span></h5></div>
                        <table class="table table-borderless table-hover">
                            <tbody>
                                <tr><th style="width: 35%;">Paket Saat Ini</th><td>: <strong>{{ $pelanggan->paket->nama }}</strong></td></tr>
                                <tr><th>Harga per Bulan</th><td>: {!! $pelanggan->paket->harga !!}</td></tr>
                                <tr><th>Tanggal Berlangganan</th><td>: {{ \Carbon\Carbon::parse($pelanggan->tanggal_bergabung)->format('d F Y') }}</td></tr>
                                <tr><th>Alamat Pemasangan</th><td>: {{ $pelanggan->alamat }}</td></tr>
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning text-center">
                            <h5 class="alert-heading">Anda Belum Memiliki Langganan Aktif</h5>
                            <a href="{{ route('home') }}#paket-core" class="btn btn-primary mt-2"><i class="bi bi-tags-fill me-2"></i>Lihat Pilihan Paket</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4>Riwayat Permintaan Layanan Anda</h4>
                </div>
                <div class="card-body">
                    @if($permintaans->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach($permintaans as $permintaan)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <h6 class="my-0">{{ $permintaan->layanan->nama }}</h6>
                                        <small class="text-muted">Diajukan pada: {{ $permintaan->created_at->format('d F Y, H:i') }}</small>
                                    </div>
                                    <span class="badge fs-6 rounded-pill bg-{{ $permintaan->status == 'Baru' ? 'primary' : ($permintaan->status == 'Selesai' ? 'success' : 'secondary') }}">
                                        {{ $permintaan->status }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-center text-muted mb-0">Anda belum pernah mengajukan permintaan layanan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
