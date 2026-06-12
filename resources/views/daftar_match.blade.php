

<!DOCTYPE html>
<html>
<head>
<title>Teman Rindu - Daftar Match</title>

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

.match-card{
border:none;
border-radius:25px;
overflow:hidden;
background:white;
box-shadow:0 10px 25px rgba(0,0,0,.08);
transition:.3s;
}

.match-card:hover{
transform:translateY(-8px);
box-shadow:0 15px 35px rgba(255,79,154,.25);
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

.btn-chat{
background:#ff4f9a;
color:white;
border:none;
border-radius:12px;
font-weight:600;
padding:10px;
}

.btn-chat:hover{
background:#ff2f84;
color:white;
}

.btn-hapus{
border-radius:12px;
font-weight:600;
}

.match-badge{
background:#ffe3ef;
color:#ff4f9a;
padding:6px 15px;
border-radius:30px;
display:inline-block;
font-size:14px;
margin-bottom:10px;
}

.footer-custom{
text-align:center;
color:#777;
margin-top:40px;
padding:20px;
}

.info-box{
    background:#fff5fa;
    border:1px solid #ffd9e8;
    border-radius:18px;
    padding:15px;
    margin:20px 0;
    box-shadow:0 4px 12px rgba(255,79,154,.08);
}

.info-item{
    padding:8px 0;
    font-size:16px;
    color:#555;
}

.info-item:not(:last-child){
    border-bottom:1px solid #f3dbe5;
}


</style>

</head>
<body>

<div class="header">
    <div class="container">
        <h1 class="logo-title">❤️ Teman Rindu</h1>
    </div>
</div>

<div class="container mt-5">

<h2 class="text-center mb-5">
💕 Match Saya
</h2>

<div class="row text-center justify-content-center">

@forelse($matches as $match)

<div class="col-md-4 mb-4">

<div class="card match-card border-0 shadow-sm p-4 text-center">

@if(!empty($match->foto))

<img
src="{{ asset('uploads_profil/' . $match->foto) }}"
class="avatar-foto">

@else

<div class="avatar">
👤
</div>

@endif

<h3 class="fw-bold mt-3">
    {{ $match->nama }}
</h3>

<div class="info-box">



<div class="info-item">
    🎂 <strong>Umur:</strong>
    {{ $match->umur ?? '-' }} Tahun
</div>

<div class="info-item">
    📍 <strong>Kota:</strong>
    {{ $match->kota ?? 'Belum diisi' }}
</div>

<div class="info-item">
    📝 <strong>Bio:</strong>
    {{ $match->bio ?? 'Belum ada bio' }}
</div>



<a href="/chat/{{ $match->id }}"
class="btn btn-chat w-100">

💬 Chat

</a>

<a href="/kirim-koin/{{ $match->id }}"
class="btn btn-warning w-100 mt-2">

🎁 Kirim Koin

</a>

<a href="/hapus-match/{{ $match->id }}"
class="btn btn-danger w-100 mt-2"
onclick="return confirm('Hapus match ini?')">

🗑️ Hapus Match

</a>

</div>

</div>

@empty

<div class="col-12">

<div class="card shadow-sm border-0 p-5 text-center">

<h3>Belum Ada Match</h3>

<p class="text-muted">
Mulai cari pasangan dan temukan teman baru di Teman Rindu.
</p>

<a href="/match"
class="btn btn-primary">

Cari Pasangan

</a>

</div>

</div>

@endforelse

<div class="col-12">

<a href="/dashboard"
class="btn btn-secondary">

← Kembali ke Dashboard

</a>

</div>

</div>

<footer class="footer-custom">
    © 2026 Teman Rindu • Dibuat dengan oleh Manuel
</footer>

</body>
</html>