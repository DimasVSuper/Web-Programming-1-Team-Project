<?php
$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);
$router->get('/contact', [ContactController::class, 'showForm']);
$router->post('/contact', [ContactController::class, 'submit']);
$router->get('/service', [ServiceController::class, 'showForm']);
$router->post('/service', [ServiceController::class, 'submit']);
$router->get('/invoice', [InvoiceController::class, 'showInvoice']);
$router->post('/invoice/pay', [InvoiceController::class, 'payInvoice']);