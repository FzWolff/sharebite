<h1>Dashboard Recipient</h1>

<hr>

<p>Nama : {{ $user->name }}</p>

<p>Email : {{ $user->email }}</p>

<p>Role : {{ $user->role }}</p>

<p>
Organisasi :
{{ $user->organization_name }}
</p>

<hr>

<h3>Total Request Saya</h3>

<p>{{ $totalRequests }}</p>

<h3>Pending Request</h3>

<p>{{ $pendingRequests }}</p>

<hr>

<a href="/test/donations">
    📦 Lihat Donasi
</a>

<br><br>

<a href="/test/my-requests">
    📨 Request Saya
</a>

<br><br>

<a href="/test/logout">
    🚪 Logout
</a>