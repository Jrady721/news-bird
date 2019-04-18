<?php

namespace NewsBird\Database;

use PDO;

class Database
{
    private $config;

    function __construct()
    {
        $this->config = include __DIR__ .'/../../config/database.php';
    }

    public function getDB()
    {
//        return $this->config;
        $database = new PDO("{$this->config['connection']}:host={$this->config['host']};dbname={$this->config['database']}", $this->config['username'], $this->config['password']);
        return $database;
    }
}