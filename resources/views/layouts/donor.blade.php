<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Donatur')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/donor.css') }}">

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

            <a href="/donor/dashboard"
               class="{{ request()->is('donor/dashboard') ? 'active' : '' }}">

                <i class="bi bi-house-door"></i>
                Dashboard

            </a>

            <a href="/donor/donations/create"
               class="{{ request()->is('donor/donations/create') ? 'active' : '' }}">

                <i class="bi bi-plus-circle"></i>
                Tambah Donasi

            </a>

            <a href="/donor/my-donations"
               class="{{ request()->is('donor/my-donations') ? 'active' : '' }}">

                <i class="bi bi-wallet2"></i>
                Riwayat Donasi

            </a>

            <a href="/donor/requests"
               class="{{ request()->is('donor/requests') ? 'active' : '' }}">

                <i class="bi bi-arrow-repeat"></i>
                Status Donasi

            </a>

            <a href="/donor/profile"
               class="{{ request()->is('donor/profile') ? 'active' : '' }}">

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