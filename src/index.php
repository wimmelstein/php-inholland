<?php

require_once('core/Application.php');

use app\controller\UserController;
use app\core\Application;

$config = [
    'db' => [
        'hostname' => 'db',
        'port' => 3306,
        'username' => 'root',
        'password' => 'mysql',
        'name' => 'inholland'
    ]
];

$app = new Application(__DIR__, $config);


$app->router->get('/', 'home');

$app->router->get('/files', 'files');

//Todo get one user
$app->router->get("/users/\d+?", UserController::class, 'getUser');
$app->router->get('/users/add', 'newUser');
$app->router->get('/users', [UserController::class, 'render']);
$app->router->post('/users', [UserController::class, 'addUser']);
//TODO: Implement DELETE method
$app->router->get('/test', 'test');


$app->run();
