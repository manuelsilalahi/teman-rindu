<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pesan Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff7fb;
}

.container-chat{
    max-width:900px;
    margin:auto;
    padding:30px;
}

.judul{
    text-align:center;
    color:#ff4f9a;
    margin-bottom:30px;
}

.kartu-chat{
    background:white;
    border-radius:20px;
    padding:20px;
    margin-bottom:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.foto-chat{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #ffd6e8;
}

.foto-kosong{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#ffd6e8;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:30px;
}

</style>

</head>
<body>

<div class="container-chat">

<h2 class="judul">
💬 Pesan Saya
</h2>

@foreach($chat as $row)

<a href="/chat/{{ $row->id }}"
style="text-decoration:none;color:black;">

<div class="kartu-chat d-flex align-items-center">

@if(!empty($row->foto))

<img
src="{{ asset('uploads_profil/' . $row->foto) }}"
class="foto-chat">

@else

<div class="foto-kosong">
👤
</div>

@endif

<div class="ms-3">

<h5 class="mb-1">
{{ $row->nama }}
</h5>

<p class="text-muted mb-0">
Klik untuk membuka percakapan
</p>

</div>

</div>

</a>

@endforeach

<div class="text-center mt-4">

<a href="/dashboard"
class="btn btn-secondary">

← Kembali ke Dashboard

</a>

</div>

</div>

</body>
</html>