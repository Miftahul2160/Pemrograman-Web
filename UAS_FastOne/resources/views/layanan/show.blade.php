@extends('layouts.app')
@section('title', $layanan->nama)

@section('content')
<div class="container mt-5 pt-5">
    <section id="detail-layanan" class="py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold mb-3">{{ $layanan->judul_halaman }}</h1>
                    <p class="lead text-muted mb-4">{{ $layanan->deskripsi_singkat }}</p>
                </header>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-2">
                        <img src="{{ asset('images/' . $layanan->gambar) }}" alt="{{ $layanan->nama }}" class="img-fluid rounded shadow-lg">
                    </div>
                    <div class="col-md-6">
                        <div class="fs-5">
                            {{-- Menampilkan konten utama dari database --}}
                            {!! nl2br(e($layanan->konten_lengkap)) !!}
                        </div>
                    </div>
                </div>

                @if ($layanan->slug == 'upgrade-downgrade')
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card shadow-sm h-100"><div class="card-header bg-success text-white"><h2 class="mb-0 h4"><i class="bi bi-graph-up-arrow me-2"></i>Mengapa Upgrade?</h2></div><div class="card-body"><ul class="list-group list-group-flush"><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Peningkatan Produktivitas</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Pengalaman Hiburan Lebih Baik</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Mendukung Lebih Banyak Perangkat</strong></li></ul></div></div>
                        </div>
                        <div class="col-md-6">
                             <div class="card shadow-sm h-100"><div class="card-header bg-warning text-dark"><h2 class="mb-0 h4"><i class="bi bi-graph-down-arrow me-2"></i>Kapan Downgrade?</h2></div><div class="card-body"><ul class="list-group list-group-flush"><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Efisiensi Biaya</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Perubahan Gaya Hidup</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Kebutuhan Tidak Setinggi Awal</strong></li></ul></div></div>
                        </div>
                    </div>
                    <div class="alert alert-info d-flex align-items-start my-5 p-4" role="alert">
                        <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                        <div><h4 class="alert-heading">Ketentuan Umum:</h4><ul class="mb-0 mt-2 ps-3"><li>Perubahan paket umumnya dapat dilakukan setelah periode minimum kontrak awal terpenuhi.</li><li>Perubahan akan efektif pada siklus tagihan berikutnya.</li></ul></div>
                    </div>
                @endif

                {{-- Jika halaman yang dibuka adalah "Konsultasi Pemasangan" --}}
                @if ($layanan->slug == 'konsultasi-pemasangan')
                <div class="card shadow-sm mb-4"><div class="card-header bg-primary text-white"><h2 class="mb-0 h4"><i class="bi bi-list-check me-2"></i>Apa Saja yang Anda Dapatkan?</h2></div><div class="card-body"><ul class="list-group list-group-flush"><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Analisis Kebutuhan Mendalam</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Include Perangkat Acces-Point</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Desain Topologi Jaringan</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Laporan Rekomendasi Tertulis</strong></li></ul></div></div>
                <div class="alert alert-info d-flex align-items-start my-5 p-4" role="alert">
                    <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                <div><h4 class="alert-heading">Ketentuan Umum Konsultasi:</h4><ul class="mb-0 mt-2 ps-3"><li>Biaya yang tertera adalah untuk sesi konsultasi awal dan analisis kebutuhan.</li><li>Jadwal konsultasi akan disesuaikan berdasarkan kesepakatan bersama.</li></ul></div>
                </div>
                @endif

                @if ($layanan->slug == 'konsultasi-troubleshooting')
                    <div class="card shadow-sm mb-4"><div class="card-header bg-primary text-white"><h2 class="mb-0 h4"><i class="bi bi-tools me-2"></i>Layanan Kami Meliputi:</h2></div><div class="card-body"><ul class="list-group list-group-flush"><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Diagnosa Akurat oleh Ahli Jaringan</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Penyelesaian Terhadap Dead-Zones</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Optimalisasi Kecepatan dan Stabilitas</strong></li><li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Konfigurasi Keamanan Lanjutan</strong></li></ul></div></div>
                    <div class="alert alert-warning d-flex align-items-center my-4" role="alert"><i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i><div><strong>Biaya Layanan:</strong> Biaya sesi awal mencakup diagnosa dan upaya perbaikan awal. Biaya untuk pergantian perangkat baru akan diinformasikan terpisah.</div></div>
                @endif

                <div class="text-center mt-5 p-4 bg-light rounded shadow-sm">
                    <h3 class="mb-4 fw-semibold">Ajukan Permintaan untuk Layanan Ini</h3>
                    
                    @auth
                        {{-- Form ini hanya tampil jika user sudah login --}}
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
                                        <textarea class="form-control" name="pesan" id="pesan" rows="3" placeholder="Contoh: Saya ingin upgrade paket, atau ingin konsultasi untuk kantor."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="bi bi-send-check-fill me-2"></i>Kirim Permintaan
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p>Silakan login terlebih dahulu untuk mengajukan permintaan layanan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login untuk Mengajukan</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
