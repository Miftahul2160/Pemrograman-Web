@extends('layouts.app')

@section('title', 'Detail Paket: ' . $paket->nama)

@section('content')
<div class="container mt-5 pt-5">
    <section id="detail-paket" class="py-5">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <div class="text-center mb-5">
                    {{-- Menampilkan data dari variabel $paket (tunggal) --}}
                    <h1 class="display-4 fw-bold mb-2">{{ $paket->nama }}</h1>
                    {{-- {!! !!} digunakan agar tag <small> bisa dirender sebagai HTML --}}
                    <p class="display-6 text-primary fw-light mb-0">{!! $paket->harga !!}</p>
                </div>

                <div class="row mb-5 p-4 p-md-5 bg-light rounded shadow-sm align-items-center">
                    <div class="col-md-5 col-lg-4 mb-3 mb-md-0">
                        <img src="{{ asset('images/' . $paket->gambar) }}" alt="{{ $paket->nama }}" class="img-fluid rounded shadow-lg">
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h3 class="fw-semibold mb-3">{{ $paket->judul }}</h3>
                        <p class="lead">{{ $paket->deskripsi }}</p>
                    </div>
                </div>

                <div class="mb-5 p-4 border rounded shadow-sm">
                    <h2 class="mb-3 fw-semibold h4">Fitur Unggulan:</h2>
                    <ul class="list-group list-group-flush">
                        {{-- Looping melalui array 'fitur' yang ada di dalam objek $paket --}}
                        @foreach($paket->fitur as $fitur)
                        <li class="list-group-item bg-transparent ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i>{!! $fitur !!}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="text-center p-4 p-md-5 border rounded shadow-sm">
                    <h3 class="mb-3 fw-semibold">Tertarik dengan Paket Ini?</h3>
                    
                    @auth
                        {{-- Tombol ini hanya tampil jika user sudah login --}}
                        <a href="{{ route('pelanggan.subscribe.form', $paket->id) }}" class="btn btn-success btn-lg shadow-sm">
                            <i class="bi bi-check-circle-fill me-2"></i>Berlangganan Paket Ini
                        </a>
                    @else
                        {{-- Tombol ini tampil jika user belum login --}}
                        <p class="mb-4">Silakan login terlebih dahulu untuk berlangganan.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-lg-2 mb-2 mb-lg-0 shadow-sm">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Login untuk Berlangganan
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </section>
</div>

@include('layouts.partials.modal-cek-jangkauan')
@endsection
