<?php
/**
 * web.php
 *
 * File ini berisi daftar route aplikasi yang didaftarkan ke Router.
 * Setiap route menghubungkan URL/path dengan controller dan method yang sesuai.
 *
 * @package   projek\core
 */

/**
 * Route definitions:
 *
 * GET  /              → HomeController::index         (Halaman utama/beranda)
 * GET  /home          → HomeController::index         (Alias halaman utama)
 * GET  /contact       → ContactController::showForm   (Form kontak)
 * POST /contact       → ContactController::submit     (Proses submit kontak)
 * GET  /service       → ServiceController::showForm   (Form service request)
 * POST /service       → ServiceController::submit     (Proses submit service)
 * GET  /invoice       → InvoiceController::showInvoice (Cari/tampil invoice)
 * POST /invoice       → InvoiceController::payInvoice (Proses pembayaran invoice)
 */

$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);
$router->get('/contact', [ContactController::class, 'showForm']);
$router->post('/contact', [ContactController::class, 'submit']);
$router->get('/service', [ServiceController::class, 'showForm']);
$router->post('/service', [ServiceController::class, 'submit']);
$router->get('/invoice', [InvoiceController::class, 'showInvoice']);
$router->post('/invoice', [InvoiceController::class, 'payInvoice']);