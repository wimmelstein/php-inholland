<?php

require_once(__DIR__ . '/../service/UserService.php');

class UserController
{

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function post(\http\Env\Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];

            $this->userService->persistUser($first_name, $last_name, $age);
            header('Location: ' . "..");
        }
    }

    public function getAllUsers()
    {
        return $this->userService->getUsers();
    }
}


