<?php
// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) session_start();

$showSuccess = isset($_SESSION['success']);
$successMessage = $showSuccess ? $_SESSION['success'] : '';
if ($showSuccess) unset($_SESSION['success']);

$showNotFound = isset($_SESSION['not_found']) && $_SESSION['not_found'] === true;
if ($showNotFound) unset($_SESSION['not_found']);

// CSRF token dari controller
$csrf_token = $_SESSION['csrf_token'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice Service HP | Riss Cell</title>
    <meta name="description" content="Cek status pembayaran dan detail invoice service HP Anda di Riss Cell." />
    <meta name="keywords" content="invoice, service hp, pembayaran, riss cell, reparasi handphone, Jakarta Barat" />
    <meta name="author" content="Riss Cell" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="theme-color" content="#007bff" />
    <meta name="language" content="id" />
    <meta name="copyright" content="Riss Cell" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="global" />
    <meta name="geo.region" content="ID-JK" />
    <meta name="geo.placename" content="Jakarta Barat" />
    <meta name="geo.position" content="-6.109610;106.710319" />
    <meta name="ICBM" content="-6.109610, 106.710319" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Invoice Service HP | Riss Cell" />
    <meta property="og:description" content="Cek status pembayaran dan detail invoice service HP Anda di Riss Cell." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta property="og:url" content="https://risscell.rf.gd/invoice" />
    <meta property="og:site_name" content="Riss Cell" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Invoice Service HP | Riss Cell" />
    <meta name="twitter:description" content="Cek status pembayaran dan detail invoice service HP Anda di Riss Cell." />
    <meta name="twitter:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta name="twitter:site" content="@risscell" />
    <meta name="twitter:creator" content="@risscell" />

    <link rel="icon" href="view/image/HP.png" type="image/png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 6px 32px rgba(0,123,255,0.07), 0 1.5px 4px rgba(0,0,0,0.03);
            margin-top: 2.5rem;
        }
        .card-header {
            background: linear-gradient(90deg, #f8fafc 60%, #e3f0ff 100%);
            border-bottom: 1px solid #eaeaea;
            border-radius: 1.5rem 1.5rem 0 0;
            padding: 2rem 2rem 1.2rem 2rem;
            text-align: center;
        }
        .card-header h3 {
            color: #007bff;
            font-weight: 700;
            font-size: 2.1rem;
            margin-bottom: 0.3rem;
            letter-spacing: 1px;
        }
        .card-header .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 0;
        }
        .table {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 0;
        }
        .table th {
            background: #f8fafc;
            color: #222;
            font-weight: 500;
            width: 35%;
            border: none;
            vertical-align: middle;
        }
        .table td {
            color: #444;
            border: none;
            vertical-align: middle;
        }
        .badge-status {
            font-size: 1rem;
            border-radius: 1rem;
            padding: 0.4em 1.2em;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .badge-paid {
            background: #e6f7ee;
            color: #28a745;
        }
        .badge-unpaid,
        .badge-status.badge-unpaid {
            background: #fffbe6;
            color: #111 !important;
            font-weight: 900;
            font-size: 1.08rem;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 0 #fff, 0 0.5px 0 #fff;
        }
        .alert-success {
            border-radius: 0.7rem;
            font-size: 1.1rem;
            background: #e6f7ee;
            color: #28a745;
            border: none;
        }
        .btn-primary, .btn-outline-primary, .btn-success, .btn-warning {
            border-radius: 25px;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            border: none;
            transition: background 0.2s, color 0.2s;
        }
        .btn-primary { background: #007bff; color: #fff; }
        .btn-primary:hover { background: #0056b3; color: #fff; }
        .btn-outline-primary {
            background: #fff;
            color: #007bff;
            border: 1.5px solid #007bff;
        }
        .btn-outline-primary:hover { background: #007bff; color: #fff; }
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
        /* Modal Neve-like */
        .modal-content {
            border-radius: 1.2rem;
            box-shadow: 0 4px 32px rgba(0,123,255,0.08);
            border: none;
        }
        .modal-body {
            padding: 2.5rem 2rem 2rem 2rem;
        }
        .modal-success-icon {
            display: inline-block;
            background: #e6f7ee;
            border-radius: 50%;
            padding: 1.2rem;
            margin-bottom: 1rem;
        }
        .modal-success-icon i {
            font-size: 2.5rem;
            color: #28a745;
        }
        .modal-warning-icon {
            display: inline-block;
            background: #fffbe6;
            border-radius: 50%;
            padding: 1.2rem;
            margin-bottom: 1rem;
        }
        .modal-warning-icon i {
            font-size: 2.5rem;
            color: #ffc107;
        }
        .modal-title { font-weight: 700; color: #222; margin-bottom: 0.5rem; }
        .modal-success-title { color: #28a745; }
        .modal-warning-title { color: #ffc107; }
        .modal-footer { border: none; justify-content: center; padding-bottom: 2rem; }
        @media (max-width: 576px) {
            .card-header h3 { font-size: 1.3rem; }
            .btn { font-size: 0.95rem; }
            .modal-body { padding: 2rem 1rem 1.5rem 1rem; }
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-1"><i class="bi bi-receipt"></i> Invoice Service HP</h3>
                    <div class="subtitle">Detail transaksi dan status pembayaran service HP Anda</div>
                </div>
                <div class="card-body">
                    <?php if (isset($invoice) && is_array($invoice) && !empty($invoice)): ?>
                        <!-- Tabel detail invoice -->
                        <table class="table table-bordered mb-4">
                            <tr>
                                <th>Nama</th>
                                <td><?= htmlspecialchars($invoice['nama'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= htmlspecialchars($invoice['email'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Nama HP</th>
                                <td><?= htmlspecialchars($invoice['nama_hp'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Kerusakan</th>
                                <td><?= htmlspecialchars($invoice['kerusakan'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Biaya Awal</th>
                                <td>
                                    <?php
                                    $biaya_belum_input = !isset($invoice['biaya_awal']) || $invoice['biaya_awal'] === null || $invoice['biaya_awal'] === '' || $invoice['biaya_awal'] <= 0;
                                    if ($biaya_belum_input) {
                                        echo '<span class="badge badge-unpaid">Belum diinput</span>';
                                    } else {
                                        echo '<span class="fw-bold text-success">Rp ' . number_format($invoice['biaya_awal'], 0, ',', '.') . '</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Biaya + PPN 12%</th>
                                <td>
                                    <?php
                                    if ($biaya_belum_input) {
                                        echo '<span class="badge badge-unpaid">-</span>';
                                    } else {
                                        $biaya_ppn = isset($invoice['biaya_awal_ppn'])
                                            ? $invoice['biaya_awal_ppn']
                                            : ($invoice['biaya_awal'] * 1.12);
                                        echo '<span class="fw-bold text-primary">Rp ' . number_format($biaya_ppn, 0, ',', '.') . '</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <?php if (isset($invoice['status']) && $invoice['status'] === 'paid'): ?>
                                        <span class="badge badge-status badge-paid"><i class="bi bi-check-circle-fill me-1"></i>Sudah Bayar</span>
                                        <?php if (!empty($invoice['paid_at'])): ?>
                                            <span class="ms-2 text-muted" style="font-size:0.95rem;"><?= htmlspecialchars($invoice['paid_at']) ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge badge-status badge-unpaid"><i class="bi bi-clock-history me-1"></i>Belum Bayar</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <?php if (isset($invoice['status']) && $invoice['status'] === 'paid'): ?>
                            <!-- Notifikasi sudah bayar -->
                            <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <strong>Sudah Bayar</strong>
                            </div>
                        <?php elseif (!$biaya_belum_input): ?>
                            <!-- Form bayar jika belum bayar -->
                            <form method="POST" action="invoice" class="mt-3" id="bayar-form">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($invoice['id'] ?? '') ?>">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-cash-coin"></i> Bayar Sekarang
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Form pencarian invoice jika belum ada data -->
                        <div class="mb-4 text-center">
                            <i class="bi bi-search" style="font-size:2.5rem;color:#007bff;"></i>
                            <h5 class="mt-2 mb-3" style="color:#007bff;font-weight:600;">Cari Invoice Service HP Anda</h5>
                        </div>
                        <form method="GET" action="invoice" class="mx-auto" style="max-width:400px;">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search"></i> Cari Invoice
                            </button>
                        </form>
                    <?php endif; ?>
                    <!-- Tombol kembali ke form service -->
                    <div class="mt-4 d-flex justify-content-end">
                        <a href="service" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Form Service
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sukses Pembayaran Neve-like -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="modal-success-icon">
          <i class="bi bi-check-circle-fill"></i>
        </div>
        <h4 class="modal-title modal-success-title mb-2" id="successModalLabel">Berhasil!</h4>
        <p class="mb-0"><?= htmlspecialchars($successMessage ?: 'Transaksi berhasil.') ?></p>
        <div class="modal-footer">
          <button type="button" class="btn btn-success px-4" data-bs-dismiss="modal" style="border-radius:25px;">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Data Tidak Ditemukan Neve-like -->
<div class="modal fade" id="notFoundModal" tabindex="-1" aria-labelledby="notFoundModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="modal-warning-icon">
          <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <h4 class="modal-title modal-warning-title mb-2" id="notFoundModalLabel">Data Tidak Ditemukan</h4>
        <p class="mb-0">Invoice tidak ditemukan. Silakan cek kembali nama dan email Anda.</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning px-4" data-bs-dismiss="modal" style="border-radius:25px;">Tutup</button>
        </div>
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
            window.location.href = 'service';
        }, 2500);
    });
</script>
<?php endif; ?>
<?php if ($showNotFound): ?>
<script>
    var notFoundModal = new bootstrap.Modal(document.getElementById('notFoundModal'));
    window.addEventListener('DOMContentLoaded', function() {
        notFoundModal.show();
    });
</script>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var bayarForm = document.getElementById('bayar-form');
  if (bayarForm) {
    bayarForm.addEventListener('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(bayarForm);
      var btn = bayarForm.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Memproses...';

      fetch('invoice', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(res => res.json())
      .then(data => {
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-cash-coin"></i> Bayar Sekarang';
        if (data.status === 'success') {
          var successModal = new bootstrap.Modal(document.getElementById('successModal'));
          document.querySelector('#successModal .modal-title').textContent = 'Berhasil!';
          document.querySelector('#successModal p').textContent = data.message || 'Transaksi berhasil.';
          successModal.show();
          setTimeout(function() {
            successModal.hide();
            window.location.reload();
          }, 2000);
        } else {
          alert(data.message || 'Gagal memproses pembayaran.');
        }
      })
      .catch(() => {
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-cash-coin"></i> Bayar Sekarang';
        alert('Terjadi kesalahan jaringan.');
      });
    });
  }
});
</script>
</body>
</html>