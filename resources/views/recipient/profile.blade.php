@extends('layouts.recipient')

@section('title', 'Profil Lembaga')

@section('content')

<div class="profile-page">

    <div class="page-header">

        <h1>
            <i class="bi bi-arrow-left"></i>
            Profil Lembaga
        </h1>

    </div>

    @if(session('success'))

        <div class="success-alert">
            {{ session('success') }}
        </div>

    @endif

    <form
        action="{{ url('/recipient/profile/update') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="profile-container">

            <div class="profile-top">

                <div class="profile-avatar-wrapper">

                    @if($user->profile_photo)

                    <img
                    id="profilePreview"
                    src="{{ asset('storage/'.$user->profile_photo) }}"
                    class="profile-photo-preview">

                    @else

                    <div class="profile-avatar-placeholder">

                        {{ strtoupper(substr($user->name,0,1)) }}

                    </div>

                    @endif

                    <label class="edit-avatar-btn">
                        <i class="bi bi-pencil-fill"></i>

                        <input
                            type="file"
                            name="profile_photo"
                            id="profilePhotoInput"
                            hidden>
                    </label>

                </div>

                <h2>
                    {{ $user->organization_name ?? $user->name }}
                </h2>

                <p>Lembaga Penerima Bantuan</p>

        </div>

            <div class="profile-card">

                <div class="form-group">

                    <label>Nama Lembaga</label>

                    <input
                        type="text"
                        name="organization_name"
                        value="{{ $user->organization_name }}"
                    >

                </div>

                <div class="form-group">

                    <label>Email Organisasi</label>

                    <input
                        type="email"
                        name="organization_email"
                        value="{{ $user->organization_email ?? $user->email }}"
                    >

                </div>

                <div class="form-group">

                    <label>No. Telepon</label>

                    <input
                        type="text"
                        name="organization_phone"
                        value="{{ $user->organization_phone }}"
                    >

                </div>

                <div class="form-group">

                    <label>Alamat</label>

                    <textarea
                        name="organization_address"
                        rows="4"
                    >{{ $user->organization_address }}</textarea>

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