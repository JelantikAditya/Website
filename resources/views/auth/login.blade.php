

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #ffc107 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #ffffff;
            width: 380px;
            border-radius: 20px;
            padding: 40px 45px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: slideUp 0.8s ease;
            border-top: 5px solid #ffc107;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #2a5298 0%, #ffc107 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 32px;
            font-weight: 700;
        }

        label {
            font-weight: 700;
            color: #2a5298;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: 2px solid #ffc107;
            outline: none;
            margin-bottom: 18px;
            font-size: 15px;
            transition: 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #2a5298;
            box-shadow: 0 0 12px rgba(42, 82, 152, 0.3);
            background: #f0f8ff;
        }

        button {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            border: none;
            background: linear-gradient(135deg, #2a5298 0%, #ffc107 100%);
            color: white;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(42, 82, 152, 0.4);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #2a5298;
            text-decoration: none;
            font-weight: 700;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 2px;
            transition: 0.3s;
        }

        .register-link a:hover {
            color: #ffc107;
            border-bottom: 2px solid #2a5298;
        }

        .alert {
            padding: 14px;
            background: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffc107;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: 500;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            border-left: 4px solid #198754;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    @if(session('error'))
    <div class="alert">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email..." required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password..." required>

        <button type="submit">Login</button>
    </form>

    <div class="register-link">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>

</div>

</body>
</html>