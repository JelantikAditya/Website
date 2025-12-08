<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Produk</title>
    <style>
        /* --- RESET & BASIC STYLES --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* --- NAVBAR --- */
        .navbar {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 50%, #ffc107 100%);
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            border-bottom: 4px solid #ffc107;
        }
        .navbar h2 { margin: 0; font-size: 28px; font-weight: 700; letter-spacing: 1px; }
        .nav-links a {
            margin-left: 25px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .nav-links a:hover {
            background: rgba(255, 193, 7, 0.3);
            transform: translateY(-2px);
        }

        /* --- CONTAINER --- */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        /* --- WELCOME BOX & SEARCH --- */
        .welcome-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            border-top: 6px solid #ffc107;
            margin-bottom: 50px;
        }
        .welcome-box h1 { color: #2a5298; font-size: 36px; margin-bottom: 10px; }
        .welcome-box p { font-size: 18px; color: #666; margin: 15px 0; }

        /* Style Khusus Search Bar */
        .search-container {
            margin: 25px auto;
            display: flex;
            justify-content: center;
        }
        .search-form {
            display: flex;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 50px;
            overflow: hidden;
            border: 2px solid #ffc107;
            background: white;
        }
        .search-input {
            flex: 1;
            padding: 15px 25px;
            border: none;
            outline: none;
            font-size: 16px;
            color: #333;
        }
        .search-btn {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            color: white;
            border: none;
            padding: 0 30px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }
        .search-btn:hover { background: #1e3c72; }

        /* Tombol Aksi */
        .btn-group { margin-top: 25px; }
        .btn {
            padding: 12px 30px;
            margin: 10px;
            display: inline-block;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
        .btn-blue {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            color: white;
        }
        .btn-blue:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(42, 82, 152, 0.4); }
        .btn-red { background: #ff6b6b; color: white; }
        .btn-red:hover { background: #ee5a52; transform: translateY(-3px); box-shadow: 0 10px 25px rgba(255, 107, 107, 0.3); }

        /* --- PRODUCT GRID --- */
        .products-section { margin-top: 50px; }
        .section-title {
            color: #2a5298;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 3px solid #ffc107;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: 0.3s;
            border-top: 5px solid #ffc107;
        }
        .product-card:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.15); }
        .product-header {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            padding: 20px;
            color: white;
        }
        .product-name { font-size: 20px; font-weight: 700; margin-bottom: 8px; }
        .product-store { font-size: 13px; opacity: 0.9; color: #ffc107; }
        .product-body { padding: 20px; }
        .product-price { font-size: 24px; font-weight: 700; color: #ffc107; margin-bottom: 12px; }
        .product-stock {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
            padding: 10px;
            background: #f0f8ff;
            border-left: 3px solid #ffc107;
            border-radius: 5px;
        }
        .product-description {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            max-height: 80px;
            overflow-y: auto;
        }

        /* --- EMPTY STATE --- */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            border-top: 6px solid #ffc107;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .empty-state h3 { color: #2a5298; font-size: 24px; margin-bottom: 15px; }
        .empty-state p { color: #666; font-size: 16px; margin-bottom: 25px; }
        .empty-state a {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: white;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            transition: 0.3s;
            display: inline-block;
        }
        .empty-state a:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(255, 193, 7, 0.3); }
        .reset-link { font-size: 14px; color: #666; text-decoration: none; font-weight: normal; margin-left: 10px; }
        .reset-link:hover { text-decoration: underline; color: #d9534f; }
    </style>
</head>
<body>

<div class="navbar">
    <h2>📊 Dashboard</h2>
    <div class="nav-links">
        <a href="/products">Kelola Produk</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    
    <div class="welcome-box">
        <h1>🎉 Selamat Datang!</h1>
        <p>Halo, <strong>{{ Auth::user()->name ?? 'User' }}</strong></p>
        <p style="color: #999; font-size: 14px;">Cari dan kelola produk toko Anda dengan mudah</p>
        
        <div class="search-container">
            <form action="/dashboard" method="GET" class="search-form">
                <input type="text" 
                       name="search" 
                       class="search-input" 
                       placeholder="Cari nama produk atau deskripsi..." 
                       value="{{ request('search') }}">
                <button type="submit" class="search-btn">🔍 Cari</button>
            </form>
        </div>

        <div class="btn-group">
            <a href="/products/create" class="btn btn-blue">+ Tambah Produk</a>
            <a href="/products" class="btn btn-blue">Tabel Admin</a>
        </div>
    </div>

    <div class="products-section">
        
        <h2 class="section-title">
            @if(request('search'))
                🔍 Hasil Pencarian: "{{ request('search') }}"
                <a href="/dashboard" class="reset-link">↺ Reset</a>
            @else
                📦 Produk Tersimpan
            @endif
        </h2>

        @if(isset($products) && $products->count())
            <div class="products-grid">
                @foreach($products as $p)
                <div class="product-card">
                    <div class="product-header">
                        <div class="product-name">{{ $p->name }}</div>
                        <div class="product-store">🏪 {{ $p->toko }}</div>
                    </div>
                    <div class="product-body">
                        <div class="product-price">Rp {{ number_format($p->price, 0, ',', '.') }}</div>
                        <div class="product-stock">
                            📦 Stok: <strong>{{ $p->stock }}</strong> unit
                        </div>
                        <div class="product-description">
                            {{ $p->description ?? 'Tidak ada deskripsi' }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h3>📭 Produk Tidak Ditemukan</h3>
                @if(request('search'))
                    <p>Tidak ada produk dengan kata kunci "<strong>{{ request('search') }}</strong>".</p>
                    <a href="/dashboard" style="background: #666;">Kembali ke Dashboard</a>
                @else
                    <p>Anda belum menyimpan produk apapun. Mulai tambah sekarang!</p>
                    <a href="/products/create">Tambah Produk Pertama</a>
                @endif
            </div>
        @endif
    </div>
</div>

</body>
</html>