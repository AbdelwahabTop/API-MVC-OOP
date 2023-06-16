<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=my_db', 'root', '');
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        $email = 'abdo@gmail.com';
        $name = 'abdo';
        $isActive = 1;
        $createdAt = date('Y-m-d H:m:i', strtotime('07/11/2021 9:00PM'));
        $query = 'INSERT INTO users (email, full_name, is_active, create_at)
                VALUES (?, ?, ?, ?)';

        $stmt = $db->prepare($query);

        $stmt->execute([$email, $name, $isActive, $createdAt]);

        $id = (int) $db->lastInsertId();

        $user = $db->query('SELECT * FROM users WHERE id = ' . $id);

        dump($stmt->fetchAll());

        var_dump($db);

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
