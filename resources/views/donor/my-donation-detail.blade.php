@extends('layouts.donor')

@section('title','Detail Donasi')

@section('content')

<div class="page-header">

<h1>
    <i class="bi bi-arrow-left"></i>
    Detail Donasi
</h1>

</div>

<div class="detail-card">

<div class="detail-item">

    <label>Judul Donasi</label>

    <div class="detail-value">
        {{ $donation->title }}
    </div>

</div>

<div class="detail-item">

    <label>Deskripsi</label>

    <div class="detail-value">
        {{ $donation->description ?? '-' }}
    </div>

</div>

<div class="detail-grid">

    <div class="detail-item">

        <label>Jumlah</label>

        <div class="detail-value">

            {{ $donation->quantity }}
            {{ $donation->unit }}

        </div>

    </div>

    <div class="detail-item">

        <label>Status</label>

        @if($donation->status == 'available')

            <span class="status-badge pending">
                Diproses
            </span>

        @elseif($donation->status == 'partially_taken')

            <span class="status-badge approved">
                Diterima
            </span>

        @elseif($donation->status == 'completed')

            <span class="status-badge success">
                Selesai
            </span>

        @elseif($donation->status == 'cancelled')

            <span class="status-badge danger">
                Dibatalkan
            </span>

        @endif

    </div>

</div>

<div class="detail-item">

    <label>Batas Konsumsi</label>

    <div class="detail-value">

        {{ \Carbon\Carbon::parse($donation->expired_at)->format('d F Y') }}

    </div>

</div>

<div class="detail-item">

    <label>Alamat Pickup</label>

    <div class="detail-value">

        {{ $donation->pickup_address }}

    </div>

</div>

@if($donation->photo_url)

    <div class="detail-item">

        <label>Foto Donasi</label>

        <img
            src="{{ asset('storage/'.$donation->photo_url) }}"
            class="donation-image">

    </div>

@endif

<div class="action-buttons">

    <a
        href="/donor/my-donations/{{ $donation->id }}/edit"
        class="btn-edit">

        <i class="bi bi-pencil-square"></i>
        Edit Donasi

    </a>

    <form
        method="POST"
        action="/donor/my-donations/{{ $donation->id }}/cancel">

        @csrf

        <button
            type="submit"
            class="btn-cancel">

            <i class="bi bi-trash"></i>
            Batalkan Donasi

        </button>

    </form>

</div>


</div>

<style>

.page-header{
    margin-bottom:25px;
}

.page-header h1{
    font-size:34px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:12px;
}

.detail-card{
    background:#fff;
    border-radius:24px;
    padding:35px;
    box-shadow:0 4px 15px rgba(0,0,0,.05);
}

.detail-item{
    margin-bottom:24px;
}

.detail-item label{
    display:block;
    font-weight:600;
    color:#777;
    margin-bottom:8px;
}

.detail-value{
    font-size:16px;
    line-height:1.7;
}

.detail-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.donation-image{
    width:220px;
    border-radius:18px;
    margin-top:10px;
}

.status-badge{
    padding:8px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}

.pending{
    background:#FFF4D6;
    color:#D89B00;
}

.approved{
    background:#E7F0FF;
    color:#2563EB;
}

.success{
    background:#DDF5DD;
    color:#159A38;
}

.danger{
    background:#FFE0E0;
    color:#DC2626;
}

.action-buttons{
    margin-top:30px;
    display:flex;
    gap:15px;
}

.btn-edit{
    background:#159A38;
    color:white;
    padding:12px 20px;
    border-radius:12px;
    text-decoration:none;
}

.btn-cancel{
    border:none;
    background:#FFE0E0;
    color:#DC2626;
    padding:12px 20px;
    border-radius:12px;
}

@media(max-width:768px){

    .detail-grid{
        grid-template-columns:1fr;
    }

}

</style>

@endsection
