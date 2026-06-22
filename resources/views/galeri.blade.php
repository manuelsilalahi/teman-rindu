<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Galeri Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#fff7fb;
    font-family:'Segoe UI',sans-serif;
}

.foto{
    width:100%;
    height:250px;
    object-fit:cover;
    border-radius:15px;
}

</style>

</head>
<body>

<div class="container mt-5">

<h2>📸 Galeri Saya</h2>

<form
action="#"
method="POST"
enctype="multipart/form-data">

<input
type="file"
name="foto"
class="form-control">

<br>

<button
class="btn btn-primary">

Upload Foto

</button>

</form>

<hr>

<div class="card shadow-sm border-0 p-5 text-center">

<h4>Belum Ada Foto</h4>

<p class="text-muted">
Fitur galeri sedang dipindahkan ke Laravel.
</p>

</div>

<br>

<a href="/profil"
class="btn btn-secondary">

← Kembali

</a>

</div>

</body>
</html>