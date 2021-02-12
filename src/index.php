<?php

require_once('core/Application.php');

use app\core\Application;

$app = new Application();

$app->router->get('/', function () {
    return 'Hello World!';
});

$app->router->get('/users', function () {
    return 'Users';
});


$app->run();