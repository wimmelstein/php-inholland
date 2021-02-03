<?php

require_once('../service/UserService.php');

class UserController {

    function __construct() {
        userService = new UserService();
    }

function process() {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $this->userService->persistUser($first_name, $last_name, $age);
    header('Location: ' . "..");
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $url = $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $id = $query['id']; 
    echo "Id is: " . $id;
    userService->deleteUser($id);
    header('Location: ' . "..");
} else {
    return $userService->getUsers();
}
}
}


