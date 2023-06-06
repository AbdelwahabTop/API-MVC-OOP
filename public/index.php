<?php

use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

$router->register(
    '/',
    function() {
        echo 'Home';
    }
);

$router->register(
    '/invoices',
    function() {
        echo 'invoices';
    }
);