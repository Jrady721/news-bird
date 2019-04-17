<?php


$uri = explode('/', $_SERVER['REQUEST_URI']);
array_shift($uri);

//var_dump($uri);


$success = true;

switch ($uri[0]) {
    case '':
        $view = '/../index.php';
        break;
    default:
        require_once __DIR__ . '/views/404.php';
        $success = false;
        break;
}

if ($success) {
    require_once __DIR__ . '/views/layouts/app.php';
}