<?php

use NewsBird\Request\Request;
use NewsBird\Router\Router;

$router = new Router(new Request());

$router->get('/', function () {
    return view('home');
});

$router->get('/login', function () {
    if (loginChk()) {
        alert('비회원만 접근 가능합니다.');
        back();
    } else {
        return view('auth/login');
    }
});

$router->post('/login', function ($request) {
    $request = $request->getBody();
    $username = $request['username'];
    $password = $request['password'];

    $db = new NewsBird\Database\Database();
    $db = $db->connect();
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();
    $stmt = null;

    // 암호화
    $password = base64_encode(hash('sha256', $password, true));

    if ($password === $user->password) {
        alert('로그인을 성공하셨습니다.');
        $_SESSION['id'] = $user->id;
        move('/');
//        return json_encode($user, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    } else {
        alert('로그인을 실패하였습니다.');
//        return json_encode(array('message' => '실패'), JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    }
    back();
});

$router->get('/logout', function () {
    session_destroy();
    alert('로그아웃 하였습니다.');
    move('/');
});

$router->get('/register', function () {
    if (loginChk()) {
        alert('비회원만 접근 가능합니다.');
    } else {
        return view('auth/register');
    }
    back();
});

$router->post('/register', function ($request) {

    $request = $request->getBody();
    $username = $request['username'];
    $nickname = $request['nickname'];
    $password = $request['password'];
    $confirmPassword = $request['confirmPassword'];

    if ($username === '' || $nickname === '' || $password === '' || $confirmPassword === '') {
        alert('폼을 정확히 채워주세요.');
    } else {
        // 유효성 검사
        $error = '';
        if (!mb_ereg('^[a-zA-Z0-9]{4,10}$', $username)) {
            $error .= '회원이름은 영문 또는 숫자 그리고 4글자 이상 10글자 이하만 입력가능합니다.\n';
        }

        if (!mb_ereg('^[가-힣a-zA-Z]{2,10}$', $nickname)) {
            $error .= '닉네임은 한글 또는 영문 그리고 2글자 이상 10글자 이하만 입력가능합니다..\n';
        }

        if (!mb_ereg('^[a-zA-Z0-9]{8,}$', $password) || mb_ereg('^[a-zA-Z]+$', $password) || mb_ereg('^[0-9]+$', $password)) {
            $error .= '비밀번호는은 영문/숫자 조합 8글자 이상만 입력가능합니다.\n';
        }

        if ($error) {
            alert($error);
        } else {
            $db = getDB();
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $userChk = $stmt->rowCount();

            // 회원 중복 체크
            if ($userChk) {
                alert('이미 존재하는 회원이름입니다.');
            } else {

                if ($password !== $confirmPassword) {
                    alert('비밀번호가 일치하지 않습니다.');
                } else {
                    // SHA-256 암호화
                    $password = base64_encode(hash('sha256', $password, true));

                    $sql = "INSERT INTO users (username, nickname, password) VALUES(:username, :nickname, :password)";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':nickname', $nickname);
                    $stmt->bindParam(':password', $password);

                    if ($stmt->execute()) {
                        alert('회원가입을 성공하였습니다.');
                        move('/login');
                    } else {
                        alert('회원가입을 실패하였습니다.');
                    }
                }
            }
        }
//        return json_encode($request, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE);
    }
    back();
});