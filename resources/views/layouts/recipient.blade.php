<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ShareBite')</title>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/recipient.css') }}">
</head>
<body>

<div class="layout-container">

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="logo-section">

            {{-- nanti ganti ke logo asli --}}
            <div class="logo-wrapper">
                <img src="{{ asset('images/logo-sharebite.png') }}"
                     alt="ShareBite"
                     class="logo-image">
            </div>

        </div>

        <nav class="sidebar-menu">

            <a href="/recipient/dashboard" class="{{ request()->is('recipient/dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                Dashboard
            </a>

            <a href="/recipient/donations" class="{{ request()->is('recipient/donations*') ? 'active' : '' }}">
                <i class="bi bi-megaphone"></i>
                Ajukan Bantuan
            </a>

           <a href="/recipient/status" class="{{ request()->is('recipient/status*') ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i>
                Status Pengajuan
            </a>

           <a href="/recipient/history" class="{{ request()->is('recipient/history*') ? 'active' : '' }}">
                <i class="bi bi-arrow-repeat"></i>
                Riwayat Bantuan
            </a>

            <a href="/recipient/profile" class="{{ request()->is('recipient/profile*') ? 'active' : '' }}">
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

    {{-- CONTENT --}}
    <main class="content-wrapper">
        @yield('content')
    </main>

</div>

</body>
</html>