<?php

namespace app\core;
use app\controller\UserController;

require_once('Router.php');
require_once('Request.php');
require_once('Response.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/UserController.php');

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;
    public UserController $userController;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->userController = new UserController();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
