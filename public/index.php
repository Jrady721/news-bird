<?php

require_once __DIR__ . '/../vendor/autoload.php';

$router = new NewsBird\Router\Router(new NewsBird\Request\Request());

echo asset('images/main.png');

$router->get('/', function () {
    return <<<HTML
    <h1>Hello world</h1>
    HTML;
});

$router->get('/profile', function ($request) {
    return <<<HTML
    <h1>Profile</h1>
    HTML;
});

$router->post('/data', function ($request) {
    return json_encode($request->getBody());
});