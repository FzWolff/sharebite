<h1>My Donations</h1>

@foreach($donations as $donation)

<div style="border:1px solid black;padding:10px;margin:10px">

    <h3>{{ $donation->title }}</h3>

    <p>
        {{ $donation->quantity }}
        {{ $donation->unit }}
    </p>

    <p>
        {{ $donation->status }}
    </p>
    
    <a href="/test/my-donations/{{ $donation->id }}">
    Detail
    </a>
</div>

@endforeach