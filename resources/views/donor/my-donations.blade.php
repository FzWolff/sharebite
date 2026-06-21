@extends('layouts.donor')

@section('title','Riwayat Donasi')

@section('content')

<div class="page-header">


<h1>
    <i class="bi bi-clock-history"></i>
    Riwayat Donasi
</h1>

</div>

<div class="filter-wrapper">

<button class="filter-chip active">
    <i class="bi bi-grid"></i>
    Semua
</button>

<button class="filter-chip">
    <i class="bi bi-hourglass-split"></i>
    Diproses
</button>

<button class="filter-chip">
    <i class="bi bi-check-circle"></i>
    Diterima
</button>

<button class="filter-chip">
    <i class="bi bi-award"></i>
    Selesai
</button>

<button class="filter-chip">
    <i class="bi bi-x-circle"></i>
    Dibatalkan
</button>

</div>

<div class="donation-list">

@forelse($donations as $donation)

<div class="donation-card">

    <div class="donation-left">

        <div class="food-image">

            @if($donation->photo_url)

                <img
                    src="{{ asset('storage/'.$donation->photo_url) }}"
                    alt="{{ $donation->title }}">

            @else

                <img
                src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
                alt="Food">

            @endif

        </div>

        <div class="donation-info">

            <h4>
                {{ $donation->title }}
            </h4>

            <p class="donation-quantity">

                {{ $donation->quantity }}
                {{ $donation->unit }}

            </p>

            <p class="donation-date">

                <i class="bi bi-calendar3"></i>

                {{ $donation->created_at->format('d M Y') }}

            </p>

            @if($donation->status == 'available')

                <span class="status-badge pending">
                    Diproses
                </span>

            @elseif($donation->status == 'partially_taken')

                <span class="status-badge approved">
                    Sebagian Diambil
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

    <a
        href="/donor/my-donations/{{ $donation->id }}"
        class="detail-btn">

        <i class="bi bi-arrow-right"></i>

    </a>

</div>

@empty

    <div class="empty-card">

        Belum ada donasi.

    </div>

@endforelse


</div>

@if(method_exists($donations,'links'))


<div class="pagination-wrapper">

    {{ $donations->links() }}

</div>
@endif

<style>

.page-header{
    margin-bottom:25px;
}

.page-header h1{
    font-size:34px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:10px;
}

.filter-wrapper{
    max-width:250px;
    margin-bottom:25px;
}

.donation-card{
    background:#fff;
    border-radius:24px;
    padding:22px;
    margin-bottom:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 6px 20px rgba(0,0,0,.05);
    transition:.25s ease;
}

.donation-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 28px rgba(0,0,0,.08);
}

.donation-left{
    display:flex;
    align-items:center;
    gap:20px;
}

.food-image{
    width:110px;
    height:90px;
    border-radius:16px;
    overflow:hidden;
    flex-shrink:0;
}

.food-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.donation-info h4{
    font-size:22px;
    font-weight:700;
    margin-bottom:6px;
}

.donation-quantity{
    color:#666;
    margin-bottom:8px;
    font-size:15px;
}

.donation-date{
    color:#999;
    font-size:13px;
    margin-bottom:12px;
}

.donation-date i{
    margin-right:4px;
}

.detail-btn{
    width:52px;
    height:52px;
    border-radius:50%;
    background:#F5F7F8;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    color:#444;
    font-size:20px;
    transition:.2s;
}

.detail-btn:hover{
    background:#159A38;
    color:white;
}

.status-badge{
    padding:8px 16px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
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

.empty-card{
    background:#fff;
    border-radius:20px;
    padding:30px;
    text-align:center;
}

.pagination-wrapper{
    margin-top:25px;
}

.filter-wrapper{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:30px;
    flex-wrap:nowrap;
}

.filter-chip{
    border:none;
    background:transparent;
    color:#666;
    padding:12px 18px;
    border-radius:999px;
    font-size:14px;
    font-weight:600;
    cursor:pointer;
    transition:.25s;
    white-space:nowrap;
}

.filter-chip.active{
    background:#159A38;
    color:white;
    box-shadow:0 8px 20px rgba(21,154,56,.20);
}

.filter-chip:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,.08);
}

.filter-chip{
    display:flex;
    align-items:center;
    gap:8px;
}

</style>

@endsection
