<h1>Create Donation</h1>

<form method="POST">
    @csrf

    <label>Kategori</label>

    <select name="category_id">

        @foreach($categories as $category)

        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>

        @endforeach

    </select>

    <br><br>

    <input
        type="text"
        name="title"
        placeholder="Judul"
    >

    <br><br>

    <textarea
        name="description"
        placeholder="Deskripsi"
    ></textarea>

    <br><br>

    <input
        type="number"
        name="quantity"
        placeholder="Jumlah"
    >

    <br><br>

    <input
        type="text"
        name="unit"
        placeholder="Unit"
    >

    <br><br>

    <input
        type="text"
        name="pickup_address"
        placeholder="Alamat Pickup"
    >

    <br><br>

    <input
        type="datetime-local"
        name="expired_at"
    >

    <br><br>

    <button type="submit">
        Simpan Donasi
    </button>

</form>