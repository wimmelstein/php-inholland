<?php

include_once('Database/DatabaseConnection.php');

if (isset($_GET['id'])) {

    $ticketId = $_GET['id'];
    $pdo = DatabaseConnection::getInstance();
    $stmt = $pdo->prepare("update tickets set checkin = 1 where id=:id");
    $stmt->execute(['id' => $ticketId]);

    unlink("output/$ticketId.pdf");

    header('Location: /thank_you.php');

}
