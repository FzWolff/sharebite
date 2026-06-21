<h1>Request Masuk</h1>

@foreach($requests as $request)

<div style="border:1px solid black;padding:10px;margin:10px">


    <h3>
        {{ $request->donation->title }}
    </h3>

    <p>
        Recipient :
        {{ $request->recipient->name }}
    </p>

    <p>
    ⭐ {{ number_format($request->rating ?? 0, 1) }}
    ({{ $request->review_count }} Review)
    </p>

    <p>
        Qty :
        {{ $request->quantity_requested }}
    </p>

    <p>
        Status :
        {{ $request->status }}
    </p>

    <p>
        {{ $request->message }}
    </p>

    @if($request->status == 'pending')

        <form
            method="POST"
            action="/test/request/{{ $request->id }}/approve"
        >
            @csrf
            <button type="submit">
                Approve
            </button>
        </form>

        <br>

        <form
            method="POST"
            action="/test/request/{{ $request->id }}/reject"
        >
            @csrf
            <button type="submit">
                Reject
            </button>
        </form>

    @endif

</div>

@endforeach