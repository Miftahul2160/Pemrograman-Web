@extends('layout')
@section('title', 'Detail Produk: ' . $product->name)

{{-- Memulai section konten --}}
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- Judul Kartu --}}
                    <h2>Detail Produk</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Kolom untuk Gambar Produk --}}
                        <div class="col-md-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
                            @else
                                {{-- Jika tidak ada gambar, tampilkan placeholder --}}
                                <img src="https://via.placeholder.com/300" class="img-fluid rounded" alt="No Image">
                            @endif
                        </div>

                        <div class="col-md-8">
                            {{-- Nama Produk --}}
                            <h3>{{ $product->name }}</h3>
                            <hr>

                            <p class="fs-5">
                                <strong>Harga:</strong> 
                                <span class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </p>

                            <p>
                                <strong>Stok Tersisa:</strong> {{ $product->stock }} unit
                            </p>

                            <p>
                                <strong>Deskripsi:</strong><br>
                                {!! nl2br(e($product->description)) !!} {{-- nl2br untuk menjaga format baris baru --}}
                            </p>

                            <hr>

                            <small class="text-muted">
                                Dibuat pada: {{ $product->created_at->format('d F Y, H:i') }}<br>
                                Terakhir diupdate: {{ $product->updated_at->format('d F Y, H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    {{-- Tombol Kembali ke Halaman Index --}}
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>

                    {{-- Tombol untuk ke Halaman Edit --}}
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                    {{-- Tombol Hapus memerlukan form khusus --}}
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
//@endsection