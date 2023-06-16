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
            $db = new PDO('mysql:host=localhost;dbname=my_db', 'root', '', [
                // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);

            $query = 'SELECT * FROM users';

            $stmt = $db->query($query);

            dump($stmt->fetchAll());
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

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
