@extends('layouts.admin')

@section('title','Kelola Pengajuan')

@section('content')

<div class="admin-donations">

```
<div class="page-header">

    <h1>
        <i class="bi bi-file-earmark-text"></i>
        Kelola Pengajuan
    </h1>

</div>

<div class="table-wrapper">

    <table class="donation-table">

        <thead>

            <tr>

                <th>ID</th>
                <th>Penerima</th>
                <th>Donasi</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($requests as $request)

            <tr>

                <td>
                    {{ $request->id }}
                </td>

                <td>
                    {{ $request->recipient->organization_name ?? $request->recipient->name }}
                </td>

                <td>
                    {{ $request->donation->title ?? '-' }}
                </td>

                <td>
                    {{ $request->quantity_requested }}
                </td>

                <td>

                    @if($request->status == 'pending')

                        <span class="status-badge sb-badge sb-badge-warning">
                            Menunggu
                        </span>

                    @elseif($request->status == 'approved')

                        <span class="status-badge sb-badge sb-badge-success">
                            Disetujui
                        </span>

                    @elseif($request->status == 'rejected')

                        <span class="status-badge sb-badge sb-badge-danger">
                            Ditolak
                        </span>

                    @endif

                </td>

                <td class="action-buttons">

                    @if($request->status == 'pending')

                    <form
                        method="POST"
                        action="/admin/requests/{{ $request->id }}/approve"
                        style="display:inline;"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="approve-btn"
                        >
                            <i class="bi bi-check-circle"></i>
                        </button>

                    </form>

                    <form
                        method="POST"
                        action="/admin/requests/{{ $request->id }}/reject"
                        style="display:inline;"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="delete-btn"
                        >
                            <i class="bi bi-x-circle"></i>
                        </button>

                    </form>

                    @else

                        -

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6">
                    Belum ada pengajuan.
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection
