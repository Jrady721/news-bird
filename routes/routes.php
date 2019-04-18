<?php

use NewsBird\Request\Request;
use NewsBird\Router\Router;

$router = new Router(new Request());

$router->get('/', function () {
    return view('home');
});

$router->get('/login', function () {
    return view('auth/login');
});
$router->post('/login', function ($request) {
    $request = $request->getBody();
    $username = $request['username'];
    $password = $request['password'];

    $db = new NewsBird\Database\Database();
    $db = $db->getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();
    $stmt = null;

    if ($password === $user->password) {
        alert('로그인을 성공하셨습니다.');
        $_SESSION['id'] = $user->id;
        move('/');
//        return json_encode($user, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    } else {
        alert('로그인을 실패하였습니다.');
        back();
//        return json_encode(array('message' => '실패'), JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    }
});

$router->get('/logout', function () {
    session_destroy();
    alert('로그아웃 하였습니다.');
    move('/');
});

$router->get('/register', function () {
    alert('회원가입을 성공하였습니다.');
    move('/login');
//    return view('auth/register');
});

$router->post('/register', function ($request) {
    return json_encode($request->getBody());
});