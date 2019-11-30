<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $request);

/*
   Getting user data
*/

if ($method === 'GET') {
    if (count($params) === 2) {
        $result = getAllUsers();
        echo json_encode($result);
    }

    if (count($params) === 3) {
        $id = $params[2];
        $user= getUser($id);
        $json = json_encode(($user != null) ? $user->toArray() : new stdClass);
        echo $json;
    } else {
        http_response_code(404);
    }
}

/*
   Creating new Users 
*/
if ($method === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $u = new User(null, $first_name, $last_name, $age);
    saveUser($u);
    }

 if ($method === 'DELETE')    {
     $id = $params[2];
     deleteUser($id);
 }
?>
