@extends('layouts.recipient')

@section('title', 'Detail Donasi')

@section('content')

<div class="donation-detail-page">

    <div class="page-header">

        <a href="{{ url('/recipient/donations') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="detail-card">

        <div class="detail-image">

            <img src="https://images.unsplash.com/photo-1547592180-85f173990554?w=1200"
                 alt="Donation">

        </div>

        <div class="detail-content">

            <span class="available-badge">

                @if($donation->status == 'available')
                    Tersedia
                @elseif($donation->status == 'partially_taken')
                    Sebagian Diambil
                @else
                    {{ $donation->status }}
                @endif

            </span>

            <h1>{{ $donation->title }}</h1>

            <p class="detail-description">

                {{ $donation->description }}

            </p>

            <div class="detail-info">

                <div class="info-box">

                    <i class="bi bi-box-seam"></i>

                    <div>
                        <small>Jumlah Tersedia</small>
                        <h4>

                            {{ $donation->quantity }}
                            {{ $donation->unit }}

                        </h4>
                    </div>

                </div>

                <div class="info-box">

                    <i class="bi bi-geo-alt"></i>

                    <div>
                        <small>Lokasi Pickup</small>
                        <h4>

                            {{ $donation->pickup_address }}

                        </h4>
                    </div>

                </div>

            </div>

            <button class="request-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#requestModal">

                Ajukan Bantuan

            </button>

        </div>

    </div>

</div>

<!-- REQUEST MODAL -->

<div class="request-overlay">

    <div class="request-form-card">

        <h2>Ajukan Bantuan</h2>

                @if ($errors->any())

                <div
                    style="
                        background:#ffebee;
                        color:#c62828;
                        padding:12px;
                        margin-bottom:15px;
                        border-radius:8px;
                    "
                    >

                    @foreach ($errors->all() as $error)

                        <p style="margin:0;">
                            {{ $error }}
                        </p>

                    @endforeach

                </div>

                @endif

                @if(session('error'))

                <div
                    style="
                        background:#fff3cd;
                        color:#856404;
                        padding:12px;
                        margin-bottom:15px;
                        border-radius:8px;
                    "
                >
                    {{ session('error') }}
                </div>

                @endif

        <form
            action="/recipient/donations/{{ $donation->id }}/request"
            method="POST">

            @csrf

            <div class="form-group">

                <label>Nama Lembaga</label>

                <input type="text"
                       placeholder="Contoh: Yayasan Harapan Bangsa">

            </div>

            <div class="form-group">

                <label>Jumlah Orang yang Dibantu</label>

                <input
                    type="number"
                    name="quantity_requested"
                    required>

            </div>

            <div class="form-group">

                <label>Kebutuhan</label>

                <input
                    type="text"
                    name="message"
                    required>

            </div>

            <div class="form-group">

                <label>Alamat Lengkap</label>

                <textarea rows="4"
                          placeholder="Masukkan alamat lengkap"></textarea>

            </div>

            <div class="form-group">

                <label>Waktu Pickup</label>

                <input
                    type="datetime-local"
                    name="pickup_time"
                    required>

            </div>

            <button type="submit" class="submit-request-btn">
                Kirim Pengajuan
            </button>

        </form>

    </div>

</div>

@endsection