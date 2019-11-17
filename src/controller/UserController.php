<?php

//include __DIR__ . '/../service/UserService.php';
include $_SERVER['DOCUMENT_ROOT'] . '/service/UserService.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    persistUser($first_name, $last_name, $age);

    header('Location: ' . "..");


} else {
    return getAllUsers();
}

function getAllUsers() {
    return getUsers();
}
