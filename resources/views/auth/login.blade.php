<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ShareBite</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #C8DDBE;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 500px;
            background: #F4EEDD;
            padding: 40px;
            border-radius: 15px;
        }

        .logo{
            text-align:center;
            margin-bottom:8px;
        }

        .logo-img{
            width:180px;
            display:block;
            margin:0 auto;
        }

        .logo h2 {
            color: #16923C;
            font-weight: 700;
            margin-top: 10px;
        }

        .title{
            text-align:center;
            margin-top:0;
            margin-bottom:25px;
        }

        .title h1 {
            font-size: 36px;
            font-weight: 700;
        }

        .title p {
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            height: 48px;
        }

        .btn-login {
            width: 100%;
            background: #16923C;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #137a32;
            color: white;
        }

        .forgot {
            text-decoration: none;
            color: #16923C;
            font-size: 14px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #16923C;
            text-decoration: none;
            font-weight: 600;
        }

        .demo-account {
            margin-top: 30px;
            background: #ffffff;
            border: 1px solid #d9e8d0;
            border-radius: 12px;
            padding: 20px;
        }

        .demo-account h5 {
            color: #16923C;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .demo-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 10px;
        }

        .demo-role {
            font-weight: 700;
            color: #16923C;
            margin-bottom: 5px;
        }

        .demo-item small {
            color: #666;
            display: block;
        }

        .back-home{
            display:inline-flex;
            align-items:center;
            gap:8px;
            color:#16923C;
            text-decoration:none;
            font-weight:600;
            margin-bottom:15px;
        }

        .back-home:hover{
            color:#137a32;
        }
    </style>

</head>

<body>
    <div style="position:absolute;top:30px;left:30px;">
        <a href="/" class="back-home">
            ← Kembali ke Beranda
        </a>
    </div>
    
    <div class="login-card">

        <div class="logo">
        <img
            src="{{ asset('images/logo-sharebite.png') }}"
            alt="ShareBite"
            class="logo-img"
            >
        </div>

        <div class="title">
            <h1>Selamat Datang Kembali!</h1>
            <p>Masuk untuk melanjutkan</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">
                <label class="mb-2">Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    required>
            </div>

            <div class="mb-2">

                <div class="d-flex justify-content-between mb-2">
                    <label>Password</label>

                    <a href="#" class="forgot">
                        Lupa kata sandi?
                    </a>
                </div>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan kata sandi"
                    required>
            </div>

            <button type="submit" class="btn-login mt-4">
                Login
            </button>

        </form>

        <div class="register-link">
            Belum punya akun?
            <a href="/register">
                Register di sini
            </a>
        </div>

        <div class="demo-account">

            <h5>Akun Demo</h5>

            <div class="demo-item">
                <div class="demo-role">Penerima (Recipient)</div>
                <small>Email: recipient.test@gmail.com</small>
                <small>Password: password123</small>
            </div>

            <div class="demo-item">
                <div class="demo-role">Donatur (Donor)</div>
                <small>Email: donor.test@gmail.com</small>
                <small>Password: password123</small>
            </div>

            <div class="demo-item mb-0">
                <div class="demo-role">Admin</div>
                <small>Email: admin@sharebite.id</small>
                <small>Password: password123</small>
            </div>

        </div>

    </div>

</body>

</html>