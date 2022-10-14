<?php

namespace Project\Authentication\Controllers;

use Exception;
use PDO;
use Throwable;
use Project\Authentication\Models\User;

require_once __DIR__ . '/../../autoload.php';

include __DIR__ . '/../../config/database.php';

class UserController extends User
{

    private  $databaseHost;

    public function __construct()
    {
        $this->databaseHost = connection();
    }

    public function store($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $statement = $this->databaseHost->prepare('INSERT INTO ' . $this->table . ' (username, password) VALUES (:username, :password)');

        $statement->execute([':username' => $username, ':password' => $password]);

        try {
            if (!$statement) {
                throw new Exception('Invalid statement');
            }
        } catch (Throwable $error) {
            $error->getMessage();
        }
    }

    public function getUsers($username, $password)
    {
        $statement = $this->databaseHost->prepare('SELECT * FROM ' . $this->table . ' WHERE username = :username');
        if (!$statement) throw new Exception('Invalid statement');

        $result = $statement->execute([':username' => $username]);
        if (!$result) throw new Exception(implode(' ', $statement->errorInfo()));

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!is_array($row)) return false;

        return password_verify($password, $row['password']);
    }
}
