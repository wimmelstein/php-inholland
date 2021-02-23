<?php

namespace app\service;

use app\core\Application;

class UserService
{

    private static string $select_all_users = 'select * from users';
    private static string $insert_user = 'INSERT INTO users  (first_name, last_name, age) VALUES (:first_name, :last_name, :age)';
    private static string $select_one_user = 'SELECT * FROM users where id=?';

    function getUsers()
    {
        $result = Application::$app->pdo->query(self::$select_all_users);
        return $result;
    }

    function persistUser($first_name, $last_name, $age)
    {
        $stmt = Application::$app->pdo->prepare(self::$insert_user);
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'age' => $age]);
    }

    function getUser($id)
    {
        $stmt = Application::$app->pdo->prepare(self::$select_one_user);
        $stmt->bind_param('i', $id);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return $user ?? [];
    }

}
