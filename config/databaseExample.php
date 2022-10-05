<?php

function connection()
{
    $databaseHost = ''; // Your localhot
    $databaseUser = ''; // Your database user
    $databasePassword = ''; // Your database password
    $database = ''; // Your database name

    try {
        $connection = new mysqli($databaseHost, $databaseUser, $databasePassword, $database);

        return $connection;
    } catch (Throwable $error) {
        echo 'Connection failed: ' . $error->getMessage();
    }
}
