<?php
echo "Request URI: " . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .error-container {
            max-width: 600px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
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
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Halaman yang Anda cari tidak ditemukan.</div>
        <p>Mungkin halaman tersebut telah dihapus atau alamat URL yang Anda masukkan salah.</p>
        <a href="?page=home" class="btn btn-light btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>