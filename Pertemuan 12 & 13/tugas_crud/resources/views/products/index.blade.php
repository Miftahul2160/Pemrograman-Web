@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>CRUD Sinkronus (Refresh Page)</h2>
            <a class="btn btn-success mb-3" href="{{ route('products.create') }}"> Tambah Produk</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $products->firstItem() + $loop->index }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price) }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
@endsection