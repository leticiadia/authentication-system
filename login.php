<?php

// namespace Project\Authentication\Controllers;

use Project\Authentication\Controllers\UserController;

require_once __DIR__ . '/autoload.php';

$user = new UserController('authentication_system', '127.0.0.1', 'root', 'root');

$username = $_POST['username'];
$password = $_POST['password'];

if (!$user->getUsers($username, $password)) {
    header('Location: /../../views/home.php?message=' . urldecode('incorrect username or password'));
    exit();
}

$_SESSION['login'] = true;
header('Location: /../../views/profile.php');
