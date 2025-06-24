<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::latest()->paginate(5); // Ambil 5 data terbaru
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail satu produk (tidak wajib untuk CRUD dasar, tapi bagus untuk ada)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Mengupdate data produk di database
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}