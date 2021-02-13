<?php

require_once('core/Application.php');

use app\core\Application;

$app = new Application(__DIR__);

$app->router->get('/', 'home');

$app->router->get('/users', 'users');


$app->run();