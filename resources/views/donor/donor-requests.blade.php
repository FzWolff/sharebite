@extends('layouts.donor')

@section('title','Status Donasi')

@section('content')

<div class="page-header">

<h1>
    <i class="bi bi-arrow-repeat"></i>
    Status Donasi
</h1>

</div>

@forelse($donations as $donation)

<div class="status-card">

<div class="status-top">

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

    <div class="food-info">

        <h3>
            {{ $donation->title }}
        </h3>

        <p>
            {{ $donation->quantity }}
            {{ $donation->unit }}
        </p>

        <span class="status-badge">

            @switch($donation->status)

                @case('available')
                    Tersedia
                @break

                @case('partially_taken')
                    Sebagian Diambil
                @break

                @case('completed')
                    Selesai
                @break

                @case('cancelled')
                    Dibatalkan
                @break

                @default
                    {{ ucfirst($donation->status) }}

            @endswitch

        </span>

    </div>

</div>

    <div class="timeline">

        <div class="step done">

            <div class="step-dot"></div>

            <div>

                <h5>Donasi Dibuat</h5>

                <small>
                    {{ strtoupper($donation->status) }}
                </small>

            </div>

        </div>

        <div class="step done">

            <div class="step-dot"></div>

            <div>

                <h5>Permintaan Bantuan Masuk</h5>

            </div>

        </div>

        <div class="step {{ $donation->status != 'pending' ? 'done' : '' }}">

            <div class="step-dot"></div>

            <div>

                <h5>Diproses Donatur</h5>

            </div>

        </div>

        <div class="step {{ $donation ->status == 'approved' ? 'done' : '' }}">

            <div class="step-dot"></div>

            <div>

                <h5>Disetujui</h5>

            </div>

        </div>

    </div>

</div>

@empty

<div class="empty-card">

    Belum ada status donasi.

</div>

@endforelse

<style>

.page-header{
    margin-bottom:30px;
}

.page-header h1{
    font-size:34px;
    font-weight:700;
}

.status-card{
    background:#fff;
    border-radius:24px;
    padding:30px;
    margin-bottom:25px;
    box-shadow:0 4px 15px rgba(0,0,0,.05);
}

.status-top{
    display:flex;
    align-items:center;
    gap:24px;
    margin-bottom:35px;
}

.food-image{
    width:160px;
    height:120px;
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

.food-info{
    flex:1;
}

.food-info h3{
    font-size:28px;
    font-weight:700;
    margin-bottom:8px;
}

.food-info p{
    color:#777;
    margin-bottom:14px;
}

.status-badge{
    display:inline-flex;
    align-items:center;
    background:#DDF5DD;
    color:#159A38;
    padding:10px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:700;
}

.status-badge{
    background:#DDF5DD;
    color:#159A38;
    padding:8px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}

.timeline{
    margin-left:20px;
    border-left:2px solid #E8E8E8;
    padding-left:25px;
}

.step{
    position:relative;
    display:flex;
    gap:15px;
    margin-bottom:30px;
    opacity:.4;
}

.step.done{
    opacity:1;
}

.step-dot{
    width:18px;
    height:18px;
    border-radius:50%;
    background:#D9D9D9;
    position:absolute;
    left:-35px;
    top:5px;
}

.step.done .step-dot{
    background:#159A38;
}

.recipient-box{
    background:#F8F9FA;
    border-radius:14px;
    padding:18px;
}

.recipient-box p{
    margin:0;
    color:#777;
}

.status-header{
    display:flex;
    align-items:center;
    gap:20px;
}

.food-image{
    width:130px;
    height:100px;
    border-radius:12px;
    overflow:hidden;
}

.food-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

</style>

@endsection
