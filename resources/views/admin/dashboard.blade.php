@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('content')

<div class="admin-dashboard">

    <div class="hero-dashboard">

        <div>

            <h1>
                Halo, Administrator 👋
            </h1>

            <p>
                Selamat datang kembali di Dashboard ShareBite.
                Berikut ringkasan aktivitas sistem hari ini.
            </p>

        </div>

        <div class="hero-date">

            <i class="bi bi-calendar3"></i>

            {{ now()->format('d F Y') }}

        </div>

    </div>

    <div class="stats-grid">

        <div class="modern-stat-card green">

            <div class="stat-icon">
                <i class="bi bi-clipboard-data"></i>
            </div>

            <div>

                <h2>{{ $stats['total_requests'] }}</h2>

                <p>Total Pengajuan</p>

            </div>

        </div>

        <div class="modern-stat-card orange">

            <div class="stat-icon">
                <i class="bi bi-hourglass-split"></i>
            </div>

            <div>

                <h2>{{ $stats['pending_requests'] }}</h2>

                <p>Menunggu Persetujuan</p>

            </div>

        </div>

        <div class="modern-stat-card blue">

            <div class="stat-icon">
                <i class="bi bi-person-check"></i>
            </div>

            <div>

                <h2>{{ $stats['total_recipients'] }}</h2>

                <p>Total Penerima</p>

            </div>

        </div>

        <div class="modern-stat-card purple">

            <div class="stat-icon">
                <i class="bi bi-heart"></i>
            </div>

            <div>

                <h2>{{ $stats['total_donors'] }}</h2>

                <p>Total Donatur</p>

            </div>

        </div>

    </div>

<div class="activity-section">

    <h2>Aktivitas Terbaru</h2>

    <div class="activity-card">

        @forelse($latestRequests as $request)

            <div class="activity-item">

                <div class="activity-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div class="activity-content">

                    <div class="activity-header">

                        <strong>
                            {{ $request->recipient->organization_name ?? $request->recipient->name }}
                        </strong>

                        <small class="activity-time">
                            {{ $request->created_at->format('d M Y H:i') }}
                        </small>

                    </div>

                    <p>
                        Mengajukan bantuan untuk
                        <strong>
                            {{ $request->donation->title ?? 'Donasi' }}
                        </strong>
                    </p>

                </div>

            </div>

        @empty

            <div class="activity-item">

                <div class="activity-icon">
                    <i class="bi bi-info-circle"></i>
                </div>

                <div class="activity-content">

                    <strong>Belum Ada Aktivitas</strong>

                    <p>
                        Saat ini belum ada pengajuan bantuan terbaru.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection
