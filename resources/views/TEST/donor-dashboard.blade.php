<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Donor</title>
</head>
<body>

<h1>Dashboard Donor</h1>

<hr>

<p>Nama : {{ $user->name }}</p>
<p>Email : {{ $user->email }}</p>
<p>Role : {{ $user->role }}</p>

<hr>

<h3>Menu</h3>

<a href="/test/create-donation">
    ➕ Buat Donasi
</a>

<br><br>

<a href="/test/my-donations">
    📦 Donasi Saya
</a>

<br><br>

<a href="/test/donor-requests">
    📥 Request Masuk
</a>

<br><br>

<a href="/test/logout">
    🚪 Logout
</a>

</body>
</html>