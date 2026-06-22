<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Notifikasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.judul{
    color:#ff4f9a;
    font-size:42px;
    font-weight:700;
}

.notif-card{
    border:none;
    border-radius:20px;
    background:white;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    transition:.3s;
    overflow:hidden;
}

.notif-card:hover{
    transform:translateY(-5px);
}

.notif-icon{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#ffe3ef;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.notif-pesan{
    font-size:17px;
    font-weight:600;
}

.notif-waktu{
    color:#888;
    font-size:13px;
}

.notif-baru{
    width:12px;
    height:12px;
    border-radius:50%;
    background:#ff4f9a;
}

.empty-box{
    background:white;
    border-radius:25px;
    padding:60px;
    text-align:center;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

</style>

</head>
<body>

<div class="container mt-4">

<h2 class="mb-4 text-center">
Notifikasi
</h2>





</div>

@if($notifikasi->count() > 0)

@foreach($notifikasi as $notif)

<div class="card notif-card mb-3">

<div class="card-body">

<div class="d-flex align-items-center">

<div class="notif-icon">
    <i class="bi bi-heart-fill text-danger"></i>
</div>

<div class="ms-3">

<h5 class="mb-1">
{{ $notif->pesan }}
</h5>

<small class="text-muted">
{{ $notif->tanggal }}
</small>

</div>

</div>

</div>

</div>

@endforeach

@else

<div class="card notif-card">

<div class="card-body text-center p-5">

<h4>
    <i class="bi bi-bell-slash-fill text-secondary me-2"></i>
    Belum Ada Notifikasi
</h4>

@foreach($notifikasi as $notif)

<div class="card notif-card mb-3">

<div class="card-body">

<div class="d-flex align-items-center">

<div class="notif-icon">
❤️
</div>

<div class="ms-3">

<h5 class="mb-1">
{{ $notif->pesan }}
</h5>

<small class="text-muted">
{{ $notif->tanggal }}
</small>

</div>

</div>

<small class="text-muted">
{{ $notif->tanggal }}
</small>

</div>

</div>

@endforeach

</div>

</div>

@endif

<div class="text-center">

<a href="/dashboard" class="btn btn-secondary mt-4">
    <i class="bi bi-arrow-left me-2"></i>
    Kembali ke Dashboard
</a>

</a>

</div>

</body>
</html>