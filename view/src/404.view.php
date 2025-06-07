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
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 0;
        }
        .error-card {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 6px 32px rgba(0,123,255,0.07), 0 1.5px 4px rgba(0,0,0,0.03);
            padding: 2.5rem 2rem 2rem 2rem;
            max-width: 480px;
            margin: 2.5rem auto 0 auto;
        }
        .error-code {
            font-size: 5.5rem;
            font-weight: 800;
            color: #007bff;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
        }
        .error-message {
            font-size: 1.35rem;
            color: #222;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }
        .error-detail {
            color: #555;
            font-size: 1.05rem;
            margin-bottom: 0.7rem;
        }
        code {
            background-color: #f8fafc;
            color: #007bff;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
        }
        .btn-home {
            margin-top: 1.5rem;
            padding: 0.7rem 2.2rem;
            border-radius: 25px;
            font-size: 1.08rem;
            font-weight: 700;
            background: #007bff;
            color: #fff;
            border: none;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            transition: background 0.2s;
        }
        .btn-home:hover {
            background: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Halaman tidak ditemukan.</div>
        <div class="error-detail">Halaman berikut tidak tersedia:</div>
        <div class="mb-2"><code><?= $requestUri ?></code></div>
        <div class="error-detail">Mungkin halaman telah dihapus atau alamat URL salah.</div>
        <a href="<?= $baseUrl ?>" class="btn btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>
