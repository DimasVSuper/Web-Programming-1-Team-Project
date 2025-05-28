<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Service HP</title>
    <link rel="stylesheet" href="components.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <form action="/service" method="POST">
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
                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                                <a href="/invoice" class="btn btn-success">
                                    <i class="bi bi-receipt"></i> Lihat Invoice
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>