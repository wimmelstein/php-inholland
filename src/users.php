<?php

require_once('classes.php');

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $request);

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
?>
