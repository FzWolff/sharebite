@extends('layouts.recipient')

@section('title', 'Status Pengajuan')

@section('content')

<div class="status-page">

    <div class="page-header">

        <h1>
            <i class="bi bi-clock-history"></i>
            Status Pengajuan
        </h1>

    </div>

    @forelse($requests as $request)

        @php
            $status = strtolower($request->status);
        @endphp

        <div class="status-card sb-card">

            <div class="request-header">

                <div class="request-icon">
                    <i class="bi bi-box-seam"></i>
                </div>

                <div>

                    <h2>
                        {{ $request->donation->title }}
                    </h2>

                    <p>

                        {{ $request->quantity_requested }}
                        {{ $request->donation->unit }}

                    </p>

                </div>

            </div>
            
    @php
        $status = strtolower($request->status);
    @endphp

    <div class="timeline">

        {{-- Pengajuan Dibuat --}}
        <div class="timeline-item
        @if($status == 'pending')
            completed
        @endif">
            <div class="timeline-dot">
                <i class="bi bi-check"></i>
            </div>

            <div class="timeline-content">
                <h4>Pengajuan Dibuat</h4>
                <span>
                    {{ $request->created_at->format('d M Y H:i') }}
                </span>
            </div>
        </div>

        {{-- Diproses Admin --}}
        <div class="timeline-item
        @if($status == 'pending')
            active
        @else
            completed
        @endif">
            <div class="timeline-dot">
                <i class="bi bi-check"></i>
            </div>

            <div class="timeline-content">
                <h4>Diproses Admin</h4>

                <span>
                    Pengajuan sedang diperiksa
                </span>
            </div>
        </div>

        {{-- Disetujui --}}
        <div class="timeline-item
        @if($status == 'approved')
            active
        @elseif($status == 'completed')
            completed
        @endif">
            
            <div class="timeline-dot">
                @if(in_array($status,['approved','completed']))
                    <i class="bi bi-check"></i>
                @endif
            </div>

            <div class="timeline-content">
                <h4>Disetujui</h4>

                <span>
                    @if(in_array($status,['approved','completed']))
                        Pengajuan telah disetujui
                    @else
                        Menunggu persetujuan
                    @endif
                </span>
            </div>
        </div>

        {{-- Bantuan Selesai --}}
        <div class="timeline-item
            {{ $status == 'completed' ? 'completed' : '' }}">

            <div class="timeline-dot">
                @if($status == 'completed')
                    <i class="bi bi-check"></i>
                @endif
            </div>

            <div class="timeline-content">
                <h4>Bantuan Selesai</h4>

                <span>
                    @if($status == 'completed')
                        Bantuan telah diterima
                    @else
                        Menunggu penyelesaian
                    @endif
                </span>
            </div>
        </div>

    </div>

            <div class="status-banner
            @if($status == 'pending')
            warning
            @elseif($status == 'approved')
            success
            @elseif($status == 'completed')
            success
            @elseif($status == 'rejected')
            danger
            @endif">

                <div class="status-banner-icon">

                    <i class="bi bi-info-circle"></i>

                </div>

                <div>

                    <small>Status Saat Ini</small>

                    <h2>

                    @if($status == 'pending')
                        Sedang Diproses
                    @elseif($status == 'approved')
                        Disetujui
                    @elseif($status == 'completed')
                        Bantuan Selesai
                    @elseif($status == 'rejected')
                        Ditolak
                    @endif

                    </h2>

                </div>

            </div>

        </div>

    @empty

        <div class="empty-state sb-card">

            <h3>
                Belum ada pengajuan bantuan
            </h3>

            <p>
                Silakan ajukan bantuan terlebih dahulu.
            </p>

        </div>

    @endforelse

    <div class="pagination-wrapper">

        {{ $requests->links() }}

    </div>

</div>

@endsection