<?php

//$uri = explode('/', $_SERVER['REQUEST_URI']);
//array_shift($uri);
//
////var_dump($uri);
//
//$success = true;
//
//define('VIEWS_DIR', __DIR__ . '/../resources/views');
//
//switch ($uri[0]) {
//    case '':
//        $view = '/home.php';
//        break;
//    default:
//        require_once VIEWS_DIR . '/404.php';
//        $success = false;
//        break;
//}
//
//if ($success) {
//    require_once VIEWS_DIR . '/layouts/app.php';
//}

use NewsBird\Request\Request;
use NewsBird\Router\Router;

$router = new Router(new Request());

//echo asset('images/main.png');

$router->get('/', function () {
//    return <<<HTML
//    <h1>Hello world</h1>
//    HTML;
    return view(__DIR__ . '/../resources/views/home.php');

});


$router->get('/404', function () {
    return view(__DIR__ . '/../resources/views/404.php', ['name' => 'Jrady']);
//    $response = view(__DIR__ . '/../resources/views/404.php');
//    $expected = '<h1>404 NOT FOUND</h1>';
//    assert($response === $expected, 'Load a template using view');
});

$router->get('/profile', function ($request) {
    return <<<HTML
    <h1>Profile</h1>
    HTML;
});

$router->post('/data', function ($request) {
    return json_encode($request->getBody());
});