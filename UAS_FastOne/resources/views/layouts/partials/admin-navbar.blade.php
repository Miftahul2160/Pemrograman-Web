<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="bi bi-shield-lock-fill me-2"></i>
            Panel Administrasi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            {{-- Link Navigasi Admin --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('paket.*') ? 'active' : '' }}" href="{{ route('paket.index') }}">Kelola Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}" href="{{ route('pelanggan.index') }}">Kelola Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}" href="{{ route('layanan.index') }}">Kelola Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('permintaan.*') ? 'active' : '' }}" href="{{ route('permintaan.index') }}">Kelola Permintaan</a>
                </li>
            </ul>

            {{-- Dropdown Pengguna dan Tombol Dark Mode di sisi kanan --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                 @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank">Lihat Situs Publik</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item ms-lg-2">
                    <button class="btn btn-link nav-link py-2 px-0 px-lg-2" type="button" id="darkModeToggle" aria-label="Toggle dark mode">
                        <i class="bi bi-moon-fill"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
