<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new App\Router();

$router
    ->get('/', [App\Controllers\HomeControllers::class, 'index'])
    ->post('/upload', [App\Controllers\HomeControllers::class, 'upload'])
    ->get('/invoices', [App\Controllers\InvoiceControllers::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoiceControllers::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoiceControllers::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
