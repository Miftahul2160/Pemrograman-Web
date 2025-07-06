@extends('layouts.app')

@section('title', 'Upgrade & Downgrade Paket - FAST ONE')

@section('content')
<div class="container mt-5 pt-5">
    <section id="detail-layanan-upgrade-downgrade" class="py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <div class="mb-4">
                    <a href="{{ route('home') }}#layanan" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Layanan
                    </a>
                </div>

                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold mb-3">Fleksibilitas Upgrade & Downgrade Paket Internet</h1>
                    <p class="lead text-muted mb-4">Sesuaikan kecepatan internet Anda dengan kebutuhan yang berubah.</p>
                </header>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-2">
                        <img src="{{ asset('images/upgrade-downgrade-hero.jpg') }}" alt="Upgrade Downgrade Paket FAST ONE" class="img-fluid rounded shadow-lg">
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <p class="fs-5">Di FAST ONE, kami memahami bahwa kebutuhan internet Anda dapat berubah seiring waktu. Mungkin Anda memerlukan kecepatan lebih tinggi untuk mendukung aktivitas baru, atau sebaliknya, ingin menyesuaikan pengeluaran dengan paket yang lebih hemat. Layanan upgrade dan downgrade paket kami dirancang untuk memberikan Anda fleksibilitas maksimal.</p>
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-success text-white">
                                <h2 class="mb-0 h4"><i class="bi bi-graph-up-arrow me-2"></i>Mengapa Melakukan Upgrade Paket?</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Peningkatan Produktivitas:</strong> Kecepatan lebih tinggi untuk WFH, belajar online, atau menjalankan bisnis.</li>
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Pengalaman Hiburan Lebih Baik:</strong> Streaming video 4K/8K tanpa buffering, gaming online lebih lancar.</li>
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Mendukung Lebih Banyak Perangkat:</strong> Jika jumlah perangkat terhubung di rumah/kantor bertambah.</li>
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Kebutuhan Khusus:</strong> Upload file besar lebih cepat, menjalankan server pribadi, dll.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-warning text-dark">
                                <h2 class="mb-0 h4"><i class="bi bi-graph-down-arrow me-2"></i>Kapan Sebaiknya Melakukan Downgrade Paket?</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Efisiensi Biaya:</strong> Jika penggunaan internet Anda tidak lagi seintensif dulu dan ingin mengurangi pengeluaran bulanan.</li>
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Perubahan Gaya Hidup:</strong> Misalnya, jika anak-anak sudah tidak tinggal di rumah atau aktivitas online berkurang.</li>
                                    <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-warning me-2"></i><strong>Kebutuhan Tidak Setinggi Perkiraan Awal:</strong> Jika paket saat ini dirasa terlalu tinggi untuk penggunaan aktual.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h2 class="mb-4 text-center fw-semibold"><i class="bi bi-arrow-repeat text-primary me-2"></i>Proses Upgrade & Downgrade yang Mudah:</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 text-center border-0 shadow-sm p-3">
                                <div class="card-body d-flex flex-column">
                                    <i class="bi bi-person-lines-fill display-3 text-primary mb-3"></i>
                                    <h5 class="card-title fw-semibold mt-auto">1. Hubungi Kami</h5>
                                    <p class="card-text text-muted small">Sampaikan keinginan Anda melalui Call Center, WhatsApp, atau kunjungi kantor layanan kami.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 text-center border-0 shadow-sm p-3">
                                <div class="card-body d-flex flex-column">
                                    <i class="bi bi-card-checklist display-3 text-primary mb-3"></i>
                                    <h5 class="card-title fw-semibold mt-auto">2. Pilih Paket Baru</h5>
                                    <p class="card-text text-muted small">Tim kami akan membantu Anda memilih paket yang paling sesuai dengan kebutuhan dan budget terbaru Anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 text-center border-0 shadow-sm p-3">
                                <div class="card-body d-flex flex-column">
                                    <i class="bi bi-calendar-check display-3 text-primary mb-3"></i>
                                    <h5 class="card-title fw-semibold mt-auto">3. Konfirmasi & Aktivasi</h5>
                                    <p class="card-text text-muted small">Setelah konfirmasi, perubahan paket akan diproses dan diaktifkan sesuai jadwal.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5 p-4 bg-light rounded shadow-sm">
                    <h3 class="mb-4 fw-semibold">Siap Menyesuaikan Paket Internet Anda?</h3>
                    <a href="{{ route('home') }}#kontak" class="btn btn-primary btn-lg me-md-2 mb-2 mb-md-0">
                        <i class="bi bi-telephone-forward-fill me-2"></i>Hubungi Customer Service
                    </a>
                    <a href="{{ route('home') }}#paket-core" class="btn btn-outline-secondary btn-lg mb-2">
                        <i class="bi bi-tags-fill me-2"></i>Lihat Pilihan Paket Lainnya
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
