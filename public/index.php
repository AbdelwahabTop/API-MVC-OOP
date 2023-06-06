<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new App\Router();

$router
    ->register('/', [App\Classes\Home::class, 'index'])
    ->register('/invoices', [App\Classes\Invoice::class, 'index'])
    ->register('/invoices/create', [App\Classes\Invoice::class, 'create']);

echo $router->resolve($_SERVER['REQUEST_URI']);
