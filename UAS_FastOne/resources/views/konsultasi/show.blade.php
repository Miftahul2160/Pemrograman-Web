@extends('layouts.app')

@section('title', 'Detail ' . $konsultasi['nama'])

@section('content')
<div class="container mt-5 pt-5">
    <section id="detail-konsultasi" class="py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">

                <div class="mb-4">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <header class="mb-5 text-center">
                    <h1 class="display-5 fw-bold mb-3">{{ $konsultasi['judul'] }}</h1>
                    <p class="display-6 text-primary fw-light mb-0">{!! $konsultasi['harga'] !!}</p>
                </header>

                <div class="row mb-5 align-items-center">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <img src="{{ asset('images/' . $konsultasi['gambar']) }}" alt="{{ $konsultasi['nama'] }}" class="img-fluid rounded shadow-lg">
                    </div>
                    <div class="col-md-6">
                        <p class="fs-5">{{ $konsultasi['deskripsi'] }}</p>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0 h4"><i class="bi bi-list-check me-2"></i>Layanan Kami Meliputi:</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($konsultasi['fitur'] as $fitur)
                                <li class="list-group-item px-0"><i class="bi bi-check-circle-fill text-success me-2"></i>{!! $fitur !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-dark">
                        <h2 class="mb-0 h4"><i class="bi bi-diagram-3-fill me-2"></i>Proses Konsultasi Kami:</h2>
                    </div>
                    <div class="card-body">
                        <ol class="list-group list-group-numbered">
                            @foreach($konsultasi['proses'] as $item)
                                <li class="list-group-item"><strong>{{ $item['judul'] }}:</strong> {{ $item['deskripsi'] }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="text-center mt-5 p-4 bg-light rounded shadow-sm">
                    <h3 class="mb-4 fw-semibold">{{ $konsultasi['cta_judul'] }}</h3>
                    <a href="{{ route('home') }}#kontak" class="btn btn-primary btn-lg me-md-2 mb-2 mb-md-0">
                        <i class="bi bi-calendar2-check-fill me-2"></i>Jadwalkan Sesi
                    </a>
                    <a href="https://wa.me/62881026461696" class="btn btn-success btn-lg" target="_blank">
                        <i class="bi bi-whatsapp me-2"></i>Tanya Cepat via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
