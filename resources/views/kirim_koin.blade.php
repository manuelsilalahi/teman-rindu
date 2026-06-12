<!DOCTYPE html>
<html>
<head>

<title>Kirim Koin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.card-koin{
    border:none;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.saldo{
    font-size:40px;
    font-weight:bold;
    color:#ffb400;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card card-koin">

<div class="card-body p-5">

<h2 class="text-center mb-4">
🎁 Kirim Koin
</h2>

<p>
Penerima:
<strong>{{ $penerima->nama }}</strong>
</p>

<p class="text-muted">
📱 {{ $penerima->nomor_hp }}
</p>

<p>
Saldo Anda:
<span class="saldo">
{{ number_format($saldo_onopay) }}
</span>
</p>

<form action="/proses-kirim-koin" method="POST">

@csrf

<input
type="hidden"
name="penerima_id"
value="{{ $penerima->id }}">

<input
type="number"
name="jumlah_koin"
class="form-control"
placeholder="Jumlah koin"
required>

<br>

<button
class="btn btn-warning w-100">

🎁 Kirim Koin

</button>

</form>

<br>

<a href="/daftar-match"
class="btn btn-secondary w-100">

← Kembali

</a>

</div>

</div>

</div>

</body>
</html>