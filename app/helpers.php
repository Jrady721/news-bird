<?php



use Dotenv\Dotenv;
use NewsBird\Database\Database;

$dotenv = Dotenv::create(__DIR__. '/..');
$dotenv->load();

$db = new Database();
$db = $db->getDB();
//$users = $db->query("select * from users")->fetchAll();
//var_dump($users);

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
        if (is_file($template)) {
            ob_start();
            extract($data);
            include_once $template;
            return ob_get_clean();
        }

        return new Exception("Template not found");
    }
}