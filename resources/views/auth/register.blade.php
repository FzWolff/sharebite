<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ShareBite</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#C8DDBE;
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-card{
            background:#EFE8D8;
            width:500px;
            border-radius:15px;
            padding:40px;
        }

        .logo{
            text-align:center;
            margin-bottom:8px;
        }

        .logo-img{
            width:225px;
            display:block;
            margin:0 auto;
        }

        .logo h2{
            color:#0B8F35;
            font-weight:700;
            margin-top:10px;
        }

        .title{
            text-align:center;
            margin-top:0;
            margin-bottom:25px;
        }

        .subtitle{
            text-align:center;
            margin-bottom:35px;
            color:#444;
        }

        .form-label{
            font-weight:500;
        }

        .form-control,
        .form-select{
            border-radius:10px;
            height:48px;
        }
        textarea.form-control{
        height:auto;
        }

        .btn-register{
            background:#0B8F35;
            color:white;
            width:100%;
            height:48px;
            border:none;
            border-radius:10px;
            font-weight:600;
            margin-top:15px;
        }

        .btn-register:hover{
            background:#08752c;
        }

        .bottom-text{
            text-align:center;
            margin-top:20px;
            font-size:14px;
        }

        .bottom-text a{
            color:#0B8F35;
            text-decoration:none;
            font-weight:600;
        }

        .back-home{
            display:inline-flex;
            align-items:center;
            gap:8px;
            color:#0B8F35;
            text-decoration:none;
            font-weight:600;
            margin-bottom:15px;
        }

        .back-home:hover{
            color:#08752c;
        }
    </style>
</head>
<body>

    <div style="position:absolute;top:30px;left:30px;">
    <a href="/" class="back-home">
        ← Kembali ke Beranda
    </a>
    </div>
    
<div class="register-card">

    <div class="logo">
        <img
            src="{{ asset('images/logo-sharebite.png') }}"
            alt="ShareBite"
            class="logo-img"
            >
    </div>

    <h2 class="title">
        Buat Akun Baru
    </h2>

    <p class="subtitle">
        Daftar untuk memulai kebaikan
    </p>

    <form method="POST" action="/register">
        @csrf

        <form method="POST" action="/register">
    @csrf


<div class="mb-3">
    <label class="form-label">
        Nama Lengkap
    </label>

    <input
        type="text"
        name="name"
        class="form-control"
        placeholder="Masukkan nama lengkap"
    >
</div>

<div class="mb-3">
    <label class="form-label">
        Email
    </label>

    <input
        type="email"
        name="email"
        class="form-control"
        placeholder="Masukkan email"
    >
</div>

<div class="mb-3">
    <label class="form-label">
        Kata Sandi
    </label>

    <input
        type="password"
        name="password"
        class="form-control"
        placeholder="Masukkan kata sandi"
    >
</div>

<div class="mb-3">
    <label class="form-label">
        Pilih Peran
    </label>

    <select
        name="role"
        class="form-select"
        id="role"
    >
        <option value="">
            Pilih Peran
        </option>

        <option value="donor">
            Donatur
        </option>

        <option value="recipient">
            Penerima
        </option>

    </select>
</div>

<div id="organization-fields" style="display:none;">

    <div
        class="alert alert-success"
        style="
            border-radius:10px;
            margin-bottom:15px;
        "
    >
        Lengkapi data lembaga untuk akun penerima bantuan.
    </div>

    <div class="mb-3">
        <label class="form-label">
            Nama Lembaga
        </label>

        <input
            type="text"
            name="organization_name"
            class="form-control"
            placeholder="Contoh: Yayasan Harapan Bangsa"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">
            Email Lembaga
        </label>

        <input
            type="email"
            name="organization_email"
            class="form-control"
            placeholder="info@yayasan.org"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">
            Telepon Lembaga
        </label>

        <input
            type="text"
            name="organization_phone"
            class="form-control"
            placeholder="08xxxxxxxxxx"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">
            Alamat Lembaga
        </label>

        <textarea
            name="organization_address"
            class="form-control"
            rows="3"
            placeholder="Alamat lengkap lembaga"
        ></textarea>
    </div>

</div>

<button
    type="submit"
    class="btn-register"
>
    Register
</button>


</form>

<script>

const roleSelect =
document.getElementById('role');

const organizationFields =
document.getElementById(
    'organization-fields'
);

function toggleOrganizationFields()
{
    if(roleSelect.value === 'recipient')
    {
        organizationFields.style.display =
            'block';
    }
    else
    {
        organizationFields.style.display =
            'none';
    }
}

roleSelect.addEventListener(
    'change',
    toggleOrganizationFields
);

toggleOrganizationFields();

</script>

</body>
</html>