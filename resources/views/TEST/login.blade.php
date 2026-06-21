<!DOCTYPE html>
<html>
<head>
    <title>Login Test</title>
</head>
<body>

<h1>Login Test ShareBite</h1>

@if(session('success'))
    <p style="color:green">
        {{ session('success') }}
    </p>
@endif

@if(session('error'))
    <p style="color:red">
        {{ session('error') }}
    </p>
@endif

<form method="POST" action="/test/login">
    @csrf

    <div>
        <label>Email</label>
        <br>
        <input type="email" name="email">
    </div>

    <br>

    <div>
        <label>Password</label>
        <br>
        <input type="password" name="password">
    </div>

    <br>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>