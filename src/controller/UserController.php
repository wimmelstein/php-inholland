<?php

namespace app\controller;

use app\core\Application;
use app\service\UserService;

class UserController
{

    function __construct()
    {
        require_once(Application::$ROOT_DIR . "/service/UserService.php");
        $this->userService = new UserService();
    }

    public function post($path, $callback)
    {

//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $first_name = $_POST['first_name'];
//            $last_name = $_POST['last_name'];
//            $age = $_POST['age'];
//
//            $this->userService->persistUser($first_name, $last_name, $age);
//            header('Location: ' . "..");
//        }
    }

    public function render()
    {

        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $user = Application::$app->userController->userService->getUser($id);
            return json_encode($user);
        }
        $params = [
            "title" => "Users",
            "subTitle" => "MVC model for user"
        ];
        return Application::$app->router->renderView('users', $params);
    }

    public function getAllUsers()
    {
        return $this->userService->getUsers();
    }
}


