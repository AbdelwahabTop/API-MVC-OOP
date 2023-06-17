<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;
use App\Models\User;
use App\Models\Invoice;

class HomeController
{
    public function index(): View
    {
        $db = App::db();

        $email = 'kiloa@gmail.com';
        $name = 'kiloa';
        $amount = 1;

        // $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2021 9:00PM'));
        try {
            $db->beginTransaction();

            $userModel = new User();
            $invoiceModel = new Invoice();

            $userId = $userModel->create($email, $name);
            $invoiceId = $invoiceModel->create($amount, $userId);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }

            throw $e;
        }

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
