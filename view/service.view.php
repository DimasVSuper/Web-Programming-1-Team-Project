<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$showSuccess = isset($_SESSION['status']) && $_SESSION['status'] === 'success';
if ($showSuccess) unset($_SESSION['status']);

// Base URL dinamis
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '' || $baseUrl === '\\') $baseUrl = '';

// CSRF token dari controller
$csrf_token = $_SESSION['csrf_token'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Service HP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .card {
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 2px 16px rgba(0,0,0,0.06);
            margin-top: 2rem;
        }
        .card-header {
            background: #fff;
            border-bottom: none;
            padding-bottom: 0;
        }
        .card-header h3 {
            color: #007bff;
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .form-label { font-weight: 500; color: #222; }
        .form-control {
            border-radius: 0.7rem;
            border: 1.5px solid #eaeaea;
            font-size: 1.05rem;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.15rem rgba(0,123,255,0.08);
        }
        .btn-primary, .btn-success, .btn-outline-secondary {
            border-radius: 25px;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            border: none;
            transition: background 0.2s, color 0.2s;
        }
        .btn-primary { background: #007bff; color: #fff; }
        .btn-primary:hover { background: #0056b3; color: #fff; }
        .btn-success { background: #28a745; color: #fff; }
        .btn-success:hover { background: #218838; color: #fff; }
        .btn-outline-secondary {
            background: #fff; color: #6c757d; border: 1.5px solid #ced4da;
        }
        .btn-outline-secondary:hover { background: #f0f0f0; color: #222; }
        .modal-content { border-radius: 1rem; }
        .modal-header { border-top-left-radius: 1rem; border-top-right-radius: 1rem; }
        .modal-title { font-weight: 600; }
        @media (max-width: 576px) {
            .card-header h3 { font-size: 1.3rem; }
            .btn { font-size: 0.95rem; }
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h3 class="mb-0"><i class="bi bi-tools me-2"></i>Form Service HP</h3>
                    <p class="text-muted mb-0" style="font-size:1rem;">Isi data service HP Anda dengan benar.</p>
                </div>
                <div class="card-body">
                    <form action="<?= $baseUrl ?>/service" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_hp" class="form-label">Nama HP:</label>
                            <input type="text" id="nama_hp" name="nama_hp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="kerusakan" class="form-label">Kerusakan pada HP:</label>
                            <textarea id="kerusakan" name="kerusakan" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= $baseUrl ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Beranda
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Kirim
                            </button>
                            <a href="<?= $baseUrl ?>/invoice" class="btn btn-success">
                                <i class="bi bi-receipt"></i> Invoice
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-show="<?= $showSuccess ? '1' : '0' ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius:1.2rem; box-shadow:0 4px 32px rgba(0,123,255,0.08);">
            <div class="modal-body text-center py-5">
                <div class="mb-3">
                    <span style="display:inline-block; background:#e6f7ee; border-radius:50%; padding:1.2rem;">
                        <i class="bi bi-check-circle-fill" style="font-size:2.5rem; color:#28a745;"></i>
                    </span>
                </div>
                <h4 class="mb-2" style="color:#28a745; font-weight:700;">Data Terkirim!</h4>
                <p class="mb-0" style="color:#444;">Data service Anda sudah berhasil dikirim.<br>Terima kasih!</p>
                <button type="button" class="btn btn-success mt-4 px-4" data-bs-dismiss="modal" style="border-radius:25px;">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var successModal = document.getElementById('successModal');
    if (successModal && successModal.dataset.show === "1") {
        var modal = new bootstrap.Modal(successModal);
        modal.show();
        setTimeout(function() {
            modal.hide();
            document.activeElement.blur();
        }, 2500);
    }
});
</script>
</body>
</html>