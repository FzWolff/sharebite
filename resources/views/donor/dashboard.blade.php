@extends('layouts.donor')

@section('title','Dashboard Donatur')

@section('content')

<div class="dashboard-header">

    <div>

        <h1>
            Halo, {{ $user->name }} 👋
        </h1>

        <p>
            Terima kasih sudah berbagi makanan melalui ShareBite
        </p>

    </div>

</div>

<div class="stats-grid">

    <div class="stat-card">

        <h2>
            {{ $totalDonations }}
        </h2>

        <p>Total Donasi</p>

    </div>

    <div class="stat-card">

        <h2>
            {{ $completedDonations }}
        </h2>

        <p>Donasi Berhasil</p>

    </div>

    <div class="stat-card">

        <h2>
            {{ $pendingRequests }}
        </h2>

        <p>Menunggu Diproses</p>

    </div>

</div>

<div class="section-title">

    Donasi Terbaru

</div>

<div class="donation-list">

    @forelse($recentDonations as $donation)

        <div class="donation-card">

            <div class="donation-info">

                <h4>
                    {{ $donation->title }}
                </h4>

                <p>

                    {{ $donation->quantity }}
                    {{ $donation->unit }}

                </p>

            </div>

            <span class="status-badge">

                {{ ucfirst($donation->status) }}

            </span>

        </div>

    @empty

        <div class="empty-card">

            Belum ada donasi.

        </div>

    @endforelse

</div>

@endsection