<h1>Kelola User</h1>

@foreach($users as $user)

<div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">

    <h3>{{ $user->name }}</h3>

    <p>{{ $user->email }}</p>

    <p>
        Role :
        {{ $user->role }}
    </p>

    <p>
        ⭐ {{ number_format($user->rating ?? 0, 1) }}
        ({{ $user->review_count }} Review)
    </p>

</div>

@endforeach