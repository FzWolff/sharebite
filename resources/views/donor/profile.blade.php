@extends('layouts.donor')

@section('title','Profil Saya')

@section('content')

<div class="page-header">

    <h1>
        <i class="bi bi-person-circle"></i>
        Profil Saya
    </h1>

</div>

@if(session('success'))

<div class="alert alert-success mb-4">

    {{ session('success') }}

</div>

@endif

<div class="profile-card">

    <form
        action="/donor/profile/update"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="profile-photo-section">

            <label for="profile_photo">

                @if($user->profile_photo)

                    <img
                        src="{{ asset('storage/'.$user->profile_photo) }}"
                        id="previewImage"
                        alt="Profile">

                @else

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=159A38&color=fff&size=200"
                        id="previewImage"
                        alt="Profile">

                @endif

                <div class="change-photo">

                    <i class="bi bi-camera-fill"></i>

                </div>

            </label>

            <input
                type="file"
                id="profile_photo"
                name="profile_photo"
                accept="image/*"
                hidden>

            <h3 class="profile-name">

                {{ $user->name }}

            </h3>

            <p class="profile-role">

                Donatur ShareBite

            </p>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Nama Lengkap

                </label>

                <input
                    type="text"
                    class="form-control"
                    name="name"
                    value="{{ old('name',$user->name) }}">

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Email

                </label>

                <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="{{ old('email',$user->email) }}">

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    No. Telepon

                </label>

                <input
                    type="text"
                    class="form-control"
                    name="phone"
                    value="{{ old('phone',$user->phone) }}">

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Bergabung Sejak

                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $user->created_at->translatedFormat('d F Y') }}"
                    readonly>

            </div>

            <div class="col-12 mb-4">

                <label class="form-label">

                    Alamat

                </label>

                <textarea
                    class="form-control address-input"
                    name="address">{{ old('address',$user->address) }}</textarea>

            </div>

        </div>

        <button
            type="submit"
            class="save-btn">

            <i class="bi bi-check-circle-fill"></i>
            Simpan Perubahan

        </button>

    </form>

</div>

<style>

.page-header{
    margin-bottom:30px;
}

.page-header h1{
    font-size:38px;
    font-weight:700;
    display:flex;
    align-items:center;
    gap:12px;
}

.profile-card{
    background:#fff;
    border-radius:28px;
    padding:40px;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.profile-photo-section{
    text-align:center;
    margin-bottom:40px;
    position:relative;
}

.profile-photo-section label{
    position:relative;
    display:inline-block;
    cursor:pointer;
}

.profile-photo-section img{
    width:150px;
    height:150px;
    border-radius:50%;
    object-fit:cover;
    border:6px solid #F5F5F5;
    transition:.3s;
}

.profile-photo-section img:hover{
    transform:scale(1.03);
}

.change-photo{
    position:absolute;
    bottom:5px;
    right:5px;
    width:42px;
    height:42px;
    border-radius:50%;
    background:#159A38;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 5px 15px rgba(21,154,56,.25);
}

.profile-name{
    margin-top:20px;
    font-size:28px;
    font-weight:700;
}

.profile-role{
    color:#777;
    margin-bottom:0;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.form-control{
    border-radius:14px;
    height:55px;
    border:1px solid #E5E5E5;
}

.address-input{
    min-height:120px;
    padding-top:15px;
}

.save-btn{
    width:100%;
    border:none;
    background:#159A38;
    color:white;
    padding:16px;
    border-radius:14px;
    font-weight:600;
    font-size:15px;
    transition:.25s;
}

.save-btn:hover{
    background:#11802F;
}

.save-btn i{
    margin-right:8px;
}

.profile-form{
    max-width:700px;
    margin:40px auto 0;
}

.form-group{
    margin-bottom:22px;
}

.form-group label{
    display:block;
    font-size:15px;
    font-weight:600;
    margin-bottom:8px;
    color:#222;
}

.form-control{
    width:100%;
    height:54px;
    border:1px solid #E5E7EB;
    border-radius:14px;
    padding:0 18px;
    font-size:15px;
    background:#fff;
}

textarea.form-control{
    height:120px;
    resize:none;
    padding-top:14px;
}

.readonly-input{
    background:#F8F9FA;
    color:#777;
}

.save-btn{
    width:100%;
    height:56px;
    border:none;
    border-radius:14px;
    background:#159A38;
    color:#fff;
    font-size:16px;
    font-weight:600;
    margin-top:10px;
    transition:.3s;
}

.save-btn:hover{
    background:#12802F;
}

</style>

<script>

document
.getElementById('profile_photo')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document
            .getElementById('previewImage')
            .src = event.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection