<!DOCTYPE html>
<html>
<head>
    <title>Register ShareBite</title>
</head>
<body>

<h1>Register ShareBite</h1>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/test/register">
    @csrf

    <div>
        <label>Nama</label><br>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input type="password" name="password">
    </div>

    <br>

    <div>
        <label>Role</label><br>

        <select name="role" required>
            <option value="">Pilih Role</option>
            <option value="donor">Donor</option>
            <option value="recipient">Recipient</option>
        </select>
    </div>

    <br>

    <div id="recipient-fields" style="display:none">

        <h3>Data Organisasi</h3>

        <div>
            <label>Nama Organisasi</label><br>
            <input type="text" name="organization_name">
        </div>

        <br>

        <div>
            <label>Email Organisasi</label><br>
            <input type="email" name="organization_email">
        </div>

        <br>

        <div>
            <label>Telepon Organisasi</label><br>
            <input type="text" name="organization_phone">
        </div>

        <br>

        <div>
            <label>Alamat Organisasi</label><br>
            <textarea name="organization_address"></textarea>
        </div>

    </div>

    <br>

    <button type="submit">
        Register
    </button>

</form>

<script>
const roleSelect = document.getElementById('role');
const recipientFields = document.getElementById('recipient-fields');

roleSelect.addEventListener('change', function () {

    if (this.value === 'recipient') {
        recipientFields.style.display = 'block';
    } else {
        recipientFields.style.display = 'none';
    }

});
</script>

</body>
</html>