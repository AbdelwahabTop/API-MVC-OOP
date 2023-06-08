<?php

declare(strict_types=1);

namespace App\Classes;

class Invoice
{
    public function index()
    {
        return '';
    }

    public function create(): string
    {
        return '';
    }

    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}
