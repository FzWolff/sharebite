@extends('layouts.admin')

@section('title','Kelola User')

@section('content')

<div class="admin-recipients">


<div class="page-header">

    <h1>
        <i class="bi bi-people"></i>
        Kelola User
    </h1>

<div class="user-stats">

    <div class="stat-card">

        <h3>Admin</h3>

        <h2>{{ $adminCount }}</h2>

    </div>

    <div class="stat-card">

        <h3>Donatur</h3>

        <h2>{{ $donorCount }}</h2>

    </div>

    <div class="stat-card">

        <h3>Penerima</h3>

        <h2>{{ $recipientCount }}</h2>

    </div>

</div>

</div>

<div class="search-wrapper">

    <div class="search-box">

        <input
            type="text"
            placeholder="Cari User">

        <i class="bi bi-search"></i>

    </div>

</div>

<div class="table-wrapper">

    <table class="recipient-table">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($users as $user)

            <tr>

                <td>
                    {{ $user->id }}
                </td>

                <td>
                    {{ $user->name }}
                </td>

                <td>
                    {{ $user->email }}
                </td>

                <td>

                    @if($user->role == 'admin')

                        <span class="status-badge sb-badge sb-badge-danger">
                            Admin
                        </span>

                    @elseif($user->role == 'donor')

                        <span class="status-badge sb-badge sb-badge-warning">
                            Donatur
                        </span>

                    @else

                        <span class="status-badge sb-badge sb-badge-success">
                            Penerima
                        </span>

                    @endif

                </td>

                <td>

                    <span class="status-badge sb-badge sb-badge-success">
                        Aktif
                    </span>

                </td>

                <td class="action-buttons">

                <a href="/admin/users/{{ $user->id }}/edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form
                    action="/admin/users/{{ $user->id }}/delete"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf

                    <button
                        type="submit"
                        onclick="return confirm('Yakin hapus user ini?')"
                    >
                        <i class="bi bi-trash"></i>
                    </button>

                </form>

            </td>

            </tr>

            @empty

            <tr>

                <td colspan="5">
                    Belum ada user.
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<div class="custom-pagination">

    @if ($users->onFirstPage())

        <span class="page-disabled">
            <i class="bi bi-chevron-left"></i>
        </span>

    @else

        <a href="{{ $users->previousPageUrl() }}">
            <i class="bi bi-chevron-left"></i>
        </a>

    @endif

    @for ($i = 1; $i <= $users->lastPage(); $i++)

        <a
            href="{{ $users->url($i) }}"
            class="{{ $users->currentPage() == $i ? 'active' : '' }}"
        >
            {{ $i }}
        </a>

    @endfor

    @if ($users->hasMorePages())

        <a href="{{ $users->nextPageUrl() }}">
            <i class="bi bi-chevron-right"></i>
        </a>

    @else

        <span class="page-disabled">
            <i class="bi bi-chevron-right"></i>
        </span>

    @endif

</div>

</div>

@endsection
