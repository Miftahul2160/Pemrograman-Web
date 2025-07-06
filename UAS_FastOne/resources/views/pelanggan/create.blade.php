// resources/views/pelanggan/create.blade.php
@extends('layouts.admin')
@section('title', 'Tambah Pelanggan Baru')

@section('content')
<div class="container mt-5 pt-5">
    <div class="card shadow-sm">
        <div class="card-header"><h1>Tambah Pelanggan Baru</h1></div>
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @include('pelanggan._form')
            </form>
        </div>
    </div>
</div>
@endsection