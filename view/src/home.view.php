<?php
echo "Request URI: " . $_SERVER['REQUEST_URI'];
?>

<header class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-lg" style="background: linear-gradient(90deg, #007bff 0%, #00c6ff 100%);">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="?page=home" style="font-size: 1.7rem;">
      <i class="bi bi-phone-vibrate-fill me-2" style="font-size:2rem;"></i> Riss Cell
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=home" style="transition: color 0.2s;">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#location-section" style="transition: color 0.2s;">Lokasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=contact" style="transition: color 0.2s;">Kontak</a>
        </li>
      </ul>
    </div>
  </div>
</header>
<div class="full-section overflow-hidden p-3 p-md-5 m-md-3 text-center bg-white text-dark">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">Layanan Reparasi Handphone di Jakarta Barat</h1>
                <h3 class="fw-normal text-muted mb-3">Cepat, Terpercaya, dan Profesional</h3>
            </div>
            <div class="hero-image-container">
                <img src="./view/public/HP.png" alt="Reparasi Handphone" class="hero-image">
            </div>
        </div>

        <div class="full-section container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="./view/public/ReparasiHP.png" class="d-block mx-lg-auto img-fluid" alt="Reparasi Handphone" width="700" height="500" loading="lazy">
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

        <!-- Carousel Section Start -->
        <div id="mainCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://images.unsplash.com/photo-1617299516258-eb06985065ff?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Reparasi Handphone 1" style="max-height:450px;object-fit:cover;">
              <div class="carousel-caption  d-md-block">
                <h5>Reparasi Handphone Cepat</h5>
                <p>Layanan perbaikan handphone tercepat di Jakarta Barat.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1576613109753-27804de2cba8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Reparasi Handphone 2" style="max-height:450px;object-fit:cover;">
              <div class="carousel-caption  d-md-block">
                <h5>Teknisi Profesional</h5>
                <p>Teknisi berpengalaman dan profesional siap membantu Anda.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://images.unsplash.com/photo-1658212662417-a2a76efe25df?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Service Center" style="max-height:450px;object-fit:cover;">
              <div class="carousel-caption  d-md-block">
                <h5>Lokasi Strategis</h5>
                <p>Mudah dijangkau dan dekat dengan landmark utama.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Carousel Section End -->

        <div class="container px-4 py-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Layanan Reparasi Handphone</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

            <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Perbaikan Hardware</h3>
                        <p>Kami menyediakan layanan perbaikan hardware seperti penggantian layar, baterai, kamera, dan komponen lainnya.</p>
                    </div>
                </div>

                <div class="col d-flex align-items-start">
                    <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Optimasi Performa</h3>
                        <p>Layanan optimasi performa mencakup upgrade software, pembersihan sistem, dan penghapusan file yang tidak diperlukan.</p>
                    </div>
                </div>

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

        <div id="location-section" class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.156575072146!2d106.71031907503681!3d-6.109610493876925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02cfe0ce5ae7%3A0xaa1dafc8ac1a583c!2sRis%20Cell%20(perbaikan%20ponsel)!5e0!3m2!1sid!2sid!4v1744271028102!5m2!1sid!2sid" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
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

        
</div>
</body>
</html>
