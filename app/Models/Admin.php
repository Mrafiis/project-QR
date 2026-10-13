<?php
namespace App\Models;

use App\Core\Database;

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findById(int $id)
    {
        return $this->db->fetch("SELECT * FROM admins WHERE id = ?", [$id]);
    }

    public function findByEmail(string $email)
    {
        return $this->db->fetch("SELECT * FROM admins WHERE email = ?", [$email]);
    }

    public function hasRegisteredAccount(): bool
    {
        $result = $this->db->fetch("SELECT COUNT(*) AS total FROM admins WHERE email IS NOT NULL AND email <> ''");
        return (int) ($result['total'] ?? 0) > 0;
    }

    public function registerFirst(string $email, string $password, string $name)
    {
        if ($this->hasRegisteredAccount()) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $legacyAdmin = $this->db->fetch("SELECT id FROM admins WHERE email IS NULL OR email = '' ORDER BY id ASC LIMIT 1");
        if ($legacyAdmin) {
            $this->db->query(
                "UPDATE admins SET email = ?, password = ?, name = ?, username = ? WHERE id = ?",
                [$email, $hash, $name, $email, $legacyAdmin['id']]
            );
            return (int) $legacyAdmin['id'];
        }

        $this->db->query(
            "INSERT INTO admins (username, email, password, name, created_at) VALUES (?, ?, ?, ?, NOW())",
            [$email, $email, $hash, $name]
        );
        return (int) $this->db->lastInsertId();
    }

    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
