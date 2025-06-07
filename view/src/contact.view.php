<?php
// Mendapatkan base URL untuk tombol "Balik ke Beranda"
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '') {
    $baseUrl = '/';
}

// Cek apakah perlu menampilkan modal notifikasi (sukses/gagal)
$showModal = false;
$modalStatus = '';
if (isset($_SESSION['status'])) {
    $showModal = true;
    $modalStatus = $_SESSION['status']; // 'success' atau 'error'
    unset($_SESSION['status']);
}
?>


<style>
  body {
    background: #f8fafc;
  }
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

  .contact-card {
    background: #fff;
    border-radius: 1.5rem;
    box-shadow: 0 8px 32px rgba(0,123,255,0.13), 0 2px 8px rgba(0,0,0,0.06);
    padding: 2.5rem 2rem 2rem 2rem;
    max-width: 520px;
    margin: 2.5rem auto 0 auto;
  }
  .contact-card h2 {
    color: #007bff;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    text-align: center;
    letter-spacing: 1px;
  }
  .form-label {
    font-weight: 600;
    color: #222;
  }
  .form-control {
    border-radius: 0.7rem;
    border: 1.5px solid #eaeaea;
    font-size: 1.05rem;
    background: #f8fafc;
  }
  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.15rem rgba(0,123,255,0.08);
    background: #fff;
  }
  .btn-primary {
    background: #007bff;
    color: #fff;
    border-radius: 25px;
    font-weight: 700;
    padding: 0.6rem 2.2rem;
    box-shadow: 0 2px 8px rgba(0,123,255,0.08);
    border: none;
    transition: background 0.2s;
    font-size: 1.08rem;
  }
  .btn-primary:hover {
    background: #0056b3;
    color: #fff;
  }
  .btn-outline-secondary {
    border-radius: 25px;
    font-weight: 600;
    border: 1.5px solid #ced4da;
    background: #fff;
    color: #6c757d;
    margin-top: 1.2rem;
    width: 100%;
    padding: 0.6rem 2.2rem;
    font-size: 1.08rem;
  }
  .btn-outline-secondary:hover {
    background: #f0f0f0;
    color: #222;
  }
  /* Styles untuk modal notifikasi */
  #notifModal .modal-content {
    border-radius: 1.5rem;
    box-shadow: 0 6px 32px rgba(0,123,255,0.09);
    border: none;
    background: #fff;
  }
  #notifModal .modal-body {
    padding: 2.5rem 2rem 2rem 2rem;
  }
  #notifModal .notif-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #e6f7ee;
    border-radius: 50%;
    width: 4.5rem;
    height: 4.5rem;
    margin-bottom: 1.2rem;
    box-shadow: 0 2px 12px rgba(40,167,69,0.08);
  }
  #notifModal .notif-icon.failed {
    background: #fffbe6;
    box-shadow: 0 2px 12px rgba(255,193,7,0.08);
  }
  #notifModal .notif-icon i {
    font-size: 2.5rem;
  }
  #notifModal .notif-title {
    font-weight: 800;
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #222;
    letter-spacing: 0.5px;
  }
  #notifModal .notif-title.success { color: #28a745; }
  #notifModal .notif-title.failed { color: #dc3545; }
  #notifModal .notif-msg {
    color: #444;
    font-size: 1.08rem;
    margin-bottom: 0;
  }
  #notifModal .btn {
    border-radius: 25px;
    font-weight: 600;
    padding: 0.5rem 2.2rem;
    font-size: 1.08rem;
    margin-top: 1.5rem;
  }
</style>

<section id="contact-section" class="full-section mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-md-0 mb-5 mx-auto">
        <div class="contact-card">
          <h2>Hubungi Kami</h2>
          <form id="contact-form" name="contact-form" action="/projek/contact" method="POST" novalidate>
            <div class="mb-3">
              <label for="name" class="form-label">Nama Anda</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Anda</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subjek</label>
              <input type="text" id="subject" name="subject" class="form-control" placeholder="Masukkan subjek pesan Anda" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Pesan Anda</label>
              <textarea id="message" name="message" rows="4" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg w-100 mb-2">Kirim</button>
              <a href="<?= $baseUrl ?>" class="btn btn-outline-secondary w-100">Balik ke Beranda</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="notif-alert"></div>

<!-- Modal Notifikasi Neve-like -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="notif-icon <?= $modalStatus === 'success' ? '' : 'failed' ?>">
          <?php if ($modalStatus === 'success'): ?>
            <i class="bi bi-check-circle-fill" style="color:#28a745"></i>
          <?php else: ?>
            <i class="bi bi-x-circle-fill" style="color:#dc3545"></i>
          <?php endif; ?>
        </div>
        <div class="notif-title <?= $modalStatus === 'success' ? 'success' : 'failed' ?>">
          <?= $modalStatus === 'success' ? 'Pesan Terkirim!' : 'Gagal Mengirim' ?>
        </div>
        <div class="notif-msg">
          <?= $modalStatus === 'success'
            ? 'Pesan Anda berhasil dikirim ke tim kami. Terima kasih!'
            : 'Gagal mengirim pesan. Silakan coba lagi.' ?>
        </div>
        <button type="button" class="btn <?= $modalStatus === 'success' ? 'btn-success' : 'btn-danger' ?>" data-bs-dismiss="modal">Tutup</button>
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
