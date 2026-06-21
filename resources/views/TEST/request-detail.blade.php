<h1>Detail Request</h1>

<hr>

<h3>{{ $requestData->donation->title }}</h3>

<p>
Status:
<strong>{{ strtoupper($requestData->status) }}</strong>
</p>

<p>
Qty:
{{ $requestData->quantity_requested }}
</p>

<p>
Pesan:
{{ $requestData->message }}
</p>

<p>
Pickup:
{{ $requestData->pickup_time }}
</p>

<p>
Dibuat:
{{ $requestData->created_at }}

@if($requestData->status == 'pending')

<form
    method="POST"
    action="/test/my-requests/{{ $requestData->id }}/cancel"
>

    @csrf

    <button type="submit">
        Cancel Request
    </button>

</form>

@endif
</p>