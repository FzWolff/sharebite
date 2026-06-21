<h1>My Requests</h1>

<hr>

<a href="/test/my-requests">
    Semua
</a>

|

<a href="/test/my-requests/filter/pending">
    Pending
</a>

|

<a href="/test/my-requests/filter/approved">
    Approved
</a>

|

<a href="/test/my-requests/filter/rejected">
    Rejected
</a>

|

<a href="/test/my-requests/filter/cancelled">
    Cancelled
</a>

<hr>
<hr>

@forelse($requests as $request)

<div
style="
border:1px solid #ccc;
padding:15px;
margin-bottom:15px;
">

    <h3>
        {{ $request->donation->title }}
    </h3>

    <p>
        Qty Request:
        {{ $request->quantity_requested }}
    </p>

    <p>
        Status:
        <strong>
            {{ strtoupper($request->status) }}
        </strong>
    </p>

    <p>
        Pesan:
        {{ $request->message }}
    </p>

    <p>
        Pickup:
        {{ $request->pickup_time }}
    </p>

    <p>
        Diajukan:
        {{ $request->created_at }}
    </p>

    <a href="/test/my-requests/{{ $request->id }}">
    Detail
    </a>
</div>

@empty

<p>
Belum ada request.
</p>

@endforelse