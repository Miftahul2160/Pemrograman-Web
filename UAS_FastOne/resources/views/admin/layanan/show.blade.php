@extends('layouts.app')
@section('title', $layanan->nama)

@section('content')
<div class="container mt-5 pt-5">
    <section id="detail-layanan" class="py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                {{-- Bagian Header dan Deskripsi Layanan --}}
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill"><i class="bi bi-arrow-left me-1"></i>Kembali</a>
                </div>
                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold mb-3">{{ $layanan->judul_halaman }}</h1>
                </header>
                <div class="row mb-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-2">
                        <img src="{{ asset('images/' . $layanan->gambar) }}" alt="{{ $layanan->nama }}" class="img-fluid rounded shadow-lg">
                    </div>
                    <div class="col-md-6">
                        <div class="fs-5">{!! nl2br(e($layanan->konten_lengkap)) !!}</div>
                    </div>
                </div>

                {{-- Konten Spesifik untuk Setiap Layanan --}}
                @if ($layanan->slug == 'upgrade-downgrade')
                    {{-- ... (Konten detail untuk upgrade/downgrade) ... --}}
                @endif
                @if ($layanan->slug == 'konsultasi-pemasangan')
                    {{-- ... (Konten detail untuk konsultasi pemasangan) ... --}}
                @endif
                @if ($layanan->slug == 'konsultasi-troubleshooting')
                    {{-- ... (Konten detail untuk konsultasi troubleshooting) ... --}}
                @endif

                
                <div class="text-center mt-5 p-4 bg-light rounded shadow-sm">
                    <h3 class="mb-4 fw-semibold">Ajukan Permintaan untuk Layanan Ini</h3>
                    
                    @auth
                        {{-- Form ini hanya tampil jika pengguna sudah login --}}
                        <form action="{{ route('permintaan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="telepon_pengguna" class="form-label">Nomor Telepon yang Bisa Dihubungi</label>
                                        <input type="text" class="form-control" name="telepon_pengguna" id="telepon_pengguna" placeholder="Contoh: 08123456789" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pesan" class="form-label">Pesan Tambahan (Opsional)</label>
                                        <textarea class="form-control" name="pesan" id="pesan" rows="3" placeholder="Contoh: Saya ingin konsultasi untuk kantor, mohon hubungi di jam kerja."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="bi bi-send-check-fill me-2"></i>Kirim Permintaan
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        {{-- Tampil jika pengguna belum login --}}
                        <p>Silakan login terlebih dahulu untuk mengajukan permintaan layanan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login untuk Mengajukan</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
