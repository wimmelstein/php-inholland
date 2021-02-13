<?php

use app\controller\UserController;
use app\core\Application;

include_once(Application::$ROOT_DIR . '/model/user.php');
include_once(Application::$ROOT_DIR . '/components/Jumbotron.php');
include_once(Application::$ROOT_DIR . '/components/Table.php');
include_once(Application::$ROOT_DIR . '/components/Button.php');
include_once(Application::$ROOT_DIR . '/components/Form.php');
include_once(Application::$ROOT_DIR . '/controller/UserController.php');

echo new Jumbotron($title, $subTitle);

$controller = new UserController();
$users = $controller->getAllUsers();

//TODO: pass $row['id'] to the fragment. Is 1 for the time being, and that works. $row not available in the button class
$fragment = <<<EOF
1
EOF;

$table = new Table(['Id', 'First Name', 'Last Name', 'Age'],
    $users,
    new Form([],
        new Button("Delete", "onClick='deleteUser(" . $fragment . ")'", "btn btn-secondary")
    )
);
$table->renderTable();

$button = new Button("Add...", 'onClick="addUser()"', "btn btn-primary");
$button->render();

?>





