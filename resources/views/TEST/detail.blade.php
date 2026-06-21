<!DOCTYPE html>
<html>
<head>
    <title>Donation Detail</title>
</head>
<body>

<h1>{{ $donation['title'] }}</h1>

<hr>

<p>
    {{ $donation['description'] }}
</p>

<p>
    Quantity:
    {{ $donation['quantity'] }}
</p>

<p>
    Status:
    {{ $donation['status'] }}
</p>

<p>
    Pickup:
    {{ $donation['pickup_address'] }}
</p>

<a href="/test/donations">
    Kembali
</a>

</body>
</html>