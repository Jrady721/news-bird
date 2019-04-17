<?php

$uri = explode('/', $_SERVER['REQUEST_URI']);
array_shift($uri);

//var_dump($uri);

$success = true;

define('VIEWS_DIR', __DIR__ . '/../resources/views');

switch ($uri[0]) {
    case '':
        $view = '/home.php';
        break;
    default:
        require_once VIEWS_DIR . '/404.php';
        $success = false;
        break;
}

if ($success) {
    require_once VIEWS_DIR . '/layouts/app.php';
}