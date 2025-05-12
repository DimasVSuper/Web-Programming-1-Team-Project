<?php

function route() {
    // Ambil parameter 'page' dari query string, default ke 'home'
    $page = $_GET['page'] ?? 'home';

    // Daftar route yang tersedia
    $routes = [
        '/' => './view/src/home.view.php',
        'contact' => './view/src/contact.view.php',
        // Tambahkan route baru di sini
    ];

    // Proses form kontak jika ada POST ke page=contact
    if ($page === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        // Proses form
        include './database/contact_processing.php';
        
        // Setelah proses, redirect kembali ke halaman contact untuk menghindari resubmit
        header('Location: ?page=contact');
        exit;
    }

    // Cek apakah route yang diminta ada dalam daftar
    if (array_key_exists($page, $routes)) {
        include $routes[$page];
    } else {
        // Jika route tidak ditemukan, tampilkan 404
        http_response_code(404);
        include './view/src/404.view.php'; // Buat file 404.view.php untuk halaman not found
    }
}