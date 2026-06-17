<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Teman Rindu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="style.css">
<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.aksi-post{
    display:flex;
    gap:10px;
    margin-top:15px;
}

.aksi-btn{
    border-radius:12px;
    border:1px solid #eee;
    padding:8px 18px;
    font-weight:500;
}

.aksi-btn:hover{
    background:#ffe3ef;
}

.navbar-custom{
    background:white;
    box-shadow:0 2px 20px rgba(0,0,0,.08);
}

.logo{
    width:60px;
    height:60px;
    border-radius:18px;
}

.brand{
    color:#ff4f9a;
    font-size:38px;
    font-weight:700;
    margin-left:12px;
}

.hero{
    background:linear-gradient(135deg,#ff4f9a,#ff7eb3);
    color:white;
    padding:40px;
    border-radius:30px;
    margin-top:30px;
    box-shadow:0 10px 30px rgba(255,79,154,.3);
}

.hero h1{
    font-size:48px;
    font-weight:700;
    margin-bottom:10px;
}

.hero-subtitle{
    font-size:18px;
    opacity:.95;
    margin:0;
}


    color:white;

    border-radius:25px;

    padding:40px;

    margin-top:30px;

    box-shadow:0 10px 30px rgba(255,79,154,.3);
}

.feature-card{

    border:none;

    border-radius:25px;

    transition:.3s;

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    height:100%;
}

.feature-card:hover{

    transform:translateY(-8px);

    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.icon{
    font-size:55px;
}

.btn-pink{
    background:#ff4f9a;
    color:white;
    border:none;
}

.btn-pink:hover{
    background:#ff2f84;
    color:white;
}

.komentar-box{
    display:none;
    margin-top:15px;
    padding-top:10px;
}

.post-card{
    background:white;
    border-radius:25px;
    border:1px solid #ececec;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
    margin-bottom:25px;
    overflow:hidden;
    transition:.3s;
}

.post-card:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 30px rgba(0,0,0,.12);
}

.post-card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}

/* MENU UTAMA */
.menu-card{
    display:block;
    background:white;
    padding:30px 20px;
    border-radius:25px;
    text-decoration:none;
    color:#444;
    font-weight:600;
    transition:.3s;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    min-height:180px;
}

.menu-card:hover{
    transform:translateY(-8px);
    color:#ff4f9a;
    box-shadow:0 15px 35px rgba(255,79,154,.25);
}

.menu-card:hover{
    transform:translateY(-5px);
    color:#ff4f9a;
    box-shadow:0 10px 25px rgba(255,79,154,.2);
}

.menu-icon{
    font-size:48px;
    margin-bottom:15px;
    color:#ff4f9a;
}

/* HEADER */
.notif-btn,
.logout-btn{
    border-radius:15px;
    padding:10px 18px;
    font-weight:600;
}

/* HERO */
.hero h1{
    font-weight:700;
    margin-bottom:15px;
}

.hero p{
    opacity:.95;
    line-height:1.8;
}

/* POSTINGAN */
.post-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
}

.post-card img{
    border-radius:15px;
}

/* FOOTER */
.footer-custom{
    margin-top:50px;
    padding:20px;
    text-align:center;
    color:#777;
}

/* RESPONSIVE */
@media(max-width:768px){

    .brand{
        font-size:24px;
    }

    .logo{
        width:50px;
        height:50px;
    }

    .hero{
        padding:25px;
    }

}
.komentar-item{
    background:#f8f9fa;
    padding:12px;
    border-radius:12px;
    margin-top:8px;
    border:1px solid #eee;
}

.post-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
    background:white;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.post-card:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.nama-user{
    color:#222;
    font-size:28px;
}

</style>
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">

<div class="d-flex justify-content-between align-items-center w-100">

<div class="d-flex align-items-center">

<img src="logo.png" class="logo">

<div class="brand">
Teman Rindu
</div>

</div>




<div class="d-flex align-items-center">

<a href="/notifikasi"
class="btn btn-warning me-2 notif-btn">

<i class="bi bi-bell-fill"></i> {{ $jumlahNotif }}

</a>

<a href="/logout"
class="btn btn-outline-danger logout-btn">
<i class="bi bi-box-arrow-right"></i> Keluar
</a>

</div>

</div>

</div>

</nav>

<div class="container">

<div class="container mt-3">

<div class="card border-0 shadow-sm rounded-4">

<div class="card-body">

<div class="row text-center">

<div class="col-6 col-md-3 mb-3">
    <a href="/match" class="menu-card">
        <div class="menu-icon">
            <i class="bi bi-heart-fill"></i>
        </div>
        <div>Match</div>
    </a>
</div>

<div class="col-6 col-md-3 mb-3">
    <a href="/pesan" class="menu-card">
        <div class="menu-icon">
            <i class="bi bi-chat-dots-fill"></i>
        </div>
        <div>Chat</div>
    </a>
</div>

<div class="col-6 col-md-3 mb-3">
    <a href="/daftar-match" class="menu-card">
        <div class="menu-icon">
            <i class="bi bi-people-fill"></i>
        </div>
        <div>Match Saya</div>
    </a>
