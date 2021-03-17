<?php

include_once dirname(__FILE__) . '/vendor/autoload.php';

class Bootstrap
{

    private static function getConfig()
    {

        return [
            'db' => [
                'hostname' => $_ENV['PHP_DB_HOST'],
                'port' => $_ENV['PHP_DB_PORT'],
                'username' => $_ENV['MYSQL_USER'],
                'password' => $_ENV['MYSQL_ROOT_PASSWORD'],
                'name' => $_ENV['MYSQL_DATABASE']
            ],
            'general' => [
                'applicationName' => 'Inholland API'
            ]
        ];
    }

    public static function getPDO(): PDO
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        ];

        $db = self::getConfig()['db'];
        $hostname = $db['hostname'];
        $port = $db['port'];
        $user = $db['username'];
        $password = $db['password'];
        $db = $db['name'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
        try {
            $_pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $_pdo;
    }

    public static function getGeneralConfig()
    {
        return self::getConfig()['general'];
    }
}