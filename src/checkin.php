<?php

include_once('Database/DatabaseConnection.php');

if (isset($_GET['id'])) {
    $ticketId = $_GET['id'];
    $pdo = DatabaseConnection::getInstance();
    $stmt = $pdo->prepare("select * from tickets where id = :id");
    $stmt->execute(['id' => $ticketId]);
    $checkedIn = $stmt->fetch()['checkin'];

    if ($checkedIn != 1) {
        $stmt = $pdo->prepare("update tickets set checkin = 1 where id=:id");
        $stmt->execute(['id' => $ticketId]);
        unlink("output/$ticketId.pdf");
        header('Location: /thank_you.php');
    } else {
        header("Location: /checkin_error.php", true, 400);
        include_once 'checkin_error.php';
    }
}
