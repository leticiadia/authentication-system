<?php

namespace Project\Authentication\Controllers\Auth;

use Project\Authentication\Services\UserService;

require_once 'autoload.php';

class LoginController
{

    public function login($username, $password)
    {
        $user = new UserService('authentication_system', '127.0.0.1', 'root', 'root');

        $username = $_POST['username'];
        $username = $_POST['password'];

        if ($user->getUsers($username, $password)) {
            $_SESSION['login'] = true;
            header('Location: profile.php');
        } else {
            header('Location: home.php?message=' . urldecode('incorrect username or password'));
            exit();
        }
    }
}
