<?php

use Project\Authentication\Controllers\UserController;

require_once 'autoload.php';

$user = new UserController();

$user->store('admin20', '123456');
