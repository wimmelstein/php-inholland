<?php


class Config {

    private static $config = [
        'db' => [
            'hostname' => 'db',
            'port' => 3306,
            'username' => 'root',
            'password' => 'mysql',
            'name' => 'inholland',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => true,
            ]
        ],
        'general' => [
            'applicationName' => 'Inholland PHP Application Starter'
        ]
    ];

    public function __construct() {
    }

    /**
     * @return array
     */
    public static function getDBConfig(): array {
        return self::$config['db'];
    }

    public static function getApplicationConfig(): array {
        return self::$config['general'];
    }
}
