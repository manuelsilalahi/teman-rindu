<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Chat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.chat-box{
    max-width:950px;
    margin:auto;
    padding:20px;
}

.chat-header{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:20px;
}

.chat-foto{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #ff4f9a;
}

.chat-nama{
    margin:0;
    color:#ff4f9a;
    font-weight:bold;
}

.online{
    color:green;
    font-size:15px;
}

.chat-area{
    background:white;
    border-radius:25px;
    padding:25px;
    height:550px;
    overflow-y:auto;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.kiri{
    display:flex;
    justify-content:flex-start;
    margin-bottom:15px;
}

.kanan{
    display:flex;
    justify-content:flex-end;
    margin-bottom:15px;
}

.bubble-kiri{
    background:#f1f1f1;
    padding:12px 18px;
    border-radius:20px;
    max-width:70%;
    word-wrap:break-word;
}

.bubble-kanan{
    background:#ff4f9a;
    color:white;
    padding:12px 18px;
    border-radius:20px;
    max-width:70%;
    word-wrap:break-word;
}

.btn-kirim{
    background:#ff4f9a;
    color:white;
    border:none;
}

.btn-kirim:hover{
    background:#ff2f84;
    color:white;
}

.info-user{
    background:white;
    border-radius:20px;
    padding:12px;
    text-align:center;
    margin-bottom:15px;
    box-shadow:0 3px 10px rgba(0,0,0,.05);
}
</style>

</head>
<body>
<div class="chat-box">

<div class="chat-header">

@if(!empty($user->foto))

<img
src="{{ asset('uploads_profil/' . $user->foto) }}"
class="chat-foto">

@else

<div class="chat-foto d-flex align-items-center justify-content-center bg-light">
👤
</div>

@endif

<div>

<h2 class="chat-nama">
{{ $user->nama }}
</h2>

<div class="online">

@if($user->last_active && \Carbon\Carbon::parse($user->last_active)->diffInMinutes(now()) <= 5)

🟢 Online

@else

⚫ Offline

@endif

</div>

</div>

</div>

<div class="info-user">

📍 {{ $user->kota ?? 'Belum diisi' }}

&nbsp;&nbsp;&nbsp;

🎂 {{ $user->umur ?? '-' }} Tahun

</div>

<div class="chat-area">

@foreach($pesan as $chat)

@if($chat->pengirim_id == session('id'))

<div class="kanan">
    <div class="bubble-kanan">
        {{ $chat->pesan }}
    </div>
</div>

@else

<div class="kiri">
    <div class="bubble-kiri">
        {{ $chat->pesan }}
    </div>
</div>

@endif

@endforeach

</div>

<form action="/kirim-pesan" method="POST" class="mt-3">

@csrf

<input
type="hidden"
name="penerima_id"
value="{{ $user->id }}">

<div class="input-group">

<input
type="text"
name="pesan"
class="form-control"
placeholder="💬 Ketik pesan..."
required>

<button
class="btn btn-kirim"
type="submit">

📨 Kirim

</button>

</div>

</form>

<div class="text-center mt-4">

<a href="/pesan"
class="btn btn-secondary">

← Kembali

</a>

</div>

</div>