</div>

<div class="col-6 col-md-3 mb-3">
    <a href="/profil" class="menu-card">
        <div class="menu-icon">
            <i class="bi bi-person-circle"></i>
        </div>
        <div>Profil</div>
    </a>
</div>

<div class="col-6 col-md-3 mb-3">
    <a href="/dompet" class="menu-card">
        <div class="menu-icon">
            <i class="bi bi-wallet2"></i>
        </div>
        <div>Dompet</div>
    </a>
</div>

</div>

</div>

</div>

<div class="hero">

<h1>
<i class="bi bi-hand-wave-fill me-2"></i>
Halo, {{ session('nama') }}
</h1>

<p class="hero-subtitle">
Temukan teman baru, pasangan baru, dan cerita baru di Teman Rindu
<i class="bi bi-heart-fill"></i>
</p>

</div>

<div class="card mt-4 border-0 shadow-sm rounded-4">

<div class="card-body">

<h4 class="mb-3">
<i class="bi bi-pencil-square me-2"></i>
Buat Postingan
</h4>

<form 
action="/simpan-postingan"
method="POST"
enctype="multipart/form-data">

@csrf

<textarea
name="isi"
class="form-control"
rows="3"
placeholder="Apa yang sedang kamu pikirkan?"
required></textarea>

<br>

<input
type="file"
name="foto"
class="form-control">

<br>

<button
type="submit"
class="btn btn-pink">

<i class="bi bi-plus-circle-fill me-1"></i>
Posting

</button>

</form>

</div>

</div>

<div class="mt-4">

<h3 class="mb-3">
<i class="bi bi-newspaper me-2"></i>
Postingan Terbaru
</h3>

@foreach($postingan as $post)

<div class="card post-card mb-4">

<div class="card-body">

<div class="d-flex align-items-center mb-3">

@if(!empty($post->foto_profil))

<img
src="{{ asset('uploads_profil/' . $post->foto_profil) }}"
style="
width:50px;
height:50px;
border-radius:50%;
object-fit:cover;
margin-right:12px;">

@else

<div style="
width:50px;
height:50px;
border-radius:50%;
background:#ffd6e8;
margin-right:12px;">
</div>

@endif


<div>

<h5 class="fw-bold nama-user mb-0">
{{ $post->nama }}
</h5>

<small class="text-muted">
Aktif • {{ \Carbon\Carbon::parse($post->tanggal)->diffForHumans() }}
</small>

</div>

</div>

<p class="mb-2">
{{ $post->isi }}
</p>

@if($post->foto)

<img
src="{{ asset('uploads_postingan/' . $post->foto) }}"
class="img-fluid rounded mb-3"
style="width:100%;max-height:500px;object-fit:cover;">

@endif

<hr class="my-3">

<div class="mt-2">

<div class="aksi-post">

<a href="/like/{{ $post->id }}"
class="btn btn-light aksi-btn">

<i class="bi bi-heart-fill text-danger"></i>
{{ $post->jumlah_like }} Like

</a>

<button
class="btn btn-light aksi-btn"
onclick="toggleKomentar({{ $post->id }})">

<i class="bi bi-chat-dots-fill"></i>
Komentar ({{ count($post->komentar) }})

</button>

@if($post->user_id == session('id'))

<a href="/hapus-postingan/{{ $post->id }}"
class="btn btn-light aksi-btn text-danger"
onclick="return confirm('Yakin ingin menghapus postingan ini?')">

<i class="bi bi-trash-fill"></i>
Hapus

</a>

@endif

</div>

<div id="komentar-{{ $post->id }}" style="display:none;">

@if(count($post->komentar) > 0)

<div class="mt-3">

@foreach($post->komentar as $komen)

<div class="komentar-item">

<div class="d-flex justify-content-between">

<strong>{{ $komen->nama }}</strong>

<a
href="/hapus-komentar/{{ $komen->id }}"
class="text-danger text-decoration-none">

<i class="bi bi-trash-fill"></i>

</a>

</div>

<div>
{{ $komen->isi }}
</div>

</div>

@endforeach

</div>

@endif

<form action="/komentar" method="POST" class="mt-3">

@csrf

<input
type="hidden"
name="postingan_id"
value="{{ $post->id }}">

<div class="input-group">

<input
type="text"
name="isi"
class="form-control"
placeholder="Tulis komentar..."
required>

<button
class="btn btn-primary"
type="submit">

Kirim

</button>

</div>

</form>
</div>

<small class="text-muted d-block mt-2">
<i class="bi bi-clock-history"></i>
{{ \Carbon\Carbon::parse($post->tanggal)->diffForHumans() }}
</small>

</div>

</div>

@endforeach

</div>



</script>

<footer class="footer-custom">
    © 2026 Teman Rindu • Dibuat dengan oleh Manuel
</footer>

<script>

function toggleKomentar(id){

    let box = document.getElementById('komentar-' + id);

    if(box.style.display === 'none'){
        box.style.display = 'block';
    }else{
        box.style.display = 'none';
    }

}

</script>

</body>
</html>
