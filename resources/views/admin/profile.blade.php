@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')

<div class="profile-page">

```
<div class="page-header">

    <h1>
        <i class="bi bi-person-circle"></i>
        Profil Admin
    </h1>

</div>

@if(session('success'))

    <div class="success-alert">

        {{ session('success') }}

    </div>

@endif

<form
    action="{{ url('/admin/profile/update') }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf

    <div class="profile-container">

        <div class="profile-top">

<div class="profile-avatar-wrapper">

    <img
        id="profilePreview"
        src="{{ $user->profile_photo
            ? asset('storage/'.$user->profile_photo)
            : asset('images/default-avatar.png') }}"
        class="profile-photo-preview">

    <label class="edit-avatar-btn">

        <i class="bi bi-pencil-fill"></i>

        <input
            type="file"
            name="profile_photo"
            id="profilePhotoInput"
            hidden>

    </label>

</div>

            <h2>{{ $user->name }}</h2>

            <p>Administrator Sistem</p>

        </div>

        <div class="profile-card">

            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ $user->name }}"
                >

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ $user->email }}"
                >

            </div>

            <div class="form-group">

                <label>No. Telepon</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ $user->phone }}"
                >

            </div>

            <div class="form-group">

                <label>Role</label>

                <input
                    type="text"
                    value="Administrator"
                    disabled
                >

            </div>

            <div class="form-group">

                <label>Bergabung Sejak</label>

                <input
                    type="text"
                    value="{{ $user->created_at->format('d F Y') }}"
                    disabled
                >

            </div>

            <button
                type="submit"
                class="save-profile-btn">

                Simpan Perubahan

            </button>

        </div>

    </div>

</form>
```

</div>

<script>

document
.getElementById('profilePhotoInput')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document
            .getElementById('profilePreview')
            .src = event.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection
