<?php
// 404.view.php

// Tidak perlu baseUrl dinamis, gunakan relative path saja agar aman di InfinityFree & lokal

// Mengamankan dan menampilkan URI yang diminta user
$requestUri = htmlspecialchars($_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 - Halaman Tidak Ditemukan</title>
    <meta name="description" content="Halaman yang Anda cari tidak ditemukan di Riss Cell. Mungkin sudah dihapus atau alamat URL salah." />
    <meta name="keywords" content="404, halaman tidak ditemukan, error, riss cell, service hp, reparasi handphone" />
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="404 - Halaman Tidak Ditemukan | Riss Cell" />
    <meta property="og:description" content="Halaman yang Anda cari tidak ditemukan di Riss Cell. Mungkin sudah dihapus atau alamat URL salah." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta property="og:url" content="https://risscell.rf.gd<?= $requestUri ?>" />
    <meta property="og:site_name" content="Riss Cell" />
    <meta property="og:locale" content="id_ID" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="404 - Halaman Tidak Ditemukan | Riss Cell" />
    <meta name="twitter:description" content="Halaman yang Anda cari tidak ditemukan di Riss Cell. Mungkin sudah dihapus atau alamat URL salah." />
    <meta name="twitter:image" content="https://risscell.rf.gd/view/image/HP.png" />
    <meta name="twitter:site" content="@risscell" />
    <meta name="twitter:creator" content="@risscell" />

    <link rel="icon" href="view/image/HP.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }
        .btn-home:hover {
            background: #0056b3;
            color: #fff;
        }
        .btn-home i {
            font-size: 1.3rem;
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
        <a href="./" class="btn btn-home">
            <i class="bi bi-house-door-fill"></i>
            <span>Kembali ke Beranda</span>
        </a>
    </div>
</body>
</html>
