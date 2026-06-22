<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Rindu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body{
            background:#fff3f8;
            font-family:'Segoe UI',sans-serif;
        }

        .navbar{
            background:#fff;
            box-shadow:0 2px 15px rgba(0,0,0,.08);
        }

        .logo{
            height:55px;
        }

        .btn-pink{
            background:#ff4f9a;
            color:white;
            border:none;
            border-radius:12px;
            padding:10px 24px;
        }

        .btn-pink:hover{
            background:#ff2f84;
            color:white;
        }

        .hero{
            padding:80px 0;
        }

.hero h1{
    font-size: 42px !important;
    line-height: 1.2;
}

        .hero p{
            font-size:20px;
            color:#666;
        }

        .hero-img{
            max-width:100%;
        }
.logo-wrapper{
    width: 500px;
    height: 500px;
    background: #ffffff;
    border-radius: 60px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}

.hero-logo{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand fw-bold text-pink" href="#">
            <img src="{{ asset('logo.png') }}" class="logo">
        </a>

        <div class="ms-auto">

            <a href="/login" class="btn btn-outline-primary me-2">
                <i class="bi bi-box-arrow-in-right"></i>
                Login
            </a>

            <a href="/register" class="btn btn-pink">
                <i class="bi bi-person-plus"></i>
                Daftar
            </a>

        </div>

    </div>
</nav>

<section class="hero py-5">
    <div class="container">

        <div class="row align-items-center">

            <!-- Kiri -->
            <div class="col-lg-6">

                <span class="badge bg-light text-danger border px-3 py-2 mb-3">
                    ❤️ Platform Sosial Modern
                </span>

                <h1 class="fw-bold display-4">
                    Temukan Teman Baru
                    <span class="text-danger">dan Pasangan yang Berarti</span>
                </h1>

                <p class="lead text-muted mt-4">
                    Teman Rindu adalah platform sosial yang memudahkanmu
                    menemukan teman baru, mencari pasangan, berbagi postingan,
                    chatting secara langsung, mengirim koin virtual,
                    dan membangun hubungan yang lebih dekat.
                </p>

                <div class="hero-buttons mt-4">
                    <a href="/register" class="btn btn-lg btn-pink me-3">
                        <i class="bi bi-person-plus-fill"></i>
                        Mulai Sekarang
                    </a>

                    <a href="/login" class="btn btn-lg btn-outline-secondary">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Login
                    </a>
                </div>

            </div>

<!-- Kanan -->
<div class="col-lg-6 text-center">
    <div class="logo-wrapper mx-auto">
        <img src="{{ asset('welcome.png') }}" class="hero-logo" alt="Teman Rindu">
    </div>
</div>


        </div>

    </div>
</section>

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">
                <i class="bi bi-stars text-warning"></i>
                Fitur Unggulan Teman Rindu
            </h2>

            <p class="text-muted">
                Semua fitur yang kamu butuhkan untuk menemukan teman baru dan membangun hubungan yang lebih dekat.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-heart-fill fs-1 text-danger"></i>
                    <h4 class="mt-3">Cari Pasangan</h4>
                    <p class="text-muted">
                        Temukan teman atau pasangan yang sesuai dengan minat dan profilmu.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-chat-dots-fill fs-1 text-primary"></i>
                    <h4 class="mt-3">Chat Real-Time</h4>
                    <p class="text-muted">
                        Berkomunikasi langsung dengan pengguna lain secara mudah dan cepat.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-images fs-1 text-success"></i>
                    <h4 class="mt-3">Upload Postingan</h4>
                    <p class="text-muted">
                        Bagikan foto dan cerita menarik kepada seluruh pengguna.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-hand-thumbs-up-fill fs-1 text-info"></i>
                    <h4 class="mt-3">Like & Komentar</h4>
                    <p class="text-muted">
                        Berinteraksi dengan postingan melalui fitur suka dan komentar.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-gift-fill fs-1 text-warning"></i>
                    <h4 class="mt-3">Kirim Koin</h4>
                    <p class="text-muted">
                        Kirim hadiah berupa koin virtual kepada pengguna lain sebagai bentuk apresiasi.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100 text-center">
                    <i class="bi bi-bell-fill fs-1 text-secondary"></i>
                    <h4 class="mt-3">Notifikasi</h4>
                    <p class="text-muted">
                        Dapatkan pemberitahuan otomatis saat menerima like, komentar, match, atau kiriman koin.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

</body>
</html>