@extends('layouts.recipient')

@section('title', 'Ajukan Bantuan')

@section('content')

<div class="donations-page">

    <div class="page-header">

        <h1>
            <i class="bi bi-arrow-left"></i>
            Ajukan Bantuan
        </h1>

        <p>
            Temukan bantuan makanan yang tersedia untuk lembaga Anda
        </p>

    </div>

    <div class="search-section">

        <input type="text"
               placeholder="Cari bantuan makanan...">

    </div>
    
    <div class="donation-grid">

    @forelse($donations as $donation)

        <div class="donation-card">

            <img
            src="{{ $donation->photo_url ?: 'https://images.unsplash.com/photo-1547592180-85f173990554?w=800' }}"
            alt="{{ $donation->title }}">

            <div class="card-content">

                <h3>
                    {{ $donation->title }}
                </h3>

                <span class="quantity">
                    {{ $donation->quantity }}
                    {{ $donation->unit }}
                </span>

                <p class="location">

                    <i class="bi bi-geo-alt"></i>

                    {{ $donation->pickup_address }}

                </p>

                <a href="/recipient/donations/{{ $donation->id }}"
                class="apply-btn">

                    Ajukan Bantuan

                </a>

            </div>

        </div>

    @empty

        <div class="empty-state">

            Belum ada donasi tersedia

        </div>

    @endforelse

</div>

</div>

@endsection