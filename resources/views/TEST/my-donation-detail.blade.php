<h1>{{ $donation->title }}</h1>

<hr>

<p>
Deskripsi:
{{ $donation->description }}
</p>

<p>
Quantity:
{{ $donation->quantity }}
{{ $donation->unit }}
</p>

<p>
Status:
{{ $donation->status }}
</p>

<p>
Expired:
{{ $donation->expired_at }}
</p>

<p>
Pickup:
{{ $donation->pickup_address }}
</p>

<hr>

<a href="/test/my-donations/{{ $donation->id }}/edit">
    Edit Donasi
</a>

<br><br>

<form
    method="POST"
    action="/test/my-donations/{{ $donation->id }}/cancel"
>
    @csrf

    <button type="submit">
        Cancel Donasi
    </button>

</form>