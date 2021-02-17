<?php

use app\core\Application;

include_once(Application::$ROOT_DIR . '/model/user.php');
include_once(Application::$ROOT_DIR . '/components/Jumbotron.php');
include_once(Application::$ROOT_DIR . '/components/Table.php');
include_once(Application::$ROOT_DIR . '/components/Button.php');
include_once(Application::$ROOT_DIR . '/components/Form.php');
include_once(Application::$ROOT_DIR . '/components/Link.php');
include_once(Application::$ROOT_DIR . '/controller/UserController.php');

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







