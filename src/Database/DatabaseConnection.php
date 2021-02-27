<?php

include_once 'Config.php';

class DatabaseConnection {

    private function __construct() {
    }

    private static $instance;

    public static function getInstance(): PDO {
        if (empty(self::$instance)) {
            $config = Config::getDBConfig();
            $hostname = $config['hostname'];
            $port = $config['port'];
            $user = $config['username'];
            $password = $config['password'];
            $db = $config['name'];
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
            $options = $config['options'];
            try {
                $pdo = new PDO($dsn, $user, $password, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
            return $pdo;

        }
    }


}
