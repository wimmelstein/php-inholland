<?php

namespace app\core;
use app\controller\UserController;
use PDO;

require_once dirname(__FILE__) . '/../bootstrap.php';

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;
    public UserController $userController;
    public \PDO $pdo;

    public function __construct($rootPath, $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->userController = new UserController();
        $this->pdo = $this->getPDO($config);
    }

    public static function injectScript($scriptName)
    {
        echo "<script src=\"$scriptName\"></script>";
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    private function getPDO($config): \PDO
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $hostname = $config['db']['hostname'];
        $port = $config['db']['port'];
        $user = $config['db']['username'];
        $password = $config['db']['password'];
        $db = $config['db']['name'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
        try {
            $_pdo = new PDO($dsn, $user, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $_pdo;
    }
}
