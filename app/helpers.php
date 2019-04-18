<?php



use Dotenv\Dotenv;
use NewsBird\Database\Database;

$dotenv = Dotenv::create(__DIR__. '/..');
$dotenv->load();

/* getDB */
$db = new Database();
$db = $db->getDB();

/* session start */
session_start();

// get asset
if (!function_exists('asset')) {
    /**
     * @param $src
     * @return string
     */
    function asset($src)
    {
//        echo $_SERVER['DOCUMENT_ROOT'] . '/public/' . $src;
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