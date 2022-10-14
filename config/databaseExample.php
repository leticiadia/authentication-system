<?php

function connection()
{
    $databaseHost = ''; // Your localhot
    $databaseUser = ''; // Your database user
    $databasePassword = ''; // Your database password
    $database = ''; // Your database name

    try {
        $connection = new PDO(sprintf('mysql:host=%s;dbname=%s', $databaseHost, $database), $databaseUser, $databasePassword);
        return $connection;
    } catch (Throwable $error) {
        echo 'Connection failed: ' . $error->getMessage();
    }
}
