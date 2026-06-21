<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tentang Kami - ShareBite</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#C7D9BC;
    font-family:'Poppins',sans-serif;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.about-box{
    max-width:900px;
    width:100%;
    background:#F4EEDF;
    border-radius:20px;
    padding:50px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.about-title{
    text-align:center;
    font-size:52px;
    font-weight:700;
    margin-bottom:20px;
    color:#222;
}

.about-text{
    text-align:center;
    font-size:24px;
    max-width:700px;
    margin:auto;
    line-height:1.6;
    color:#444;
}

.feature-card{
    background:white;
    border:none;
    border-radius:16px;
    padding:25px;
    text-align:center;
    height:100%;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    transition:0.3s;
}

.feature-card:hover{
    transform:translateY(-5px);
}

.icon-circle{
    width:70px;
    height:70px;
    background:#0C9A3E;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:32px;
    margin:auto;
    margin-bottom:15px;
}

.feature-title{
    font-size:22px;
    font-weight:600;
    color:#222;
}

.feature-desc{
    margin-top:15px;
    color:#555;
    line-height:1.6;
}

</style>
</head>

<body>

<div class="about-box">

    <h1 class="about-title">
        Tentang Kami
    </h1>

    <p class="about-text">
        ShareBite adalah platform yang menghubungkan
        donatur, relawan, dan penerima bantuan
        untuk menciptakan lingkungan tanpa kelaparan.
    </p>

    <div class="row mt-5 g-4">

        <div class="col-md-4">

            <div class="feature-card">

                <div class="icon-circle">
                    📦
                </div>

                <div class="feature-title">
                    Donasi Makanan
                </div>

                <div class="feature-desc">
                    Salurkan makanan berlebih Anda kepada
                    yang membutuhkan dengan mudah dan aman.
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="feature-card">

                <div class="icon-circle">
                    👥
                </div>

                <div class="feature-title">
                    Relawan
                </div>

                <div class="feature-desc">
                    Bergabung menjadi relawan dan bantu
                    distribusi makanan kepada penerima.
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="feature-card">

                <div class="icon-circle">
                    🤝
                </div>

                <div class="feature-title">
                    Bantu Tepat Sasaran
                </div>

                <div class="feature-desc">
                    Donasi disalurkan kepada penerima yang
                    telah terverifikasi oleh sistem.
                </div>

            </div>

        </div>

    </div>
<a href="/" class="btn btn-success mt-4">
    Kembali ke Beranda
</a>
</div>

</body>
</html>