<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<?php
$showSuccess = false;
if (isset($_SESSION['status']) && $_SESSION['status'] === 'success') {
    $showSuccess = true;
    unset($_SESSION['status']);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Service HP</title>
    <link rel="stylesheet" href="components.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Animasi fade-in untuk modal */
        .modal.fade .modal-dialog {
            -webkit-transform: translate(0,50px);
            transform: translate(0,50px);
            transition: transform 0.3s ease-out;
        }
        .modal.fade.show .modal-dialog {
            -webkit-transform: translate(0,0);
            transform: translate(0,0);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Form Service HP</h3>
                    </div>
                    <div class="card-body">
                        <form action="/projek/service" method="POST">
                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                            <!-- Input Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <!-- Input Nama HP -->
                            <div class="mb-3">
                                <label for="nama_hp" class="form-label">Nama HP:</label>
                                <input type="text" id="nama_hp" name="nama_hp" class="form-control" required>
                            </div>
                            <!-- Input Kerusakan -->
                            <div class="mb-3">
                                <label for="kerusakan" class="form-label">Kerusakan pada HP:</label>
                                <textarea id="kerusakan" name="kerusakan" rows="4" class="form-control" required></textarea>
                            </div>
                            <!-- Tombol Navigasi -->
                            <div class="d-flex justify-content-between">
                                <a href="/projek" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                                <a href="/projek/invoice" class="btn btn-success">
                                    <i class="bi bi-receipt"></i> Lihat Invoice
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sukses -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-success">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="successModalLabel"><i class="bi bi-check-circle-fill me-2"></i>Data Terkirim!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <p class="mb-0">Data service Anda sudah berhasil dikirim.<br>Terima kasih!</p>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($showSuccess): ?>
<script>
    // Tampilkan modal sukses dengan animasi
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    window.addEventListener('DOMContentLoaded', function() {
        successModal.show();
        setTimeout(function() {
            successModal.hide();
        }, 2500); // Modal otomatis hilang setelah 2.5 detik
    });
</script>
<?php endif; ?>
</body>
</html>