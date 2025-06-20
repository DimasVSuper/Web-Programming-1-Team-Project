<?php
session_start();

require_once __DIR__ . '/controller/homeController.php';
require_once __DIR__ . '/controller/contactController.php';
require_once __DIR__ . '/controller/serviceController.php';
require_once __DIR__ . '/controller/invoiceController.php';

require_once __DIR__ . '/core/Router.php';

$router = new Router();

// Konsumsi route dari web.php
require_once __DIR__ . '/core/web.php';

// Jalankan router
$router->dispatch();
?>