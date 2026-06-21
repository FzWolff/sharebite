<h1>Kelola Request</h1>

@foreach($requests as $request)

<div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">

    <h3>
        {{ $request->donation->title ?? 'Donasi Tidak Ditemukan' }}
    </h3>

    <p>
        Qty :
        {{ $request->quantity_requested }}
    </p>

    <p>
        Status :
        {{ $request->status }}
    </p>

</div>

@endforeach