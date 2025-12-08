<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
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
            max-width: 1100px;
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

        .btn-add {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 193, 7, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            color: white;
            font-weight: 700;
            padding: 15px;
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        table tr:nth-child(even) {
            background: #f5f9ff;
        }

        table tr:hover {
            background: #eef5ff;
        }

        th, td {
            text-align: center;
            padding: 12px;
            color: #333;
        }

        .btn-edit {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            padding: 8px 14px;
            text-decoration: none;
            color: white;
            border-radius: 8px;
            font-weight: 700;
            transition: 0.3s;
            display: inline-block;
            border: none;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 193, 7, 0.3);
        }

        .btn-delete {
            background: #ff6b6b;
            padding: 8px 14px;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            transition: 0.3s;
        }

        .btn-delete:hover {
            background: #ee5a52;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 107, 107, 0.3);
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><strong>Dashboard Produk</strong></div>
    <div>
        <a href="/dashboard">Home</a>
        <a href="/logout">Logout</a>
    </div>
</div>

<div class="container">
    <h2>📦 Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Produk</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Toko</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($products as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->toko }}</td>
            <td>{{ $p->description }}</td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('products.destroy', $p->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>