<?php

require_once('core/Application.php');

use app\controller\UserController;
use app\core\Application;

$app = new Application(__DIR__);

$app->router->get('/', 'home');

$app->router->get('/files', 'files');

$app->router->get('/users/add', 'newUser');

$app->router->get('/users', [UserController::class, 'render']);
$app->router->post('/users', [UserController::class, 'addUser']);

$app->router->get('/test', 'test');


$app->run();
