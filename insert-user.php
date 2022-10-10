<?php

use Project\Authentication\Services\UserService;

require_once 'autoload.php';

$user = new UserService('authentication_system', '127.0.0.1', 'root', 'root');

$user->store('admin', '123456');
