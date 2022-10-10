<?php

spl_autoload_register(function (string $class) {
    $pathFile = str_replace('Project\\Authentication', 'app', $class);
    $pathFile = str_replace('\\', DIRECTORY_SEPARATOR, $pathFile);
    $pathFile .= '.php';

    if (file_exists($pathFile)) return require_once $pathFile;
});
