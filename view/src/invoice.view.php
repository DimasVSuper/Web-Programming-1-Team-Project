<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice Service HP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                                    <td>Rp <?= isset($invoice['biaya_awal']) ? number_format($invoice['biaya_awal'], 0, ',', '.') : '0' ?></td>
                                </tr>
                            </table>
                            <?php if (isset($payment) && $payment['status'] === 'paid'): ?>
                                <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    <strong>Sudah Bayar</strong>
                                </div>
                            <?php else: ?>
                                <!-- Gimmick Bayar: Tidak submit form, hanya tampilkan alert -->
                                <button type="button" class="btn btn-primary mt-3" id="gimmick-bayar">
                                    <i class="bi bi-cash-coin"></i> Bayar Sekarang
                                </button>
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var btn = document.getElementById('gimmick-bayar');
                                    if (btn) {
                                        btn.addEventListener('click', function() {
                                            btn.disabled = true;
                                            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Pembayaran Berhasil!';
                                            btn.classList.remove('btn-primary');
                                            btn.classList.add('btn-success');
                                            // Optional: tampilkan alert bootstrap
                                            var alert = document.createElement('div');
                                            alert.className = 'alert alert-success mt-3';
                                            alert.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i>Terima kasih, pembayaran berhasil!';
                                            btn.parentNode.insertBefore(alert, btn.nextSibling);
                                        });
                                    }
                                });
                                </script>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="alert alert-warning">Data invoice tidak ditemukan.</div>
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
    <?php
    session_start();
    if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?= $_SESSION['success']; ?>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = '/projek/service';
            }, 2500); // 2.5 detik
        </script>
    <?php unset($_SESSION['success']); endif; ?>
</body>
</html>