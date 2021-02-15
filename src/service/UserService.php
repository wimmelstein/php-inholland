<?php

namespace app\service;

use app\core\Application;
use DB;

require_once(Application::$ROOT_DIR . '/util/db.php');

class UserService
{

    function __construct()
    {

        $db = new DB();
        $this->conn = $db->OpenCon();
    }

    function getUsers()
    {
        $result = $this->conn->query("select * from users");
        return $result;
    }

    function persistUser($first_name, $last_name, $age)
    {
        $stmt = $this->conn->prepare("INSERT INTO users  (first_name, last_name, age) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $first_name, $last_name, $age);
        $stmt->execute();
    }

//    function deleteUser($id)
//    {
//        $stmt = $this->conn->prepare("DELETE FROM users where id=?");
//        $stmt->bind_param('i', $id);
//        $stmt->execute();
//    }

    function getUser($id)
    {

        $stmt = $this->conn->prepare("SELECT * FROM users where id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user ?? [];
    }

}
