<h1>Dashboard Admin</h1>

<hr>

<p>Nama : {{ $user->name }}</p>
<p>Email : {{ $user->email }}</p>
<p>Role : {{ $user->role }}</p>

<hr>

<h2>Statistik Donasi</h2>

<p>Total Donasi : {{ $stats['total_donations'] }}</p>
<p>Available : {{ $stats['available_donations'] }}</p>
<p>Partially Taken : {{ $stats['partially_taken_donations'] }}</p>
<p>Completed : {{ $stats['completed_donations'] }}</p>
<p>Cancelled : {{ $stats['cancelled_donations'] }}</p>

<hr>

<h2>Statistik Request</h2>

<p>Total Request : {{ $stats['total_requests'] }}</p>
<p>Pending : {{ $stats['pending_requests'] }}</p>
<p>Approved : {{ $stats['approved_requests'] }}</p>
<p>Rejected : {{ $stats['rejected_requests'] }}</p>
<p>Cancelled : {{ $stats['cancelled_requests'] }}</p>

<hr>

<a href="/test/admin/donations">
    📦 Kelola Donasi
</a>

<br><br>

<a href="/test/admin/requests">
    📨 Kelola Request
</a>

<br><br>

<a href="/test/admin/users">
    👥 Kelola User
</a>

<br><br>

<a href="/test/logout">
    🚪 Logout
</a>