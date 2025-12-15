<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM POFKIP Olahraga | Sistem Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #198754);
            min-height: 100vh;
        }
        .navbar {
            background: rgba(0,0,0,0.2) !important;
            backdrop-filter: blur(6px);
        }
        .hero-card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 40px;
        }
        .feature-card {
            border-radius: 16px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-8px);
        }
        footer {
            background: rgba(0,0,0,0.3);
        }
    </style>
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/logoo.png') }}" alt="Logo UKM POFKIP" style="height: 30px; width: auto;">
            <span>UKM POFKIP Olahraga</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center hero-card shadow-lg">
            <div class="col-md-6">
                <h1 class="fw-bold mb-3">UKM POFKIP Olahraga</h1>
                <p class="text-muted">Sistem informasi resmi UKM POFKIP Olahraga yang menyajikan informasi profil organisasi, struktur kepengurusan, program kerja, kegiatan olahraga, serta pengumuman terbaru.</p>
                <a href="/login" class="btn btn-primary btn-lg">Mulai Sekarang</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/906/906343.png" class="img-fluid" style="max-height:300px">
            </div>
        </div>
    </div>
</section>

<!-- Fitur -->
<section class="py-5 text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Informasi UKM</h2>
            <p class="text-muted">Beberapa fitur yang tersedia dalam sistem</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Profil UKM</h5>
                        <p class="card-text">Informasi tentang sejarah, visi, dan misi UKM POFKIP Olahraga.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Program Kerja</h5>
                        <p class="card-text">Daftar program kerja dan agenda kegiatan olahraga yang akan dilaksanakan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Berita & Kegiatan</h5>
                        <p class="card-text">Informasi kegiatan, prestasi, dan dokumentasi UKM.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-primary text-white py-3">
    <div class="container text-center">
        <small>&copy; {{ date('Y') }} Sistem Informasi. All rights reserved.</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
