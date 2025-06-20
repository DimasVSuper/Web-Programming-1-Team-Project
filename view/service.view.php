<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$showSuccess = isset($_SESSION['status']) && $_SESSION['status'] === 'success';
if ($showSuccess) unset($_SESSION['status']);
$csrf_token = $_SESSION['csrf_token'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Service HP | Riss Cell</title>
    <meta name="description" content="Formulir service HP di Riss Cell. Isi data Anda untuk perbaikan handphone cepat dan terpercaya di Jakarta Barat." />
    <meta name="keywords" content="riss cell, service hp, reparasi handphone, form service, Jakarta Barat, service android, service iphone, tukar tambah hp, sparepart hp" />
    <meta name="author" content="Riss Cell" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="theme-color" content="#007bff" />
    <meta name="language" content="id" />
    <meta name="copyright" content="Ris Cell" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="global" />
    <meta name="geo.region" content="ID-JK" />
    <meta name="geo.placename" content="Jakarta Barat" />
    <meta name="geo.position" content="-6.109610;106.710319" />
    <meta name="ICBM" content="-6.109610, 106.710319" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Form Service HP | Riss Cell" />
    <meta property="og:description" content="Formulir service HP di Riss Cell. Isi data Anda untuk perbaikan handphone cepat dan terpercaya di Jakarta Barat." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta property="og:url" content="https://risscell.rf.gd/service" />
    <meta property="og:site_name" content="Ris Cell" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Form Service HP | Riss Cell" />
    <meta name="twitter:description" content="Formulir service HP di Riss Cell. Isi data Anda untuk perbaikan handphone cepat dan terpercaya di Jakarta Barat." />
    <meta name="twitter:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta name="twitter:site" content="@risscell" />
    <meta name="twitter:creator" content="@risscell" />

    <link rel="icon" href="view/image/HP.png" type="image/png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
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
                        <form action="service" method="POST" autocomplete="off" id="service-form">
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
                                <a href="./" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Beranda
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                                <a href="invoice" class="btn btn-success">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal sukses dari session (jika ada)
        var successModal = document.getElementById('successModal');
        if (successModal && successModal.dataset.show === "1") {
            var modal = new bootstrap.Modal(successModal);
            modal.show();
            setTimeout(function() {
                modal.hide();
                document.activeElement.blur();
            }, 2500);
        }

        // AJAX untuk form service
        var form = document.getElementById('service-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(form);
                var btn = form.querySelector('button[type="submit"]');
                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Mengirim...';

                fetch('service', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(res => res.json())
                .then(data => {
                    btn.disabled = false;
                    btn.innerHTML = 'Kirim';
                    if (data.status === 'success') {
                        var modal = new bootstrap.Modal(successModal);
                        modal.show();
                        setTimeout(function() {
                            modal.hide();
                            document.activeElement.blur();
                            window.location.reload(); // Tambahkan baris ini
                        }, 2500);
                    } else {
                        alert(data.message || 'Gagal mengirim data. Silakan coba lagi.');
                    }
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.innerHTML = 'Kirim';
                    alert('Terjadi kesalahan jaringan.');
                });
            });
        }
    });
    </script>
</body>
</html>