<h1>Kelola Donasi</h1>

@foreach($donations as $donation)

<div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">

    <h3>{{ $donation->title }}</h3>

    <p>
        Qty :
        {{ $donation->quantity }}
        {{ $donation->unit }}
    </p>

    <p>
        Status :
        {{ $donation->status }}
    </p>

</div>

@endforeach