<?php
// 404.view.php

// Mendapatkan base URL secara dinamis dari lokasi script
$baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
if ($baseUrl === '') {
    $baseUrl = '/';
}

// Mengamankan dan menampilkan URI yang diminta user
$requestUri = htmlspecialchars($_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 - Halaman Tidak Ditemukan</title>
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0;
        }
        .error-container {
            max-width: 600px;
            padding: 20px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
        }
        .error-message {
            font-size: 1.5rem;
            margin: 20px 0;
        }
        .btn-home {
            margin-top: 20px;
            padding: 10px 30px;
            border-radius: 25px;
            font-size: 1.1rem;
        }
        code {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Halaman yang Anda cari tidak ditemukan.</div>
        <p>Halaman berikut tidak tersedia:</p>
        <p><code><?= $requestUri ?></code></p>
        <p>Mungkin halaman tersebut telah dihapus atau alamat URL yang Anda masukkan salah.</p>
        <a href="<?= $baseUrl ?>" class="btn btn-light btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>
