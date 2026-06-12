<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Teman Rindu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#fff0f5,#ffe4ec);
    min-height:100vh;
    font-family:'Segoe UI',sans-serif;
}

.card-register{
    max-width:550px;
    margin:auto;
    margin-top:50px;
    border:none;
    border-radius:30px;
    background:#fff;
    box-shadow:0 15px 40px rgba(255,0,100,.15);
    overflow:hidden;
}

.header-register{
    background:linear-gradient(135deg,#ff4d6d,#ff758f);
    padding:40px;
    text-align:center;
    color:white;
}

.logo{
    font-size:55px;
    margin-bottom:10px;
}

.header-register h1{
    font-weight:bold;
    margin:0;
}

.form-control{
    border-radius:15px;
    padding:12px;
    border:2px solid #f1f1f1;
}

.form-control:focus{
    border-color:#ff4d6d;
    box-shadow:none;
}

.btn-daftar{
    background:linear-gradient(135deg,#ff4d6d,#ff758f);
    border:none;
    border-radius:15px;
    padding:12px;
    color:white;
    font-weight:bold;
    font-size:18px;
}

.btn-daftar:hover{
    transform:translateY(-2px);
}

.login-link{
    text-decoration:none;
    color:#ff4d6d;
    font-weight:bold;
}
.header-register h1{
    font-size:38px;
    font-weight:700;
    margin:0;
}

.header-register p{
    font-size:15px;
    margin-top:8px;
}

.login-link{
    font-size:16px;
}

</style>

</head>
<body>

<div class="container">

<div class="card card-register">

<div class="header-register">

<div class="logo">
💖
</div>

<h1>Teman Rindu</h1>

<p class="mb-0">
Temukan pasangan dan teman baru
</p>

</div>

<div class="card-body p-5">

<form action="/register" method="POST">

@csrf

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Nomor HP OnoPay</label>
<input type="text" name="nomor_hp" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" class="btn-daftar w-100">
💖 Buat Akun
</button>

</form>

<hr>

<div class="text-center mt-4">

<p>
Sudah punya akun?
</p>

<a href="/login" class="login-link">
Masuk Sekarang
</a>

</div>

</div>

</div>

</div>

</body>
</html>