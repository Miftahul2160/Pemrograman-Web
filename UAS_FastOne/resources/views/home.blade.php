@extends('layouts.app')
@section('title', 'FAST ONE - Solusi Internet No Lag')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#beranda">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Brand" width="120" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a href="#beranda" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tentang-kita" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Tentang Kita</a>
                    </li>
                    <li class="nav-item">
                        <a href="#layanan" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#paket-core" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Pricelist paket</a>
                    </li>
                    <li class="nav-item">
                        <a href="#konsultasi-jaringan" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill" >Pricelist konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lokasi" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Lokasi</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Admin Dashboard</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('akun.saya') }}">Akun Saya</a></li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary ms-4">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary ms-2">Register</a>
                    </li>
                @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        {{-- Hero Section --}}
        <section id="beranda" class="text-center d-flex align-items-center"
            style="background-image: url('{{ asset('images/laptop-internet.jpg') }}'); background-size: cover; min-height: 100vh; color: white;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold" style="text-shadow: 2px 2px 5px black;">Selamat Datang FAST ONERS</h1>
                        <p class="lead my-4" style="text-shadow: 2px 2px 5px black;">Solusi Internet No Lag karya Anak Bangsa</p>
                        <a href="#layanan" class="btn btn-primary btn-lg me-2">Lihat Layanan</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- About Us Section --}}
        <section id="tentang-kita" class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 slide-in-left">
                        <h2 class="mb-4 fw-bold">Tentang Kita</h2>
                        <p>Visi Fast One: internet di indonesia dapat dikelola dengan Efektif dan Handal, dengan itu Kami Fast One menyediakan wadah untuk mempercepat laju Internet di indonesia sampai ke pelosok Daerah.</p>
                        <p>Misi Fast One: menyediakan solusi yang handal, efisien, dan terjangkau untuk Akses internet diseluruh negeri dan juga menjadi New-Rookie di industri broadband Internet dedicated.</p>
                    </div>
                    <div class="col-md-6 text-center slide-in-right">
                        <img src="{{ asset('images/about-us.jpg') }}" alt="Tim Fast One"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>

        {{-- Services Section --}}
        <section id="layanan" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold slide-in-left">Layanan Kami</h2>
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded-4 p-3 border-0 slide-in-right">
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <i class="bi bi-wifi display-4 text-primary mb-3"></i>
                                <h5 class="card-title fw-semibold">Jasa Pasang Wifi SUPER Cepat</h5>
                                <p class="card-text text-muted">Nikmati koneksi internet super cepat dan stabil untuk rumah dan bisnis Anda.</p>
                                <a href="#paket-core" class="btn btn-primary mt-auto rounded-pill px-4">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded-4 p-3 border-0 slide-in-right">
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <i class="bi bi-tv display-4 text-success mb-3"></i>
                                <h5 class="card-title fw-semibold">Upgrade & Downgrade Kecepatan</h5>
                                <p class="card-text text-muted">Layanan upgrade/downgrade kecepatan internet kami selalu ada di tangan Anda.</p>
                                <a href="{{ route('layanan.show', 'upgrade-downgrade') }}" class="btn btn-success mt-auto rounded-pill px-4">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm rounded-4 p-3 border-0 slide-in-right">
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <i class="bi bi-headset display-4 text-danger mb-3"></i>
                                <h5 class="card-title fw-semibold">Layanan Konsultasi Jaringan</h5>
                                <p class="card-text text-muted">Kami menyediakan layanan Konsultasi Jaringan Wifi Terpadu yang Professional.</p>
                                <a href="#konsultasi-jaringan" class="btn btn-danger mt-auto rounded-pill px-4">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Core Packages Section --}}
        <section id="paket-core" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold">Paket Core FAST ONE</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
                    @php
                        $packages = [
                            ['slug' => 'basic', 'name' => 'Basic (Normal Punch)', 'price' => '180.000', 'features' => ['Simetris Up To 20 Mbps', 'Layanan Call Center 24/7', 'Free Disney Hotstar 3 Bulan']],
                            ['slug' => 'standard', 'name' => 'Standard (Sharp Punch)', 'price' => '280.000', 'features' => ['Simetris Up To 30 Mbps', 'Layanan Call Center 24/7', 'Free Netflix & VIU 6 Bulan']],
                            ['slug' => 'pro', 'name' => 'Pro (Heavy Punch)', 'price' => '400.000', 'features' => ['Simetris Up To 50 Mbps', 'Teknisi Live Caller', 'Akses Cloud 20GB (6 Bulan)', 'Custom Access Point Device']],
                            ['slug' => 'hemat', 'name' => 'Hemat (Ratio Punch)', 'price' => '150.000', 'features' => ['Simetris Up To 20 Mbps (FUP 400 GB)', 'Free biaya Registrasi']],
                            ['slug' => 'bisnis', 'name' => 'Bisnis (Professional Punch)', 'price' => '600.000', 'features' => ['Simetris Up To 100 Mbps', 'Teknisi On-Home 24/7', 'Akses Cloud 50GB (2 Tahun)', 'Add-on Switch/Mikrotik Controller']],
                            ['slug' => 'premium', 'name' => 'Premium (SUPER Punch)', 'price' => '850.000', 'features' => ['Semua Fitur Paket Bisnis', 'Simetris Up To 300 Mbps', 'Dedicated Line', 'Premium Care Fast-One', 'On-demand 3 Server Fast-One']],
                            ['slug' => 'enterprise', 'name' => 'Enterprise (Anomaly Punch)', 'price' => 'Custom', 'features' => ['Semua Fitur Paket Premium', 'Simetris Up To 1 Gbps', 'Konsultasi Professional', 'Fast-One Hosting 4 Tahun', 'SLA Terjamin', 'Add-On Custom Switch & Router by Ruijie']],
                        ];
                    @endphp

                    @foreach ($packages as $paket)
                        <div class="col">
                            <div class="card h-100 shadow-sm rounded-4 p-3 {{ isset($paket['is_primary']) ? 'border-primary' : 'border-0' }}">
                                <div class="card-header bg-transparent {{ isset($paket['is_primary']) ? 'bg-primary text-white' : '' }} fw-bold border-0">{{ $paket['name'] }}</div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title pricing-card-title mb-3">
                                        @if($paket['price'] == 'Custom')
                                            {{ $paket['price'] }} <small class="text-muted fw-light">/hubungi</small>
                                        @else
                                            Rp {{ $paket['price'] }} <small class="text-muted fw-light">/bulan</small>
                                        @endif
                                    </h5>
                                    <ul class="list-unstyled mb-4 text-start">
                                        @foreach ($paket['features'] as $feature)
                                            <li>✔ {{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('paket.show', ['slug' => $paket['slug']]) }}" class="btn btn-outline-primary mt-auto rounded-pill">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Consultation Section --}}
        <section id="konsultasi-jaringan" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold">Konsultasi Jaringan Wifi</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-5">
                        <div class="card h-100 shadow-sm rounded-4 p-3 border-0">
                            <div class="card-header bg-transparent fw-bold border-0">Konsultasi Pemasangan Wifi</div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title pricing-card-title mb-3">Rp 500.000<small class="text-muted fw-light">/Konsultasi</small></h5>
                                <ul class="list-unstyled mb-4 text-start">
                                    <li>✔ Bundle Wifi TP-Link AC</li>
                                    <li>✔ Edukasi Jaringan Wifi User</li>
                                    <li>✔ Solusi ISP yang akurat dan efisien</li>
                                    <li>✔ Desain Topology yang Terkoordinasi dan Future Proof</li>
                                </ul>
                                <a href="{{ route('layanan.show', 'konsultasi-pemasangan') }}" class="btn btn-outline-primary mt-auto rounded-pill">Pilih Layanan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card h-100 shadow-sm rounded-4 p-3 border-0">
                            <div class="card-header bg-transparent fw-bold border-0">Konsultasi Troubleshooting Wifi</div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title pricing-card-title mb-3">Rp 750.000<small class="text-muted fw-light">/Konsultasi</small></h5>
                                <ul class="list-unstyled mb-4 text-start">
                                    <li>✔ Bundle Mikrotik Controller</li>
                                    <li>✔ Diagnosa akurat oleh ahli jaringan</li>
                                    <li>✔ Penyelesaian terhadap Dead-Zones</li>
                                    <li>✔ Konfigurasi keamanan untuk proteksi data</li>
                                    <li>✔ Jaminan masalah teratasi/konsultasi lanjutan</li>
                                </ul>
                                <a href="{{ route('layanan.show', 'konsultasi-troubleshooting') }}" class="btn btn-outline-primary mt-auto rounded-pill">Pilih Layanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Location Section --}}
        <section id="lokasi" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold">Lokasi Kami</h2>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <h4 class="fw-semibold">Alamat Provider</h4>
                        <p>
                            Jl. Veteran No.93, Kb. Dalem, Gapurosukolilo,<br>
                            Kec. Gresik, Kabupaten Gresik, Jawa Timur 61122
                        </p>
                        <p><i class="bi bi-telephone-fill me-2"></i> 0881-0264-61696</p>
                        <p><i class="bi bi-envelope-fill me-2"></i> isp@fastone.com</p>
                    </div>
                    <div class="col-md-6">
                        <h4 class="fw-semibold">Peta Lokasi</h4>
                        <div class="map-responsive shadow rounded">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.823933118823!2d112.6519150147745!3d-7.14620699484166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd801369527f79f%3A0x343c6b372e128d8!2sJl.%20Veteran%20No.93%2C%20Kb.%20Dalem%2C%20Gapurosukolilo%2C%20Kec.%20Gresik%2C%20Kabupaten%20Gresik%2C%20Jawa%20Timur%2061122!5e0!3m2!1sen!2sid!4v1672583318821!5m2!1sen!2sid"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} FAST ONE. All Rights Reserved.</p>
            <span style="color: #e25555;">made with ♥</span>
        </div>
    </footer>
@endsection

@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush