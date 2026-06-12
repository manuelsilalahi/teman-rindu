<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Teman Rindu - Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(
        135deg,
        #ffd6e8,
        #ffc1dc
    );

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;
}

.login-card{
    width:450px;
    background:white;
    border-radius:30px;
    padding:40px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.logo{
    width:180px;
    display:block;
    margin:auto;
    margin-bottom:15px;

    border-radius:35px;

    filter:drop-shadow(
        0px 8px 20px rgba(255,79,154,.4)
    );
}

.judul{
    color:#ff4f9a;
    font-size:48px;
    font-weight:bold;
    text-align:center;
}

.subjudul{
    text-align:center;
    color:#666;
    margin-bottom:30px;
}

.form-control{
    height:55px;
    border-radius:15px;
    border:2px solid #ffd1e6;
}

.form-control:focus{
    border-color:#ff4f9a;
    box-shadow:none;
}

.btn-login{
    background:#ff4f9a;
    color:white;
    height:55px;
    border-radius:15px;
    font-size:20px;
    font-weight:bold;

    transition:0.3s;
    border:none;
}
.btn-login:hover{
    background:#ff2f84;
    color:white;

    transform:translateY(-3px);

    box-shadow:0 10px 20px rgba(255,79,154,.4);
}
.btn-login:hover{
    background:#ff2f84;
    color:white;
}

.garis{
    text-align:center;
    margin-top:25px;
    margin-bottom:15px;
    color:#ff4f9a;
    font-size:20px;
}

.daftar{
    text-align:center;
}

.daftar a{
    color:#ff4f9a;
    text-decoration:none;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="login-card">

    <!-- LOGO -->
  <img src="{{ asset('logo.png') }}" class="logo">

    <h1 class="judul">Teman Rindu</h1>

    <p class="subjudul">
        Temukan teman baru dan pasangan yang berarti ❤️
    </p>

<form action="/login" method="POST">
    @csrf

        <div class="mb-3">
            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Masukkan Email"
                   required>
        </div>

        <div class="mb-3">
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan Password"
                   required>
        </div>

        <button type="submit"
                class="btn btn-login w-100">
            LOGIN
        </button>

    </form>

    <div class="garis">
        ❤️
    </div>

    <div class="daftar">
        Belum punya akun?
        <a href="register.php">
            Daftar sekarang
        </a>
    </div>

</div>

</body>
</html>