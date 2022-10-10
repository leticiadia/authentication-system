<?php

namespace Project\Authentication\Services;

use Exception;
use PDO;
use Throwable;
use Project\Authentication\Models\User;

require_once 'autoload.php';

class UserService extends User
{

    private  $databaseHost;

    public function __construct($database, $host, $username, $password)
    {
        try {
            $this->databaseHost = new PDO(sprintf('mysql:host=%s;dbname=%s', $host, $database), $username, $password);
        } catch (Throwable $error) {
            $error->getMessage();
        }
    }

    public function store($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $statement = $this->databaseHost->prepare('INSERT INTO ' . $this->table . '(username, password) VALUES (:username, :password)');

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
        $statement = $this->databaseHost->prepare('SELECT * FROM ' . $this->table . 'WHERE username = :username');
        if (!$statement) throw new Exception('Invalid statement');

        $result = $statement->execute([':username' => $username, ':password' => $password]);
        if (!$result) throw new Exception(implode(' ', $statement->errorInfo()));

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (is_array($row)) return false;
    }
}
