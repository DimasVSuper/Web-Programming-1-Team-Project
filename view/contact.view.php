<?php
// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) session_start();

// CSRF token dari controller
$csrf_token = $_SESSION['csrf_token'] ?? '';

// Cek apakah perlu menampilkan modal notifikasi (sukses/gagal)
$showModal = false;
$modalStatus = '';
if (isset($_SESSION['status'])) {
    $showModal = true;
    $modalStatus = $_SESSION['status']; // 'success' atau 'error'
    unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Kontak | Riss Cell</title>
  <meta name="description" content="Hubungi Riss Cell untuk layanan service HP, konsultasi, dan informasi lebih lanjut." />
  <meta name="keywords" content="kontak, riss cell, service hp, reparasi handphone, Jakarta Barat" />
  <meta name="author" content="Riss Cell" />
  <link rel="icon" href="view/public/favicon.ico" type="image/x-icon" />

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Kontak | Riss Cell" />
  <meta property="og:description" content="Hubungi Riss Cell untuk layanan service HP, konsultasi, dan informasi lebih lanjut." />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://risscell.rf.gd/view/image/HP.png" />
  <meta property="og:url" content="https://risscell.rf.gd/contact" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Kontak | Riss Cell" />
  <meta name="twitter:description" content="Hubungi Riss Cell untuk layanan service HP, konsultasi, dan informasi lebih lanjut." />
  <meta name="twitter:image" content="https://risscell.rf.gd/view/image/HP.png" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="view/image/HP.png" type="image/png" />
  <style>
    body {
      background: #f8fafc;
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
      margin: 3.5rem auto 0 auto;
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
</head>
<body>

<section id="contact-section" class="full-section mb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mb-md-0 mb-5 mx-auto">
        <div class="contact-card">
          <h2>Hubungi Kami</h2>
          <form id="contact-form" name="contact-form" action="contact" method="POST" novalidate>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
            <div class="mb-3">
              <label for="name" class="form-label">Nama Anda</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Anda</label>
              <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Masukkan email Anda" required>
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
              <a href="./" class="btn btn-outline-secondary w-100">Balik ke Beranda</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div id="notif-alert"></div>

<!-- Modal Notifikasi Neve-like -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-labelledby="notifModalLabel" aria-hidden="true" data-show="<?= $showModal ? '1' : '0' ?>">
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
  var notifModal = document.getElementById('notifModal');
  if (notifModal && notifModal.dataset.show === "1") {
    var modal = new bootstrap.Modal(notifModal);
    modal.show();
    setTimeout(function() {
      modal.hide();
      document.activeElement.blur();
      if (data.status === 'success') window.location.reload();
    }, 2500);
  }

  // Ganti submit form menjadi AJAX
  document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var form = this;
    var formData = new FormData(form);

    // Validasi email sederhana (bisa disesuaikan)
    var emailInput = document.getElementById('email');
    var email = emailInput.value.trim().toLowerCase();
    var sanitized = email.replace(/[^a-z0-9@._-]/g, '');
    if (email !== sanitized) {
      alert('Email hanya boleh huruf kecil, angka, titik, strip, underscore, dan @');
      emailInput.value = sanitized;
      emailInput.focus();
      return false;
    }
    var pattern = /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!pattern.test(sanitized)) {
      alert('Format email tidak valid!');
      emailInput.focus();
      return false;
    }
    emailInput.value = sanitized;

    // Kirim AJAX ke controller/contact
    fetch('contact', {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(response => response.json())
    .then(data => {
      // Tampilkan modal notifikasi sesuai response
      var notifIcon = notifModal.querySelector('.notif-icon');
      var notifTitle = notifModal.querySelector('.notif-title');
      var notifMsg = notifModal.querySelector('.notif-msg');
      var notifBtn = notifModal.querySelector('.btn');

      if (data.status === 'success') {
        notifIcon.classList.remove('failed');
        notifIcon.innerHTML = '<i class="bi bi-check-circle-fill" style="color:#28a745"></i>';
        notifTitle.className = 'notif-title success';
        notifTitle.textContent = 'Pesan Terkirim!';
        notifMsg.textContent = data.message || 'Pesan Anda berhasil dikirim ke tim kami. Terima kasih!';
        notifBtn.className = 'btn btn-success';
      } else {
        notifIcon.classList.add('failed');
        notifIcon.innerHTML = '<i class="bi bi-x-circle-fill" style="color:#dc3545"></i>';
        notifTitle.className = 'notif-title failed';
        notifTitle.textContent = 'Gagal Mengirim';
        notifMsg.textContent = data.message || 'Gagal mengirim pesan. Silakan coba lagi.';
        notifBtn.className = 'btn btn-danger';
      }
      var modal = new bootstrap.Modal(notifModal);
      modal.show();
      setTimeout(function() {
        modal.hide();
        document.activeElement.blur();
        if (data.status === 'success') window.location.reload();
      }, 2500);
    })
    .catch(() => {
      alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
    });
  });
});
</script>
</body>
</html>