@extends('layouts.admin')

@section('title','Edit User')

@section('content')

<div class="admin-profile">

```
<div class="page-header">

    <h1>
        <i class="bi bi-pencil-square"></i>
        Edit User
    </h1>

</div>

<form
    action="/admin/users/{{ $user->id }}/update"
    method="POST"
>

    @csrf

    <div class="profile-card">

        <div class="form-group">

            <label>Nama</label>

            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
                required
            >

        </div>

        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="{{ $user->email }}"
                required
            >

        </div>

        <div class="form-group">

            <label>No Telepon</label>

            <input
                type="text"
                name="phone"
                value="{{ $user->phone }}"
            >

        </div>

        <div class="form-group">

            <label>Role</label>

            <select name="role">

                <option
                    value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}
                >
                    Admin
                </option>

                <option
                    value="donor"
                    {{ $user->role == 'donor' ? 'selected' : '' }}
                >
                    Donatur
                </option>

                <option
                    value="recipient"
                    {{ $user->role == 'recipient' ? 'selected' : '' }}
                >
                    Penerima
                </option>

            </select>

        </div>

        <button
            type="submit"
            class="save-btn"
        >
            Simpan Perubahan
        </button>

    </div>

</form>
```

</div>

@endsection
