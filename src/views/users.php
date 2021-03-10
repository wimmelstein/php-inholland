<?php

use app\components\Button;
use app\components\Form;
use app\components\Jumbotron;
use app\components\Table;
use app\core\Application;

require_once dirname(__FILE__) . '/../bootstrap.php';

Application::injectScript("/js/users.js");
echo new Jumbotron($title, $subTitle);
$controller = Application::$app->userController;
$users = $controller->getAllUsers();

$table = new Table(['Id', 'First Name', 'Last Name', 'Age'],
    $users,
    new Form([],
        new Button("Delete", "onClick='deleteUser(this.id)'", "btn btn-secondary")
    )
);
$table->renderTable();

$button = new Button("Add...", "", "btn btn-primary");
$button->render("add");







