<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\View;
use PDO;

class HomeController
{
    public function index(): View
    {
        $db = App::db();

        $email = 'mshmsh@gmail.com';
        $name = 'mshmsh';
        $amount = 1;

        // $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2021 9:00PM'));
        try {
            $db->beginTransaction();

            $newUserStmt = $db->prepare(
                'INSERT INTO users (email, full_name, is_active, created_at) 
                VALUES (?, ?, 1, NOW())'
            );

            $newInvoiceStmt = $db->prepare(
                'INSERT INTO invoices (amount, user_id) 
                VALUES (?, ?)'
            );

            $newUserStmt->execute([$email, $name]);

            $userId = (int) $db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }

            throw $e;
        }

        $fetchStmt = $db->prepare(
            'SELECT invoices.id AS invoice_id, amount, user_id, full_name
             FROM invoices
             INNER JOIN users ON user_id = users.id
             WHERE email = ?'
        );

        $fetchStmt->execute([$email]);

        return View::make('index', ['foo' => 'bar']);
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
