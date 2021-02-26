<?php


class DatabaseConnection {

    public function getPDOConnection($config): PDO {
        $hostname = $config['db']['hostname'];
        $port = $config['db']['port'];
        $user = $config['db']['username'];
        $password = $config['db']['password'];
        $db = $config['db']['name'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
        $options = $config['db']['options'];
        try {
            $pdo = new PDO($dsn, $user, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $pdo;
    }
}
