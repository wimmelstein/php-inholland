<?php

namespace app\core;
require_once('Router.php');
require_once('Request.php');

class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}