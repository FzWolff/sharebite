<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            background:#F7F3E9;
            font-family:'Segoe UI', sans-serif;
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
            padding:40px;
        }

        .page-title{
            font-size:32px;
            font-weight:700;
            margin-bottom:40px;
        }

        .profile-card{
            max-width:700px;
            margin:auto;
            background:transparent;
        }

        .profile-icon{
            text-align:center;
            font-size:90px;
            margin-bottom:40px;
        }

        .profile-row{
            display:flex;
            margin-bottom:25px;
        }

        .profile-label{
            width:180px;
            font-weight:600;
            color:#333;
        }

        .profile-value{
            color:#666;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">

        <div class="role">
            {{ strtoupper($user->role) }}
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

            <a href="/test/profile" class="active">
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

        <div class="page-title">
            ← Profil Saya
        </div>

        <div class="profile-card">

            <div class="profile-icon">
                👤
            </div>

            <div class="profile-row">
                <div class="profile-label">Nama</div>
                <div class="profile-value">{{ $user->name }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label">Email</div>
                <div class="profile-value">{{ $user->email }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label">No. Telepon</div>
                <div class="profile-value">
                    {{ $user->phone ?? '-' }}
                </div>
            </div>

            <div class="profile-row">
                <div class="profile-label">Alamat</div>
                <div class="profile-value">
                    {{ $user->address ?? '-' }}
                </div>
            </div>

            <div class="profile-row">
                <div class="profile-label">Bergabung Sejak</div>
                <div class="profile-value">
                    {{ $user->created_at->translatedFormat('d F Y') }}
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>