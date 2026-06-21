<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Donatur</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            background:#F7F3E9;
            font-family:'Segoe UI',sans-serif;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:240px;
            background:#F1ECDD;
            padding:20px;
        }

        .role{
            background:#5D9C3D;
            color:white;
            padding:8px 15px;
            border-radius:6px;
            display:inline-block;
            font-size:12px;
            margin-bottom:25px;
        }

        .logo{
            font-size:30px;
            font-weight:bold;
            color:#2E7D32;
            margin-bottom:35px;
        }

        .menu a{
            display:block;
            text-decoration:none;
            color:#333;
            padding:14px 16px;
            margin-bottom:8px;
            border-radius:8px;
        }

        .menu a:hover,
        .menu a.active{
            background:#0FA83D;
            color:white;
        }

        .logout{
            margin-top:140px;
        }

        .content{
            flex:1;
            padding:35px;
        }

        .welcome{
            margin-bottom:30px;
        }

        .welcome h2{
            font-weight:700;
        }

        .welcome p{
            color:#666;
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
            margin-bottom:30px;
        }

        .card-stat{
            background:white;
            border-radius:15px;
            padding:20px;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
        }

        .number{
            font-size:32px;
            font-weight:bold;
            color:#2E7D32;
        }

        .recent-title{
            font-size:24px;
            font-weight:600;
            margin-bottom:15px;
        }

        .donation-card{
            background:white;
            border-radius:15px;
            padding:18px;
            margin-bottom:15px;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
        }

        .status{
            background:#DFF4E2;
            color:#2E7D32;
            padding:5px 12px;
            border-radius:20px;
            font-size:13px;
            display:inline-block;
        }

    </style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">

        <div class="role">
            DONATUR
        </div>

        <div class="logo">
            ShareBite
        </div>

        <div class="menu">

            <a href="/test/donor-dashboard">
                Dashboard
            </a>

            <a href="/test/create-donation">
                Tambah Donasi
            </a>

            <a href="/test/my-donations">
                Riwayat Donasi
            </a>

            <a href="/test/donor-requests">
                Status Donasi
            </a>

            <a href="/test/profile">
                Profil
            </a>

            <div class="logout">
                <a href="/test/logout">
                    Logout
                </a>
            </div>

        </div>

    </div>

    <div class="content">

        <div class="welcome">

            <h2>
                Halo, {{ $user->name }} 👋
            </h2>

            <p>
                Terima kasih sudah berbagi makanan melalui ShareBite
            </p>

        </div>

        <div class="stats">

            <div class="card-stat">
                <div class="number">
                    {{ $totalDonations }}
                </div>
                <small>Total Donasi</small>
            </div>

            <div class="card-stat">
                <div class="number">
                    {{ $completedDonations }}
                </div>
                <small>Donasi Berhasil</small>
            </div>

            <div class="card-stat">
                <div class="number">
                    {{ $pendingRequests }}
                </div>
                <small>Menunggu Diproses</small>
            </div>

        </div>

        <div class="recent-title">
            Donasi Terbaru
        </div>

        @forelse($recentDonations as $donation)

            <div class="donation-card">

                <h5>
                    {{ $donation->title }}
                </h5>

                <p>
                    {{ $donation->quantity }}
                    {{ $donation->unit }}
                </p>

                <span class="status">
                    {{ ucfirst($donation->status) }}
                </span>

            </div>

        @empty

            <div class="alert alert-info">
                Belum ada donasi.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>