<?php

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
}
