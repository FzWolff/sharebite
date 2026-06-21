@extends('layouts.recipient')

@section('title', 'Riwayat Bantuan')

@section('content')

<div class="history-page">

    <div class="history-header">

        <div class="page-title">

            <i class="bi bi-arrow-left"></i>
            <h1>Riwayat Bantuan</h1>

        </div>

        <select class="history-filter">

            <option>Semua Status</option>
            <option>Selesai</option>
            <option>Dibatalkan</option>

        </select>

    </div>

@forelse($requests as $request)

<div class="history-card sb-card">

    <img
        src="https://images.unsplash.com/photo-1547592180-85f173990554?w=500"
        alt="Donation">

    <div class="history-info">

        <h3>
            {{ $request->donation->title }}
        </h3>

        <p>
            {{ $request->quantity_requested }}
            {{ $request->donation->unit }}
        </p>

    </div>

    <div class="history-date">

        {{ $request->created_at->format('d M Y') }}

    </div>

    <div class="history-status sb-badge">

        {{ ucfirst($request->status) }}

    </div>

    <a href="{{ url('/recipient/history/'.$request->id) }}"
    class="history-card">

        <i class="bi bi-chevron-right"></i>

    </a>

</div>

<div class="pagination-wrapper">
    {{ $requests->links() }}
</div>

@empty

<div class="history-card sb-card">

    <div class="history-info">

        <h3>
            Belum ada riwayat bantuan
        </h3>

    </div>

</div>

@endforelse

</div>

@endsection