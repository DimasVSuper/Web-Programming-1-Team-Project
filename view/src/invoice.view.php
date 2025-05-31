<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    $showSuccess = false;
    if (isset($_SESSION['success'])) {
        $showSuccess = true;
        $successMessage = $_SESSION['success'];
        unset($_SESSION['success']);
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Service HP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
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
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0"><i class="bi bi-receipt"></i> Invoice Service HP</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($invoice) && $invoice): ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= htmlspecialchars($invoice['nama']) ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= htmlspecialchars($invoice['email']) ?></td>
                                </tr>
                                <tr>
                                    <th>Nama HP</th>
                                    <td><?= htmlspecialchars($invoice['nama_hp']) ?></td>
                                </tr>
                                <tr>
                                    <th>Kerusakan</th>
                                    <td><?= htmlspecialchars($invoice['kerusakan']) ?></td>
                                </tr>
                                <tr>
                                    <th>Biaya Awal</th>
                                    <td>
                                        <?php
                                        $biaya_belum_input = !isset($invoice['biaya_awal']) || $invoice['biaya_awal'] === null || $invoice['biaya_awal'] === '' || $invoice['biaya_awal'] <= 0;
                                        if ($biaya_belum_input) {
                                            echo '<span class="text-danger">Biaya belum di input</span>';
                                        } else {
                                            echo 'Rp ' . number_format($invoice['biaya_awal'], 0, ',', '.');
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <?php if (isset($invoice['status']) && $invoice['status'] === 'paid'): ?>
                                <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    <strong>Sudah Bayar</strong>
                                    <?php if (!empty($invoice['paid_at'])): ?>
                                        <span class="ms-3">(<?= htmlspecialchars($invoice['paid_at']) ?>)</span>
                                    <?php endif; ?>
                                </div>
                            <?php elseif (!$biaya_belum_input): ?>
                                <!-- Form bayar ke backend -->
                                <form method="POST" action="/projek/invoice/pay" class="mt-3">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($invoice['id']) ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-cash-coin"></i> Bayar Sekarang
                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if (!empty($not_found)): ?>
                                <div id="notfound-alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Data invoice tidak ditemukan.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <script>
                                    setTimeout(function() {
                                        var alertEl = document.getElementById('notfound-alert');
                                        if (alertEl) {
                                            var bsAlert = new bootstrap.Alert(alertEl);
                                            bsAlert.close();
                                        }
                                    }, 7000);
                                </script>
                            <?php endif; ?>
                            <form method="GET" action="/projek/invoice" class="mt-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i> Cari Invoice
                                </button>
                            </form>
                        <?php endif; ?>
                        <div class="mt-4 d-flex justify-content-end">
                            <a href="/projek/service" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Form Service
                            </a>
                        </div>
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
            <h5 class="modal-title" id="successModalLabel"><i class="bi bi-check-circle-fill me-2"></i>Berhasil!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <p class="mb-0"><?= isset($successMessage) ? htmlspecialchars($successMessage) : 'Transaksi berhasil.' ?></p>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($showSuccess): ?>
    <script>
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        window.addEventListener('DOMContentLoaded', function() {
            successModal.show();
            setTimeout(function() {
                successModal.hide();
                window.location.href = '/projek/service';
            }, 2500); // Modal otomatis hilang setelah 2.5 detik lalu redirect
        });
    </script>
    <?php endif; ?>
</body>
</html>