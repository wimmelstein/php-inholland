<?php

use app\controller\UserController;
use app\core\Application;

include_once(Application::$ROOT_DIR . '/model/user.php');
include_once(Application::$ROOT_DIR . '/components/Jumbotron.php');
include_once(Application::$ROOT_DIR . '/components/Table.php');
include_once(Application::$ROOT_DIR . '/controller/UserController.php');

echo new Jumbotron($title, $subTitle);

$controller = new UserController();
$users = $controller->getAllUsers();
$table = new Table(['Id', 'First Name', 'Last Name'], $users);
$table->renderTable();

?>


<form method="post" action="/users">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="First name" name="first_name" required autofocus>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="age" name="age">
        </div>
        <button type="submit" class="btn btn-secondary">Add</button>
    </div>
</form>


