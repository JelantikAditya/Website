<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product as Product; // Pastikan nama file model sesuai (huruf kecil/besar)

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. LOGIKA CEK LOGIN (Tetap pertahankan kode Anda)
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. MULAI QUERY (Hanya ambil produk milik user ini)
        // Kita simpan dalam variabel $query dulu, jangan langsung ->get()
        $query = Product::where('user_id', $userId);

        // 3. LOGIKA PENCARIAN (Search)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            
            // Kita gunakan 'closure' (function) untuk mengelompokkan logika OR
            // SQL Result: WHERE user_id = 1 AND (name LIKE %...% OR description LIKE %...%)
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // 4. EKSEKUSI DATA
        // latest() = urutkan dari yang terbaru
        $products = $query->latest()->get();

        // 5. NAMA USER (Tetap pertahankan kode Anda)
        $userName = session('user_name') ?? session('user')->name ?? 'User';

        // 6. KIRIM KE VIEW
        return view('dashboard', compact('products', 'userName'));
    }
}