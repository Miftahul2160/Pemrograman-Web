{{-- FIX: Menggunakan layout utama kita, bukan layout default Breeze --}}
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Header Dashboard --}}
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <div class="col-lg-8 px-0">
                    <h1 class="display-4 fst-italic">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="lead my-3">Hak Akses penuh dari Panel Kontrol telah diberikan!,  Panel kontrol dapat mengelola semua data paket internet dan pelanggan.</p>
                </div>
            </div>

            {{-- Kartu Navigasi Admin --}}
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">Manajemen Paket</strong>
                            <h3 class="mb-0">Kelola Paket</h3>
                            <div class="mb-1 text-body-secondary">{{ \App\Models\Paket::count() }} Paket Terdaftar</div>
                            <p class="card-text mb-auto">Lihat, Edit, atau Hapus Paket yang telah disediakan.</p>
                            <a href="{{ route('paket.index') }}" class="icon-link gap-1 icon-link-hover stretched-link">
                                Lanjutkan ke Kelola Paket
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">Manajemen Pelanggan</strong>
                            <h3 class="mb-0">Kelola Pelanggan</h3>
                            <div class="mb-1 text-body-secondary">{{ \App\Models\Pelanggan::count() }} Pelanggan Terdaftar</div>
                            <p class="mb-auto">Lihat, tambah, atau perbarui data pelanggan yang berlangganan.</p>
                            <a href="{{ route('pelanggan.index') }}" class="icon-link gap-1 icon-link-hover stretched-link">
                                Lanjutkan ke Kelola Pelanggan
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
