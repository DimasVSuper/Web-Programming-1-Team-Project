<?php

// Fungsi untuk mendapatkan halaman yang diminta dari parameter URL
function getRequestedPage() {
    return $_GET['page'] ?? 'home'; // Jika tidak ada parameter 'page', default ke 'home'
}

// Fungsi untuk mendefinisikan rute yang tersedia dalam aplikasi
function getRoutes() {
    return [
        'home' => './view/src/home.view.php', // Rute untuk halaman home
        'contact' => './view/src/contact.view.php', // Rute untuk halaman kontak
        // Tambahkan route baru di sini
    ];
}

// Fungsi untuk memproses form kontak
function processContactForm() {
    include './model/contact_processing.php'; // Memasukkan file pemrosesan kontak
    // Setelah proses, redirect kembali ke halaman contact untuk menghindari resubmit
    header('Location: /projek/contact'); // Redirect ke halaman kontak
    exit;
}

// Fungsi untuk menampilkan tampilan berdasarkan path yang diberikan
function renderView($viewPath) {
    include $viewPath; // Memasukkan file tampilan
}

// Fungsi untuk menampilkan halaman 404 jika rute tidak ditemukan
function render404() {
    http_response_code(404); // Mengatur kode respons HTTP ke 404
    include './view/src/404.view.php'; // Memasukkan file tampilan 404
}

// Fungsi utama untuk menangani routing
function handleRoute() {
    $page = getRequestedPage(); // Mendapatkan halaman yang diminta
    $routes = getRoutes(); // Mendapatkan daftar rute yang tersedia

    // Proses form kontak jika ada POST ke page=contact
    if ($page === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        processContactForm(); // Memproses form kontak
    }

    // Cek apakah route yang diminta ada dalam daftar
    if (array_key_exists($page, $routes)) {
        renderView($routes[$page]); // Menampilkan tampilan yang sesuai
    } else {
        render404(); // Menampilkan halaman 404 jika rute tidak ditemukan
    }
}