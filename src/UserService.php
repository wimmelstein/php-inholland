<?php
require_once 'classes.php';

function getAllUsers() {
    
    $query = ("select * from users");
    $conn = OpenCon();
    $result = $conn->query($query);
    $users = array();
    while ($user=mysqli_fetch_object($result)) {
        array_push($users, $user);
    }

    CloseCon($conn);
    return $users;
}

function getUser($_id) {
    
    $query = "select * from users where id = ?";
    $conn = OpenCon();
    $user = null;
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $first_name, $last_name, $age);
            $stmt->fetch();
            
            $user = new User($id, $first_name, $last_name, intval($age));
            return $user;
        }
    }
    CloseCon($conn);
}

function saveUser($user) {
    
    $conn = OpenCon();
    $stmt = $conn->prepare("insert into users (first_name, last_name, age) values (?, ?, ?)");
    $stmt->bind_param('ssi', $user->getFirstName(), $user->getLastName(), $user->getAge());
    $stmt->execute();
    CloseCon($conn);
}

function deleteUser($id) {
    
    $conn = OpenCon();
    $stmt = $conn->prepare("DELETE FROM users where id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    CloseCon($conn);
}
