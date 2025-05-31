<?php
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '') {
    $baseUrl = '/';
}
$showModal = false;
$modalStatus = '';
if (isset($_SESSION['status'])) {
    $showModal = true;
    $modalStatus = $_SESSION['status'];
    unset($_SESSION['status']);
}
?>


<style>
  /* Styles untuk hero overlay */
  .hero-contact {
    position: relative;
    overflow: hidden;
    border-radius: 18px;
  }

  .hero-contact img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    filter: brightness(0.7);
    border-radius: 18px;
  }

  .hero-contact-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .hero-contact-overlay h1 {
    color: #fff;
    font-weight: bold;
    font-size: 2.5rem;
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    margin-bottom: 0.5rem;
  }

  .hero-contact-overlay p {
    color: #fff;
    font-size: 1.2rem;
    text-shadow: 0 1px 6px rgba(0,0,0,0.2);
    max-width: 600px;
    text-align: center;
  }

  #back-home-btn {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  #notif-alert {
    display: none;
    position: fixed;
    top: 30px;
    right: 30px;
    z-index: 9999;
    min-width: 250px;
  }
</style>

<section id="contact-section" class="full-section mb-4">
  <div class="container">
    <h2 class="h1-responsive font-weight-bold text-center my-4">Hubungi Kami</h2>

    <!-- Hero Section -->
    <div class="hero-contact mb-5">
      <img src="https://plus.unsplash.com/premium_vector-1711987589978-171fa8d26254?q=80&w=1152&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
           alt="Contact Hero">
      <div class="hero-contact-overlay">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu Anda! Silakan isi form di bawah ini untuk menghubungi tim kami secara langsung.</p>
      </div>
    </div>

    <!-- Form Kontak -->
    <div class="row">
      <div class="col-md-8 mb-md-0 mb-5 mx-auto">
        <form id="contact-form" name="contact-form" action="/projek/contact" method="POST" novalidate>
          <div class="row mb-3">
            <div class="col-md-12">
              <label for="name" class="form-label">Nama Anda</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label for="email" class="form-label">Email Anda</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label for="subject" class="form-label">Subjek</label>
              <input type="text" id="subject" name="subject" class="form-control" placeholder="Masukkan subjek pesan Anda" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label for="message" class="form-label">Pesan Anda</label>
              <textarea id="message" name="message" rows="4" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
          </div>

          <div id="back-home-btn">
            <a href="<?= $baseUrl ?>" class="btn btn-outline-secondary">Balik ke Beranda</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<div id="notif-alert"></div>

<!-- Modal Notifikasi -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-<?= $modalStatus === 'success' ? 'success' : 'danger' ?>">
      <div class="modal-header bg-<?= $modalStatus === 'success' ? 'success' : 'danger' ?> text-white">
        <h5 class="modal-title" id="notifModalLabel">
          <?php if ($modalStatus === 'success'): ?>
            <i class="bi bi-check-circle-fill me-2"></i>Pesan Terkirim!
          <?php else: ?>
            <i class="bi bi-x-circle-fill me-2"></i>Gagal Mengirim
          <?php endif; ?>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <?php if ($modalStatus === 'success'): ?>
          Pesan Anda berhasil dikirim ke tim kami. Terima kasih!
        <?php else: ?>
          Gagal mengirim pesan. Silakan coba lagi.
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  <?php if ($showModal): ?>
    var notifModal = new bootstrap.Modal(document.getElementById('notifModal'));
    notifModal.show();
    setTimeout(function() {
      notifModal.hide();
    }, 2500);
  <?php endif; ?>
});
</script>
