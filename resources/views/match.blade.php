<!DOCTYPE html>
<html>
<head>

<title>Teman Rindu - Cari Pasangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.header{
    background:white;
    padding:20px;
    box-shadow:0 2px 15px rgba(0,0,0,.08);
}

.logo-title{
    color:#ff4f9a;
    font-size:38px;
    font-weight:700;
}

.profile-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
    background:white;
}

.avatar{
    width:120px;
    height:120px;
    background:#ffd6e8;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    font-size:55px;
}

.avatar-foto{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:auto;
    border:4px solid #ffd6e8;
}

.btn-match{
    background:#ff4f9a;
    color:white;
    border:none;
}

.btn-match:hover{
    background:#ff2f84;
    color:white;
}

.info-box{
    background: #fff5fa;
    border: 1px solid #ffd6e8;
    border-radius: 18px;
    padding: 15px;
    margin: 20px 0;
    box-shadow: 0 4px 12px rgba(255, 79, 154, 0.08);
}

.info-item{
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
    font-size: 17px;
    color: #555;
}

.info-item:not(:last-child){
    border-bottom: 1px solid #f3dbe5;
}

</style>

</head>
<body>

<div class="header">
    <div class="container">
        <h1 class="logo-title">Teman Rindu</h1>
    </div>
</div>

<div class="container mt-5">

<h2 class="text-center mb-5">
Temukan Pasangan Baru
</h2>

<div class="row">



@foreach($users as $user)

<div class="col-md-4 mb-4">

<div class="card profile-card">

<div class="card-body text-center">

@if(!empty($user->foto))

<img
src="{{ asset('uploads_profil/' . $user->foto) }}"
class="avatar-foto">

@else

<div class="avatar">
👤
</div>

@endif

<h3 class="fw-bold mt-3">
{{ $user->nama }}
</h3>

<div class="badge bg-danger mb-2">
75% Cocok
</div>

<div class="info-box">

    <div class="info-item">
        🎂 <strong>Umur:</strong> {{ $user->umur ?? '-' }} Tahun
    </div>

    <div class="info-item">
        📍 <strong>Kota:</strong> {{ $user->kota ?? 'Belum diisi' }}
    </div>

    <div class="info-item">
        📝 <strong>Bio:</strong> {{ $user->bio ?? 'Belum ada bio' }}
    </div>

</div>

<a href="/match/{{ $user->id }}"
class="btn btn-match w-100">

💘 Match

</a>

</div>

</div>

</div>

@endforeach

</div>

<div class="text-center mt-4">

<a href="/dashboard" class="btn btn-secondary">
← Kembali ke Dashboard
</a>

</div>

</div>

</body>
</html>