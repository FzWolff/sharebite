@extends('layouts.recipient')

@section('title', 'Detail Riwayat')

@section('content')

<div class="history-detail-page">

    <a href="{{ url('/recipient/history') }}"
       class="back-link">

        <i class="bi bi-arrow-left"></i>
        Kembali ke Riwayat

    </a>

    <div class="history-detail-card">

        <img
            src="https://images.unsplash.com/photo-1547592180-85f173990554?w=1200"
            alt="Donation">

        <div class="detail-body">

            <div class="detail-header">

                <h1>{{ $request->donation->title }}</h1>

                <span class="detail-status success">
                    {{ ucfirst($request->status) }}
                </span>

            </div>

            <p class="detail-description">
                {{ $request->donation->description }}
            </p>

            <div class="detail-grid">

                <div class="detail-item">

                    <small>Jumlah Bantuan</small>
                    <h4>
                        {{ $request->quantity_requested }}
                        {{ $request->donation->unit }}
                    </h4>

                </div>

                <div class="detail-item">

                    <small>Tanggal Pengajuan</small>
                    <h4>
                    {{ $request->created_at->format('d M Y') }}
                    </h4>

                </div>

            </div>

            <div class="pickup-card">

                <small>Alamat Pengambilan</small>

                <p>
                {{ $request->donation->pickup_address }}
                </p>

            </div>

        </div>

    </div>

</div>

@endsection