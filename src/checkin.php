<?php

if (isset($_GET['id'])) {

    $pdo = DatabaseConnection::getInstance();
    $stmt = $pdo->prepare("update tickets set checkin = 1 where id=:id");
    $stmt->execute([id => $_GET['id']]);

    header('Location: /_index.php');

}
