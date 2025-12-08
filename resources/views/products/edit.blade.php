<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 50%, #ffc107 100%);
            color: white;
            padding: 20px 35px;
            font-size: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            border-bottom: 4px solid #ffc107;
        }

        .navbar a {
            color: white;
            margin-left: 25px;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .navbar a:hover {
            background: rgba(255, 193, 7, 0.3);
            transform: translateY(-2px);
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            border-top: 6px solid #ffc107;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2a5298;
            font-size: 28px;
            font-weight: 700;
        }

        label {
            font-weight: 700;
            color: #2a5298;
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ffc107;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: 0.3s;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2a5298;
            box-shadow: 0 0 12px rgba(42, 82, 152, 0.3);
            background: #f0f8ff;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(42, 82, 152, 0.4);
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #2a5298;
            font-weight: 700;
            padding: 10px 20px;
            border: 2px solid #ffc107;
            border-radius: 10px;
            transition: 0.3s;
            width: calc(100% - 44px);
        }

        .back-btn:hover {
            background: #ffc107;
            color: #2a5298;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Edit Produk</strong></div>
    <div>
        <a href="/products">Kembali</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>✏ Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name }}" required>

        <label>Harga Produk</label>
        <input type="number" name="price" value="{{ $product->price }}" required>

        <label>Deskripsi</label>
        <textarea name="description" rows="4" required>{{ $product->description }}</textarea>

        <button type="submit">Update Produk</button>
    </form>

    <a href="{{ route('products.index') }}" class="back-btn">← Kembali ke Daftar Produk</a>
</div>

</body>
</html>