<?php
// Mendapatkan halaman aktif dari query string (untuk highlight menu navbar)
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Meta tag SEO dan responsif -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Layanan Reparasi Handphone terpercaya di Jakarta Barat. Cepat, profesional, dan berkualitas." />
  <meta name="keywords" content="reparasi handphone, service hp, perbaikan ponsel, Jakarta Barat" />
  <meta name="author" content="Ris Cell" />
  <title>Ris Cell - Layanan Reparasi Handphone Jakarta Barat</title>
  <link rel="icon" href="/view/public/favicon.ico" type="image/x-icon" />
  <!-- Bootstrap CSS dan Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    /* =========================
       NEVE-LIKE HEADER & NAVBAR
    ========================= */
    #mainHeader {
      background: #fff !important;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      transition: box-shadow 0.2s;
    }
    .navbar-brand {
      color: #007bff !important;
      font-weight: bold;
      font-size: 1.8rem;
      letter-spacing: 1px;
    }
    .navbar-nav .nav-link {
      color: #333 !important;
      font-weight: 500;
      margin-right: 1rem;
      transition: color 0.2s;
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
    }
    .navbar-nav .nav-link.active,
    .navbar-nav .nav-link:hover {
      color: #007bff !important;
      background: #f0f8ff;
    }
    .btn-cta {
      background: #007bff;
      color: #fff;
      border-radius: 25px;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
      margin-left: 1rem;
      box-shadow: 0 2px 8px rgba(0,123,255,0.08);
      transition: background 0.2s;
      border: none;
    }
    .btn-cta:hover {
      background: #0056b3;
      color: #fff;
    }

    /* =========================
       HERO & IMAGE (TIDAK DIUBAH)
    ========================= */
    .full-section {
      width: 100vw;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: linear-gradient(120deg, #f8fafc 60%, #e3f0ff 100%);
      border-bottom: 1px solid #eaeaea;
    }
    .hero-image-container {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      overflow: hidden;
      pointer-events: none;
      max-width: 100%;
    }
    .hero-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.18;
      -webkit-filter: drop-shadow(10px 10px 10px #0008fa);
    }
    .full-section .col-md-6 {
      position: relative;
      z-index: 2;
    }
    .full-section h1, .full-section h3 {
      color: #222;
      text-shadow: none;
    }

    /* =========================
       LAYANAN UTAMA & CARD NEVE
    ========================= */
    .card-neve {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
      padding: 2rem 1.5rem;
      margin-bottom: 2rem;
      background: #fff;
      text-align: center;
      transition: box-shadow 0.2s;
    }
    .card-neve:hover {
      box-shadow: 0 4px 24px rgba(0,123,255,0.10)
    }
    .card-neve i {
      font-size: 2.5rem;
      color: #007bff;
      margin-bottom: 1rem;
    }
    .icon-square {
      width: 3rem;
      height: 3rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0.5rem;
      background-color: #f8f9fa;
      color: #007bff;
      box-shadow: 0 0 24px rgba(0, 17, 255, 0.08);
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .fs-2 { font-size: 1.3rem !important; }
    .pb-2 { padding-bottom: 0.7rem !important; }
    .border-bottom { border-bottom: 1px solid #eaeaea !important; }

    /* =========================
       BUTTONS & LINK
    ========================= */
    .btn-primary, .btn-primary:focus {
      background: #007bff;
      border: none;
      color: #fff;
      border-radius: 25px;
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      box-shadow: 0 2px 8px rgba(0,123,255,0.08);
      transition: background 0.2s;
    }
    .btn-primary:hover {
      background: #0056b3;
      color: #fff;
    }
    .btn-outline-primary {
      border-radius: 25px;
      font-weight: 600;
      border: 1.5px solid #007bff;
      color: #007bff;
      background: #fff;
      transition: background 0.2s, color 0.2s;
    }
    .btn-outline-primary:hover {
      background: #007bff;
      color: #fff;
    }

    /* =========================
       CAROUSEL
    ========================= */
    .carousel-caption {
      display: block !important;
      color: #222;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      max-width: 90%;
      margin: 0 auto;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .carousel-caption h5 {
      font-size: 1.15rem;
      font-weight: bold;
      color: black;
    }
    .carousel-caption p {
      font-size: 1rem;
      color: black;
    }

    /* =========================
       RESPONSIVE GOOGLE MAPS
    ========================= */
    .responsive-map {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%; /* 16:9 */
      height: 0;
      overflow: hidden;
    }
    .responsive-map iframe {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      border: 0;
      border-radius: 0.5rem;
    }
    @media (max-width: 576px) {
      .responsive-map { padding-bottom: 75%; }
    }

    /* =========================
       FOOTER NEVE STYLE
    ========================= */
    footer {
      background: #f8fafc !important;
      color: #888;
      font-size: 0.95rem;
      padding: 2rem 0 1rem 0;
      border-top: 1px solid #eaeaea;
      margin-top: 3rem;
    }
    footer a {
      color: #007bff !important;
      margin: 0 0.5rem;
      font-size: 1.5rem;
      transition: color 0.2s;
    }
    footer a:hover {
      color: #0056b3 !important;
    }
    .fw-bold { font-weight: 700 !important; }
    .small { font-size: 0.95rem !important; }

    /* =========================
       GENERAL
    ========================= */
    html { scroll-behavior: smooth; }
    body { background: #f8fafc; }

    /* =========================
       SUPER RESPONSIVE IMPROVEMENT
    ========================= */
    html, body {
      max-width: 100vw;
      overflow-x: hidden;
    }
    body {
      background: #f8fafc;
      font-size: 1rem;
    }
    .full-section {
      width: 100vw;
      min-height: 60vh;
      height: auto;
      padding: 2rem 0;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .hero-image-container {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      overflow: hidden;
      pointer-events: none;
      max-width: 100vw;
    }
    .hero-image {
      width: 100vw;
      height: 100%;
      object-fit: cover;
      opacity: 0.18;
      min-height: 200px;
      max-height: 400px;
    }
    .full-section .col-md-6 {
      position: relative;
      z-index: 2;
    }
    .full-section h1, .full-section h3 {
      color: #222;
      text-shadow: none;
      font-size: 2.2rem;
    }
    @media (max-width: 1199.98px) {
      .full-section h1 { font-size: 2rem; }
      .full-section h3 { font-size: 1.2rem; }
    }
    @media (max-width: 991.98px) {
      .full-section {
        padding: 1.5rem 0;
        min-height: 40vh;
      }
      .hero-image {
        max-height: 220px;
        min-height: 120px;
      }
      .full-section h1 { font-size: 1.5rem; }
      .full-section h3 { font-size: 1.1rem; }
      .container, .col-xxl-8, .col-lg-6, .col-md-6 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
      }
    }
    @media (max-width: 767.98px) {
      .full-section {
        padding: 1rem 0;
        min-height: 30vh;
      }
      .hero-image {
        max-height: 120px;
        min-height: 80px;
      }
      .full-section h1 { font-size: 1.1rem; }
      .full-section h3 { font-size: 0.95rem; }
      .col-md-6.p-lg-5.mx-auto.my-5 {
        padding: 0.5rem !important;
        margin: 0.5rem auto !important;
      }
      .container, .col-xxl-8, .col-lg-6, .col-md-6 {
        padding-left: 0.5rem !important;
        padding-right: 0.5rem !important;
      }
      .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
      }
      .card-neve {
        padding: 1rem 0.5rem;
      }
    }
    @media (max-width: 575.98px) {
      .full-section {
        padding: 0.5rem 0;
        min-height: 20vh;
      }
      .hero-image {
        max-height: 80px;
        min-height: 50px;
      }
      .full-section h1 { font-size: 0.95rem; }
      .full-section h3 { font-size: 0.8rem; }
      .container, .col-xxl-8, .col-lg-6, .col-md-6 {
        padding-left: 0.3rem !important;
        padding-right: 0.3rem !important;
      }
      .card-neve {
        padding: 0.7rem 0.3rem;
      }
      .responsive-map { padding-bottom: 90%; }
      .display-3, .display-5 { font-size: 1rem !important; }
      .btn-lg, .btn-primary, .btn-outline-primary {
        font-size: 0.9rem !important;
        padding: 0.3rem 0.7rem !important;
      }
    }
    .card-neve {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 2px 16px rgba(0,0,0,0.06);
      padding: 2rem 1.5rem;
      margin-bottom: 2rem;
      background: #fff;
      text-align: center;
      transition: box-shadow 0.2s;
    }
    .card-neve:hover {
      box-shadow: 0 4px 24px rgba(0,123,255,0.10)
    }
    .icon-square {
      width: 3rem;
      height: 3rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0.5rem;
      background-color: #f8f9fa;
      color: #007bff;
      box-shadow: 0 0 24px rgba(0, 17, 255, 0.08);
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .responsive-map {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%; /* 16:9 */
      height: 0;
      overflow: hidden;
    }
    .responsive-map iframe {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      border: 0;
      border-radius: 0.5rem;
    }
    @media (max-width: 576px) {
      .responsive-map { padding-bottom: 75%; }
    }
    footer .container {
      padding-left: 1rem;
      padding-right: 1rem;
    }
    @media (max-width: 767.98px) {
      footer .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
      }
      footer .mb-2 {
        margin-bottom: 0.5rem !important;
      }
      footer .small {
        font-size: 0.85rem !important;
      }
    }
    .navbar-brand {
      font-size: 1.5rem;
    }
    @media (max-width: 575.98px) {
      .navbar-brand {
        font-size: 1.1rem;
      }
      .navbar-nav .nav-link {
        font-size: 0.95rem;
        padding: 0.3rem 0.7rem;
      }
    }
  </style>
</head>
<body>

<?php
// Debugging URI (bisa dihapus kalau sudah tidak perlu)
echo "<!-- Request URI: " . htmlspecialchars($_SERVER['REQUEST_URI']) . " -->";
?>

<!-- Header Navigasi -->
<header class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-lg" id="mainHeader">
  <div class="container">
    <!-- Logo dan nama brand -->
    <a class="navbar-brand fw-bold d-flex align-items-center" href="?page=home" style="font-size: 1.7rem;">
      <i class="bi bi-phone-vibrate-fill me-2" style="font-size:2rem;"></i>
      <span class="gradient-text">Riss Cell</span>
    </a>
    <!-- Tombol hamburger untuk mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menu navigasi -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/projek">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#location-section">Lokasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/projek/contact">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/projek/service">Service</a>
        </li>
      </ul>
    </div>
  </div>
</header>

<!-- Bagian Hero: Judul besar dan gambar utama -->
<div class="full-section overflow-hidden p-3 p-md-5 m-md-3 text-center bg-white text-dark">
  <div class="col-md-6 p-lg-5 mx-auto my-5">
    <h1 class="display-3 fw-bold">Layanan Reparasi Handphone di Jakarta Barat</h1>
    <h3 class="fw-normal text-muted mb-3">Cepat, Terpercaya, dan Profesional</h3>
  </div>
  <div class="hero-image-container">
    <img src="view/image/HP.png" alt="Reparasi Handphone" class="hero-image" loading="lazy" />
  </div>
</div>

<!-- Bagian Layanan Utama: Penjelasan singkat dan tombol lokasi -->
<div class="full-section container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="view/image/ReparasiHP.png" class="d-block mx-lg-auto img-fluid" alt="Reparasi Handphone" width="700" height="500" loading="lazy" />
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Layanan Reparasi Handphone</h1>
      <p class="lead">Kami menyediakan layanan perbaikan handphone yang cepat dan terpercaya, termasuk penggantian layar, baterai, dan komponen lainnya. Temukan lokasi kami untuk mendapatkan layanan terbaik.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="#location-section" class="btn btn-primary btn-lg px-4">Lokasi</a>
      </div>
    </div>
  </div>
</div>

<!-- Carousel Bootstrap: Menampilkan gambar dan caption layanan -->
<div id="mainCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="height: 350px;">
    <!-- Slide 1 -->
    <div class="carousel-item active" style="height: 100%;">
      <img src="https://images.unsplash.com/photo-1617299516258-eb06985065ff?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
           class="d-block w-100 h-100" alt="Reparasi Handphone 1" style="object-fit: cover;" loading="lazy" />
      <div class="carousel-caption">
        <h5>Reparasi Handphone Cepat</h5>
        <p>Layanan perbaikan handphone tercepat di Jakarta Barat.</p>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="carousel-item" style="height: 100%;">
      <img src="https://images.unsplash.com/photo-1576613109753-27804de2cba8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
           class="d-block w-100 h-100" alt="Reparasi Handphone 2" style="object-fit: cover;" loading="lazy" />
      <div class="carousel-caption">
        <h5>Teknisi Profesional</h5>
        <p>Teknisi berpengalaman dan profesional siap membantu Anda.</p>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="carousel-item" style="height: 100%;">
      <img src="https://images.unsplash.com/photo-1658212662417-a2a76efe25df?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
           class="d-block w-100 h-100" alt="Service Center" style="object-fit: cover;" loading="lazy" />
      <div class="carousel-caption">
        <h5>Lokasi Strategis</h5>
        <p>Mudah dijangkau dan dekat dengan landmark utama.</p>
      </div>
    </div>
  </div>
  <!-- Tombol navigasi carousel (panah kiri & kanan) -->
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Bagian Layanan Detail: 3 kolom layanan utama -->
<div class="container px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom">Layanan Reparasi Handphone</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <!-- Kolom 1: Perbaikan Hardware -->
    <div class="col d-flex align-items-start">
      <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-tools"></i>
      </div>
      <div>
        <h3 class="fs-2 text-body-emphasis">Perbaikan Hardware</h3>
        <p>Kami menyediakan layanan perbaikan hardware seperti penggantian layar, baterai, kamera, dan komponen lainnya.</p>
      </div>
    </div>
    <!-- Kolom 2: Optimasi Performa -->
    <div class="col d-flex align-items-start">
      <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-speedometer2"></i>
      </div>
      <div>
        <h3 class="fs-2 text-body-emphasis">Optimasi Performa</h3>
        <p>Layanan optimasi performa mencakup upgrade software, pembersihan sistem, dan penghapusan file yang tidak diperlukan.</p>
      </div>
    </div>
    <!-- Kolom 3: Keamanan Data -->
    <div class="col d-flex align-items-start">
      <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
        <i class="bi bi-shield-lock"></i>
      </div>
      <div>
        <h3 class="fs-2 text-body-emphasis">Keamanan Data</h3>
        <p>Kami membantu Anda melindungi data penting dengan layanan backup, recovery, dan instalasi aplikasi keamanan.</p>
      </div>
    </div>
  </div>
</div>

<!-- Bagian Lokasi -->
<div id="location-section" class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <div class="responsive-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.156575072146!2d106.71031907503681!3d-6.109610493876925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02cfe0ce5ae7%3A0xaa1dafc8ac1a583c!2sRis%20Cell%20(perbaikan%20ponsel)!5e0!3m2!1sid!2sid!4v1744271028102!5m2!1sid!2sid" 
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Lokasi Ris Cell (Perbaikan Ponsel)</h1>
      <p class="lead">Kami berlokasi di Ris Cell, tempat terpercaya untuk perbaikan ponsel. Temukan kami di peta untuk informasi lebih lanjut.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="https://www.google.com/maps?q=Ris+Cell+(perbaikan+ponsel)&ll=-6.109610493876925,106.71031907503681" class="btn btn-primary btn-lg px-4 me-md-2" target="_blank" rel="noopener noreferrer">Kunjungi Kami</a>
      </div>
      <div class="mt-4">
        <h2 class="h5">Landmark Terdekat:</h2>
        <ul>
          <li>Mal Taman Palem (2 km)</li>
          <li>Bandara Soekarno-Hatta (10 km)</li>
          <li>Rumah Sakit Cengkareng (3 km)</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white text-center py-4 mt-5" style="background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%); box-shadow: 0 -2px 24px rgba(0,123,255,0.08);">
  <div class="container">
    <div class="mb-2">
      <button type="button" class="btn btn-link text-white me-3 p-0" style="text-decoration:none;cursor:not-allowed;" title="WhatsApp (belum aktif)">
        <i class="bi bi-whatsapp" style="font-size:1.5rem;"></i>
      </button>
      <button type="button" class="btn btn-link text-white me-3 p-0" style="text-decoration:none;cursor:not-allowed;" title="Instagram (belum aktif)">
        <i class="bi bi-instagram" style="font-size:1.5rem;"></i>
      </button>
      <button type="button" class="btn btn-link text-white p-0" style="text-decoration:none;cursor:not-allowed;" title="Email (belum aktif)">
        <i class="bi bi-envelope-fill" style="font-size:1.5rem;"></i>
      </button>
    </div>
    <p class="mb-0 small">© 2025 <span class="fw-bold">Ris Cell</span>. Semua hak dilindungi.</p>
  </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

