{{--
  File ini HANYA untuk navigasi di halaman publik.
  Logikanya diubah agar tidak lagi menampilkan link admin.
--}}
<nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top shadow-sm">
    <div class="container">
        {{-- Logo sekarang mengarah ke rute 'home' (/beranda) --}}
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Brand" width="120" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li ><a href="{{ route('home') }}#beranda" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Beranda</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#tentang-kita" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Tentang Kita</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#layanan" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Layanan</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#paket-core" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Pricelist</a></li>
                <li class="nav-item"><a href="{{ route('home') }}#lokasi" class="btn btn-outline-secondary btn-sm ms-2 rounded-pill">Lokasi</a></li>
                <li class="nav-item ms-lg-2">
                    <button class="btn btn-link nav-link py-2 px-0 px-lg-2" type="button" id="darkModeToggle" aria-label="Toggle dark mode">
                        <i class="bi bi-moon-fill"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
