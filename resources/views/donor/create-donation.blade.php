@extends('layouts.donor')

@section('title','Tambah Donasi')

@section('content')

<div class="page-header">

    <h1>
        <i class="bi bi-arrow-left"></i>
        Tambah Donasi Makanan
    </h1>

</div>

@if(session('success'))

    <div class="alert-success-custom">
        {{ session('success') }}
    </div>

@endif

<div class="donation-form-card">

    <form action="/donor/donations/create"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>Nama Makanan</label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   placeholder="Contoh: Nasi Lemak">

            @error('title')
                <small class="error-text">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <div class="form-row">

            <div class="form-group">

                <label>Kategori</label>

                <select name="category_id">

                    <option value="">
                        Pilih Kategori
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Jumlah</label>

                <input type="number"
                       name="quantity"
                       value="{{ old('quantity') }}"
                       placeholder="Contoh: 20">

            </div>

        </div>

        <input type="hidden"
               name="unit"
               value="Paket">

        <div class="form-group">

            <label>Tanggal Kadaluarsa</label>

            <input type="date"
                   name="expired_at"
                   value="{{ old('expired_at') }}">

        </div>

        <div class="form-group">

            <label>Lokasi Pengambilan</label>

            <input type="text"
                   name="pickup_address"
                   value="{{ old('pickup_address') }}"
                   placeholder="Masukkan alamat lengkap">

        </div>

        <div class="form-group">

            <label>Deskripsi</label>

            <textarea
                name="description"
                rows="4"
                placeholder="Tambahkan informasi makanan">{{ old('description') }}</textarea>

        </div>

        <div class="form-group">

            <label>Upload Foto</label>

            <div class="image-upload-wrapper">

                <label for="photo"
                       class="image-preview-box">

                    <img id="preview-image"
                         src=""
                         alt="preview">

                    <div id="upload-placeholder">

                        <i class="bi bi-plus-lg"></i>

                    </div>

                </label>

                <input type="file"
                       id="photo"
                       name="photo"
                       accept="image/*"
                       hidden>

            </div>

        </div>

        <button type="submit"
                class="submit-btn">

            Kirim Donasi

        </button>

    </form>

</div>

<style>

.page-header{
    margin-bottom:30px;
}

.page-header h1{
    font-size:36px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:12px;
}

.page-header i{
    font-size:28px;
}

.donation-form-card{
    background:#fff;
    padding:35px;
    border-radius:24px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
}

.form-group{
    margin-bottom:24px;
}

.form-group label{
    display:block;
    font-weight:600;
    margin-bottom:10px;
}

.form-group input,
.form-group textarea,
.form-group select{
    width:100%;
    border:1px solid #E4E4E4;
    border-radius:14px;
    padding:14px 18px;
    outline:none;
    font-size:14px;
}

.form-group textarea{
    resize:none;
}

.form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.image-upload-wrapper{
    display:flex;
    align-items:center;
}

.image-preview-box{
    width:120px;
    height:120px;
    border:2px dashed #D8D8D8;
    border-radius:16px;
    cursor:pointer;
    overflow:hidden;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#FAFAFA;
}

.image-preview-box img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:none;
}

#upload-placeholder{
    font-size:34px;
    color:#999;
}

.submit-btn{
    width:100%;
    border:none;
    background:#0FA83D;
    color:white;
    padding:15px;
    border-radius:14px;
    font-weight:600;
    transition:.3s;
}

.submit-btn:hover{
    background:#0D9437;
}

.alert-success-custom{
    background:#DFF5E5;
    color:#159A38;
    padding:15px;
    border-radius:12px;
    margin-bottom:20px;
}

.error-text{
    color:#DC3545;
}

@media(max-width:768px){

    .form-row{
        grid-template-columns:1fr;
    }

}

</style>

<script>

document
.getElementById('photo')
.addEventListener('change',function(e){

    const file = e.target.files[0];

    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(event){

        const image =
            document.getElementById('preview-image');

        image.src = event.target.result;
        image.style.display = 'block';

        document
        .getElementById('upload-placeholder')
        .style.display = 'none';
    }

    reader.readAsDataURL(file);

});

</script>

@endsection