<!DOCTYPE html>
<html>
<head>
    <title>Donations Test</title>
</head>
<body>

<h1>Daftar Donasi</h1>

<hr>

@foreach($donations as $donation)

<div style="border:1px solid black;padding:10px;margin:10px">

    <h3>{{ $donation['title'] }}</h3>

    <p>
        Qty :
        {{ $donation['quantity'] }}
        {{ $donation['unit'] }}
    </p>

    <p>
        Status :
        {{ $donation['status'] }}
    </p>

    <a href="/test/donations/{{ $donation['id'] }}">
        Detail
    </a>

</div>

@endforeach

</body>
</html>