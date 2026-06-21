<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Admin')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/admin.css') }}">

</head>
<body>

<div class="layout-container">

    <aside class="sidebar">

        <div class="logo-section">

            <img src="{{ asset('images/logo-sharebite.png') }}"
                 alt="logo"
                 class="logo-image">

        </div>

        <nav class="sidebar-menu">

            <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>

            <a href="/admin/donations" class="{{ request()->is('admin/donations') ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i>
                Kelola Donasi
            </a>

            <a href="/admin/requests" class="{{ request()->is('admin/requests') ? 'active' : '' }}">
                <i class="bi bi-person-check"></i>
                Kelola Pengajuan
            </a>

            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Kelola User
            </a>

            <a href="/admin/reports" class="{{ request()->is('admin/reports') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                Laporan
            </a>

            <a href="/admin/profile" class="{{ request()->is('admin/profile') ? 'active' : '' }}">
                <i class="bi bi-person"></i>
                Profil
            </a>

        </nav>

        <div class="logout-section">

            <a href="/login">
                <i class="bi bi-box-arrow-left"></i>
                Logout
            </a>

        </div>

    </aside>

    <main class="content-wrapper">

        @yield('content')

    </main>

</div>

</body>
</html>