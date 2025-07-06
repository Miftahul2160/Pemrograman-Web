@extends('layouts.admin')
@section('title', 'Edit Data Pelanggan')

@section('content')
<div class="container mt-5 pt-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Edit Data: {{ $pelanggan->nama_pelanggan }}</h1>
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
        <div class="card-body">
            {{-- Form ini akan mengirim data ke rute 'pelanggan.update' --}}
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                {{-- Method PUT digunakan untuk proses update --}}
                @method('PUT')
                
                {{-- Kita akan memanggil partial form yang sama dengan halaman create --}}
                @include('pelanggan._form')
            </form>
        </div>
    </div>
</div>
@endsection
