@extends('layouts.admin')

@section('title', 'Edit Paket: ' . $paket->nama)

@section('content')
<div class="container mt-5 pt-5" style="min-height: 75vh;">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Edit Paket: {{ $paket->nama }}</h1>
            <a href="{{ route('paket.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
        <div class="card-body">
            {{--
              - action: Mengarah ke rute 'paket.update' dengan mengirimkan ID paket.
              - method: Tetap POST, tetapi kita gunakan directive @method('PUT') di dalamnya.
            --}}
            <form action="{{ route('paket.update', $paket->id) }}" method="POST">
                {{--
                  Directive @method('PUT') ini penting untuk memberitahu Laravel
                  bahwa ini adalah request UPDATE, bukan CREATE.
                --}}
                @method('PUT')

                {{--
                  Kita memanggil partial _form yang sama dengan halaman create.
                  Karena controller mengirim variabel $paket, form akan otomatis terisi
                  dengan data dari paket yang sedang diedit.
                --}}
                @include('paket._form')
            </form>
        </div>
    </div>
</div>
@endsection
