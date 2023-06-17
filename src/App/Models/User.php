<?php

declare(strict_types=1);

namespace App\Models;

class User extends Model
{
    public function __construct()
    {
    }

    public function create(string $email, string $name, bool $isActive = true): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO users (email, full_name, is_active, created_at) 
            VALUES (?, ?, ?, NOW())'
        );

        $stmt->execute([$email, $name, $isActive]);

        return (int) $this->db->lastInsertId();
    }
}
