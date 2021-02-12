<?php

require_once(__DIR__ . '/../util/db.php');

class UserService
{
        
    function __construct() {
        
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

    function deleteUser($id)
    {
    
        $stmt = $this->conn->prepare("DELETE FROM users where id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

}
