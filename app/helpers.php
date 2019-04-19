<?php

use Dotenv\Dotenv;
use NewsBird\Database\Database;

// get asset
if (!function_exists('asset')) {
    /**
     * @param $src
     * @return string
     */
    function asset($src)
    {
        return '/public/' . $src;
    }
}

// view
if (!function_exists('view')) {
    /**
     * @param $template
     * @param array $data
     * @return Exception|false|string
     */
    function view($template, $data = [])
    {
        $layout = __DIR__ . '/../resources/views/layouts/app.php';

        if (is_file($layout)) {
            ob_start();
            extract($data);
            include_once $layout;
            return ob_get_clean();
        }

        return new Exception("Template not found");
    }
}

// alert
if (!function_exists('alert')) {
    /**
     * @param $msg
     */
    function alert($msg)
    {
        echo "<script>alert('$msg')</script>";
    }
}

// move
if (!function_exists('move')) {
    /**
     * @param $url
     */
    function move($url)
    {
        echo "<script>location.replace('$url')</script>";
    }
}

// back
if (!function_exists('back')) {
    function back()
    {
        echo "<script>history.back()</script>";
    }
}


// loginChk
if (!function_exists('loginChk')) {
    function loginChk()
    {
        return isset($_SESSION['id']);
    }
}

if (!function_exists('getDB')) {
    function getDB()
    {
        $db = new Database();
        return $db->connect();
    }
}

if (!function_exists('loadEnv')) {
    function loadEnv()
    {
        $dotenv = Dotenv::create(__DIR__ . '/..');
        $dotenv->load();
    }
}

loadEnv();

/* session start */
session_start();