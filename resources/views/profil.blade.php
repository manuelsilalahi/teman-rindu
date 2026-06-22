<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Profil Saya - Teman Rindu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.card-profil{
    max-width:800px;
    margin:40px auto;
    background:white;
    border:none;
    border-radius:25px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.3s;
}

.judul{
    text-align:center;
    color:#ff4f9a;
    margin-bottom:25px;
}

.foto-profil{
    width:180px;
    height:180px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #ffd6e8;
    box-shadow:0 8px 25px rgba(0,0,0,.12);
}

.avatar{
    width:220px;
    height:220px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:auto;
    background:#ffd6e8;
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

</style>

</head>
<body>

<div class="container">

<div class="card-profil">

<h1 class="judul">
 Profil Saya
</h1>

<div class="text-center mb-4">

@if(false)

<img
src="{{ asset('uploads/' . $user->foto) }}"
class="foto-profil">
@endif


@if(!empty($user->foto))

<img
src="{{ asset('uploads_profil/' . $user->foto) }}"
class="avatar">

@else

<div class="avatar">
👤
</div>

@endif

<h3 class="mt-3 fw-bold">
{{ session('nama') }}
</h3>

<p class="text-muted">
📍 {{ $user->kota ?? 'Belum diisi' }}
</p>

</div>

<form action="/update-profil" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label class="form-label">Nama</label>
<input
type="text"
name="nama"
class="form-control"
value="{{ session('nama') }}"
required>
</div>

<div class="mb-3">
<label class="form-label">Umur</label>
<input
type="number"
name="umur"
class="form-control"
value="{{ $user->umur ?? '' }}">
</div>

<div class="mb-3">
<label class="form-label">Kota</label>
<input
type="text"
name="kota"
class="form-control"
value="{{ $user->kota ?? '' }}">
</div>

<div class="mb-3">
<label class="form-label">Jenis Kelamin</label>
<select name="gender" class="form-control">

<option value="">
Pilih Jenis Kelamin
</option>

<option value="Laki-laki"
{{ isset($user) && $user->gender == 'Laki-laki' ? 'selected' : '' }}>
Laki-laki
</option>

<option value="Perempuan"
{{ isset($user) && $user->gender == 'Perempuan' ? 'selected' : '' }}>
Perempuan
</option>

</select>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input
type="email"
class="form-control"
value=""
readonly>
</div>

<div class="mb-3">
<label class="form-label">Nomor HP OnoPay</label>

<input
type="text"
name="nomor_hp"
class="form-control"
value="{{ $user->nomor_hp }}">

<small class="text-muted">
Nomor ini digunakan untuk menghubungkan akun OnoPay.
</small>

</div>

<div class="mb-3">

<label class="form-label">
Foto Profil
</label>

<input
type="file"
name="foto"
class="form-control">

@if(!empty($user->foto))

<br>

<a
href="/hapus-foto-profil"
class="btn btn-danger w-100"
onclick="return confirm('Hapus foto profil?')">

Hapus Foto Profil

</a>

@endif

</div>

<div class="mb-3">
<label class="form-label">Bio</label>
<textarea
name="bio"
rows="5"
class="form-control">{{ $user->bio ?? '' }}</textarea>
</div>

<button
type="submit"
class="btn btn-pink w-100">

Simpan Perubahan

</button>

</form>

<div class="text-center mt-3">

<a
href="/pengunjung"
class="btn btn-info">

Pengunjung Profil

</a>


</div>

<div class="text-center mt-4">

<a href="/dashboard"
class="btn btn-secondary">

← Kembali ke Dashboard

</a>

</div>

<hr class="mt-5 mb-4">

<h3 class="text-center mb-4">
📰 Postingan Saya
</h3>

@forelse($postingan as $post)

<div class="card shadow-sm rounded-4 mb-3">
    <div class="card-body">

        <p>{{ $post->isi }}</p>

        @if(!empty($post->foto))
            <img
                src="{{ asset('uploads_postingan/' . $post->foto) }}"
                class="img-fluid rounded mt-2">
        @endif

        <small class="text-muted d-block mt-3">
            🕒 {{ \Carbon\Carbon::parse($post->tanggal)->diffForHumans() }}
        </small>

    </div>
</div>

@empty

<div class="alert alert-light text-center">
    Anda belum memiliki postingan.
</div>

@endforelse

</div>

</div>

<footer class="footer-custom">
    © 2026 Teman Rindu • Dibuat dengan oleh Manuel
</footer>

</body>
</html>