<?php

namespace app\core;
require_once('Router.php');
require_once('Request.php');

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Router $router;

    public function __construct($path)
    {
        self::$ROOT_DIR = $path;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}