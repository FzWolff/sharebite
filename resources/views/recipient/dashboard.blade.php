@extends('layouts.recipient')

@section('title', 'Dashboard Penerima')

@section('content')

<div class="dashboard-page">

    <div class="welcome-section">

        <h1>
            Selamat Datang,<br>
            {{ $user->organization_name ?? $user->name }} 👋
        </h1>

        <p>
            Berikut informasi bantuan Anda
        </p>

    </div>

    <div class="active-request-card sb-card">

        <div class="card-header">

            <h2>Pengajuan Aktif</h2>

            <i class="bi bi-chevron-right"></i>

        </div>

        <div class="request-content">

            <div class="request-image">


@if($latestRequest)

    <img
        src="https://images.unsplash.com/photo-1547592180-85f173990554?w=500"
        alt="Paket Makanan">

@else

    <img
        src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500"
        alt="Belum Ada Pengajuan">

@endif


</div>


            <div class="request-info">


@if($latestRequest)

    <h3>
        {{ $latestRequest->donation->title }}
    </h3>

    <p>
        {{ $latestRequest->quantity_requested }}
        Paket
    </p>

    <div class="request-footer">

        <span class="request-date">
            {{ $latestRequest->created_at->format('d M Y') }}
        </span>

    </div>

@else

    <h3>
        Belum Ada Pengajuan
    </h3>

    <p>
        Anda belum pernah mengajukan bantuan.
    </p>

    <div class="request-footer">

        <span class="request-date">
            Silakan cari donasi yang tersedia
        </span>

    </div>

@endif


</div>


        </div>

    </div>

    <div class="stats-card sb-card">

        <div class="stat-item">

            <h2>{{ $totalRequests }}</h2>
            <p>Total Pengajuan</p>

        </div>

        <div class="divider"></div>

        <div class="stat-item">

            <h2>{{ $approvedRequests }}</h2>
            <p>Disetujui</p>

        </div>

        <div class="divider"></div>

        <div class="stat-item">

            <h2>{{ $completedRequests }}</h2>
            <p>Selesai</p>

        </div>

    </div>

</div>

@endsection