<?php

function getRequestedPage() {
    return $_GET['page'] ?? 'home';
}

function getRoutes() {
    return [
        'home' => './view/src/home.view.php',
        'contact' => './view/src/contact.view.php',
        // Tambahkan route baru di sini
    ];
}

function processContactForm() {
    include './model/contact_processing.php';
    // Setelah proses, redirect kembali ke halaman contact untuk menghindari resubmit
    header('Location: ?page=contact');
    exit;
}

function renderView($viewPath) {
    include $viewPath;
}

function render404() {
    http_response_code(404);
    include './view/src/404.view.php';
}

function handleRoute() {
    $page = getRequestedPage();
    $routes = getRoutes();

    // Proses form kontak jika ada POST ke page=contact
    if ($page === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        processContactForm();
    }

    // Cek apakah route yang diminta ada dalam daftar
    if (array_key_exists($page, $routes)) {
        renderView($routes[$page]);
    } else {
        render404();
    }
}