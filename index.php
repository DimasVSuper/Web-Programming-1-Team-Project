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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RISSCELL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>

  </body>
</html>
