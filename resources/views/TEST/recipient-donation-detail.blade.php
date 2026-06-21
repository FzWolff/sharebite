<h1>{{ $donation->title }}</h1>

<p>{{ $donation->description }}</p>

<p>
    Stok:
    {{ $donation->quantity }}
    {{ $donation->unit }}
</p>

<hr>

<h3>Informasi Donor</h3>

<p>
    ⭐ {{ number_format($rating ?? 0, 1) }}
    ({{ $totalReviews }} Review)
</p>

<hr>

<h3>Ajukan Request</h3>

<form
    method="POST"
    action="/test/donations/{{ $donation->id }}/request"
>
    @csrf

    <label>Jumlah Request</label>
    <br>

    <input
        type="number"
        name="quantity_requested"
        min="1"
        max="{{ $donation->quantity }}"
        required
    >

    <br><br>

    <label>Pesan</label>
    <br>

    <textarea
        name="message"
    ></textarea>

    <br><br>

    <label>Pickup Time</label>
    <br>

    <input
        type="datetime-local"
        name="pickup_time"
    >

    <br><br>

    <button type="submit">
        Ajukan Request
    </button>

</form>