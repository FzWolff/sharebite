<!DOCTYPE html>
<html>
<head>
    <title>ShareBite</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#F5F0E1;
            font-family:'Poppins',sans-serif;
            overflow-x:hidden;
        }

        .navbar{
            background:transparent;
            padding:20px 0;
        }

        .navbar-logo{
            height:137px;
            width:auto;
        }

        .logo{
            font-size:36px;
            font-weight:700;
        }

        .logo span{
            color:#2F8A3D;
        }

        .btn-register{
            background:#6E9F3C;
            color:white;
            border-radius:12px;
            padding:10px 24px;
        }

        .btn-login{
            border:1px solid #ddd;
            background:white;
            border-radius:12px;
            padding:10px 24px;
        }

        .hero{
            min-height:80vh;
            display:flex;
            align-items:center;
        }

        .hero-title{
            font-size:64px;
            font-weight:700;
            line-height:1.1;
        }

        .hero-title span{
            color:#2F8A3D;
        }

        .hero-text{
            color:#555;
            margin-top:20px;
            max-width:450px;
        }

        .btn-donasi{
            background:#6E9F3C;
            color:white;
            border-radius:12px;
            padding:12px 25px;
            text-decoration:none;
        }

        .btn-relawan{
            background:white;
            color:black;
            border:1px solid #ddd;
            border-radius:12px;
            padding:12px 25px;
            text-decoration:none;
        }

        .stats-box{
            margin-top:50px;
            background:white;
            border-radius:18px;
            padding:25px;
            width:500px;
            box-shadow:0 4px 15px rgba(0,0,0,.08);
        }

        .stats-box h3{
            font-weight:700;
        }

        .hero-image{
            width:100%;
            max-width:700px;
        }

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="/">
    <img
        src="{{ asset('images/logo-sharebite.png') }}"
        alt="ShareBite"
        class="navbar-logo"
    >
    </a>

        <div class="ms-auto d-flex align-items-center">

            <a class="nav-link me-4" href="/">Home</a>

            <a class="nav-link me-4" href="/about">
                Tentang Kami
            </a>

            <a href="/login"
               class="btn btn-login me-2">
               Login
            </a>

            <a href="/register"
               class="btn btn-register">
               Register
            </a>

        </div>

    </div>
</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-md-5">

<h1 class="hero-title">
Berbagi Makanan,
<br>
<span>Berbagi Harapan</span>
</h1>

<p class="hero-text">
Bersama kita bisa mengurangi makanan terbuang
dan membantu mereka yang membutuhkan.
</p>

<div class="mt-4">

<a href="/register"
   class="btn-donasi">
   Mulai Donasi
</a>

<a href="/register"
   class="btn-relawan ms-2">
   Jadi Relawan
</a>

</div>

<div class="stats-box">

<div class="row text-center">

<div class="col">
<h3>12K+</h3>
<small>Paket Makanan</small>
</div>

<div class="col">
<h3>850+</h3>
<small>Donatur Aktif</small>
</div>

<div class="col">
<h3>1.2K+</h3>
<small>Relawan</small>
</div>

</div>

</div>

</div>

<div class="col-md-7 text-center">

<img
src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
class="hero-image"
alt="Food Donation">

</div>

</div>

</section>

</body>
</html>