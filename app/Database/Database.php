<?php

namespace NewsBird\Database;

use PDO;

class Database
{
    private $config;

    function __construct()
    {
        $this->config = include __DIR__ . '/../../config/database.php';
    }

    public function connect()
    {
        $database = new PDO("{$this->config['connection']}:host={$this->config['host']};dbname={$this->config['database']}", $this->config['username'], $this->config['password'], array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4'
        ));
        return $database;
    }
}