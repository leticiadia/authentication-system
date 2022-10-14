<?php

include './config/database.php';

$connection = connection();

if ($connection) echo 'Connected Successfully';

return $connection;
