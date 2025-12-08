<?php
namespace App\Http\Controllers;

use App\Models\product as Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index() {
        // Jika user login (session ada), tampilkan hanya produk milik user tersebut
        $userId = session('user_id');
        // Jika kolom user_id belum ada (migration belum dijalankan), tampilkan semua
        if (!Schema::hasColumn('products', 'user_id')) {
            $products = Product::all();
        } else {
            if ($userId) {
                // Tampilkan produk yang milik user atau produk tanpa pemilik (opsional)
                $products = Product::where(function($q) use ($userId) {
                    $q->where('user_id', $userId)->orWhereNull('user_id');
                })->get();
            } else {
                $products = Product::all();
            }
        }
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $data = $request->only(['name','price','stock','toko','description']);
        // Jika ada user aktif, simpan relasi
        if (Schema::hasColumn('products', 'user_id')) {
            if ($userId = session('user_id')) {
                $data['user_id'] = $userId;
            }
        }
        Product::create($data);
        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }
}
