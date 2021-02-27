<?php

include_once('Database/DatabaseConnection.php');

$pdo = DatabaseConnection::getInstance();

$stmt = $pdo->query("select * from users");
$users = $stmt->fetchAll();


/*
 * Fill the tickets
 */
foreach ($users as $user) {
    $hash = hash('md5', $user['first_name']);
    $stmt = $pdo->prepare("select user_id from tickets where user_id=:userid");
    $stmt->execute(['userid' => $user['id']]);
    if ($stmt->rowCount() == 0) {
        $stmt = $pdo->prepare("insert into tickets (id, user_id, checkin) values (:id, :user_id, :checkin)");
        $stmt->execute(['id' => $hash, 'user_id' => $user['id'], 'checkin' => 0]);
    }
    $stmt = $pdo->query("select * from tickets");
    $tickets = $stmt->fetchAll();
}

$stmt = $pdo->query("select t.id, t.user_id, u.first_name, u.last_name, u.age, t.checkin from  users u, tickets t where u.id = t.user_id");
$tickets = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generation</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<header>
    <div class="jumbotron  jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">PDF Generation</h1>
        </div>
    </div>
</header>

<table class="table" table-hover>
    <thead>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Checked in</th>
    <th>Action</th>
    </thead>
    <tbody>
    <?php
    foreach ($tickets as $ticket) {
        $ticketId = $ticket['id'];
        ?>
        <tr id="<?php echo $ticket['id']; ?>">
            <td><?php echo $ticket['first_name'] ?></td>
            <td><?php echo $ticket['last_name'] ?></td>
            <td><?php echo $ticket['age'] ?></td>
            <td><?php echo $ticket['checkin'] == 0 ? 'No' : 'Yes' ?></td>
            <td>
                <?php echo sprintf('<a href="generate_pdf.php?id=%s">Generate PDF</a>', $ticketId); ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>
