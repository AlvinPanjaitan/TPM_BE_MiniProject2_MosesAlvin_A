<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .btn {
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-form button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        .login-form button:hover {
            background-color: #218838;
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Selamat Datang di Museum Virtual</h1>
        <p>Jelajahi berbagai museum yang tersedia di platform kami!</p>

        @auth
            <p>Anda sudah login sebagai {{ Auth::user()->name }}</p>
            <a href="{{ route('museums.index') }}" class="btn">Lihat Daftar Museum</a>
            <a href="{{ route('logout') }}" class="btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <h2>Login</h2>

            @if(session('error'))
                <div class="error-message">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <div class="register-link">
                <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
            </div>
        @endauth
    </div>

</body>
</html>
