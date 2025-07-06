@extends('layouts.customer')
@section('title', 'Form Berlangganan')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h1>Form Berlangganan</h1>
                    <p class="text-muted">Lengkapi data di bawah ini untuk berlangganan <strong>{{ $paket->nama }}</strong>.</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggan.subscribe.process') }}" method="POST">
                        @csrf
                        {{-- Kirim ID paket secara tersembunyi --}}
                        <input type="hidden" name="paket_id" value="{{ $paket->id }}">

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon Aktif</label>
                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                            @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap Pemasangan</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <p class="text-muted small">Dengan menekan tombol di bawah, Anda setuju dengan syarat dan ketentuan kami. Tim kami akan segera menghubungi Anda untuk jadwal pemasangan.</p>
                        <button type="submit" class="btn btn-primary w-100">Kirim Permintaan Berlangganan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
