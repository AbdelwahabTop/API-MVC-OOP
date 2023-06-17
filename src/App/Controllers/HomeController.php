<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;
use App\Models\SignUp;
use App\Models\Invoice;

class HomeController
{
    public function index(): View
    {
        $email = 'baki@gmail.com';
        $name = 'baki';
        $amount = 1;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name,
            ],
            [
                'amount' => $amount
            ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '</pre>';
    }
}
