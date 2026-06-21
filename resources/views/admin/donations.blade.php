@extends('layouts.admin')

@section('title','Kelola Donasi')

@section('content')

<div class="admin-donations">

    <div class="page-header">

        <h1>
            <i class="bi bi-arrow-left"></i>
            Kelola Donasi
        </h1>

    </div>

    <div class="search-wrapper">

        <div class="search-box">

            <input type="text"
                   placeholder="Cari Donasi">

            <i class="bi bi-search"></i>

        </div>

    </div>

    <div class="table-wrapper">

        <table class="donation-table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Donatur</th>
                    <th>Makanan</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>

        <tbody>

        @forelse($donations as $donation)

        <tr>

            <td>
                {{ substr($donation->id,0,8) }}
            </td>

            <td>
                {{ $donation->donor->name ?? '-' }}
            </td>

            <td>
                {{ $donation->title }}
            </td>

            <td>
                {{ $donation->quantity }}
                {{ $donation->unit }}
            </td>

            <td>
                {{ $donation->created_at->format('d M Y') }}
            </td>

            <td>

                @php

                    $badgeClass = 'sb-badge-warning';
                    $label = 'Diproses';

                    if($donation->status == 'available'){
                        $badgeClass = 'sb-badge-success';
                        $label = 'Tersedia';
                    }

                    if($donation->status == 'partially_taken'){
                        $badgeClass = 'sb-badge-warning';
                        $label = 'Sebagian Diambil';
                    }

                    if($donation->status == 'completed'){
                        $badgeClass = 'sb-badge-success';
                        $label = 'Selesai';
                    }

                    if($donation->status == 'cancelled'){
                        $badgeClass = 'sb-badge-danger';
                        $label = 'Dibatalkan';
                    }

                @endphp

                <span class="status-badge sb-badge {{ $badgeClass }}">
                    {{ $label }}
                </span>

            </td>

            <td class="action-buttons">

                <a href="/admin/donations/{{ $donation->id }}/edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <form
                    action="/admin/donations/{{ $donation->id }}/delete"
                    method="POST"
                    style="display:inline;"
                    onsubmit="return confirm(
                        'Yakin ingin menghapus donasi ini?'
                    );"
                >

                    @csrf

                    <button
                        type="submit"
                        class="delete-btn"
                    >
                        <i class="bi bi-trash"></i>
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center">
                Belum ada data donasi
            </td>

        </tr>

        @endforelse

        </tbody>

        </table>

        <div class="pagination-wrapper">

            {{ $donations->links() }}

        </div>

    </div>

</div>

@endsection