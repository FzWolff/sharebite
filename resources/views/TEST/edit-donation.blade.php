<h1>Edit Donasi</h1>

<form method="POST">

    @csrf

    <input
        type="text"
        name="title"
        value="{{ $donation->title }}"
    >

    <br><br>

    <textarea
        name="description"
    >{{ $donation->description }}</textarea>

    <br><br>

    <input
        type="number"
        name="quantity"
        value="{{ $donation->quantity }}"
    >

    <br><br>

    <input
        type="text"
        name="pickup_address"
        value="{{ $donation->pickup_address }}"
    >

    <br><br>

    <button type="submit">
        Update
    </button>

</form>