<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Test</title>
</head>
<body>

<h1>Dashboard ShareBite</h1>

<hr>

<h3>Total Donasi</h3>
<p>{{ $dashboard['total_donations'] }}</p>

<h3>Available Donasi</h3>
<p>{{ $dashboard['available_donations'] }}</p>

<h3>Total Request</h3>
<p>{{ $dashboard['total_requests'] }}</p>

<h3>Pending Request</h3>
<p>{{ $dashboard['pending_requests'] }}</p>

</body>
</html>