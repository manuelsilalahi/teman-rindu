<!DOCTYPE html>
<html>
<head>

<title>Dompet Koin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.dompet-card{
    border:none;
    border-radius:30px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.saldo{
    font-size:60px;
    font-weight:700;
    color:#ffb400;
}

</style>

</head>
<body>

<div class="container mt-5">

<div class="card dompet-card">

<div class="card-body text-center p-5">

<h2>
💰 Dompet Koin
</h2>

<div class="saldo">
{{ number_format($saldo_onopay) }}
</div>

<p class="text-muted">
Saldo koin yang Anda miliki
</p>

<h5 class="mt-4 mb-3">
💰 Top Up Saldo
</h5>

<div class="d-flex gap-2 justify-content-center flex-wrap">

    <a href="/topup/500000"
       class="btn btn-success">
       +500.000
    </a>

    <a href="/topup/5000000"
       class="btn btn-success">
       +5.000.000
    </a>

    <a href="/topup/20000000"
       class="btn btn-success">
       +20000000
    </a>

    <a href="/topup/50000000"
       class="btn btn-success">
       +50000000
    </a>

</div>

<a href="/dashboard"
class="btn btn-secondary mt-3">

← Kembali ke Dashboard

</a>

</div>

</div>

<hr class="mt-5">

<h4 class="mb-3">
📜 Riwayat Transfer
</h4>

@forelse($riwayat as $item)

<div class="card mb-2 border-0 shadow-sm">
    <div class="card-body">

        <b>
        🎁 Kirim ke {{ $item->nama_penerima }}
        </b>

        <br>

        <span class="text-warning">
        -{{ number_format($item->jumlah_koin) }} koin
        </span>

        <br>

        <small class="text-muted">
        {{ $item->tanggal }}
        </small>

    </div>
</div>

@empty

<div class="alert alert-light">
    Belum ada riwayat transfer.
</div>

@endforelse

</div>

</body>
</html>