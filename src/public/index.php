<?php

include_once dirname(__FILE__) . '/../bootstrap.php';

$pdo = Bootstrap::getPDO();

// Function to get a random 1, 2 or 3. This corresponds to event ID
function OneTwoOrThree(): int
{
    return rand(1, 3);
}

$stmt = $pdo->query("select * from users");
$users = $stmt->fetchAll();

/*
 * Fill the tickets
 */
foreach ($users as $user) {
    if (empty($_GET)) {
        $eventId = OneTwoOrThree();
        $stmt = $pdo->prepare("select user_id from tickets where user_id=:user_id and event_id = :event_id");
        $stmt->execute(['user_id' => $user['id'], 'event_id' => $eventId]);
        if ($stmt->rowCount() == 0) {
            $stmt = $pdo->prepare("select * from events where id = :id");
            $stmt->execute(['id' => $eventId]);
            $event = $stmt->fetch();
            $stringToHash = implode('-', [$user['first_name'] . $user['last_name'] . implode('-', $event)]);
            $hash = hash('md5', $stringToHash);
            $stmt = $pdo->prepare("insert into tickets (id, user_id, event_id, checkin) values (:id, :user_id, :event_id, :checkin)");
            $stmt->execute(['id' => $hash, 'user_id' => $user['id'], 'event_id' => $eventId, 'checkin' => 0]);
        }
    }
}

$stmt = $pdo->query(
    "select t.id, t.user_id, e.type, e.date, u.first_name, u.last_name, u.age, t.checkin from  users u, tickets t, events e " .
    "where u.id = t.user_id and t.event_id = e.id");
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
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home</a>
    </nav>
    <div class="jumbotron  jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">PDF Generation</h1>
            <hr>
            <p><?php echo Bootstrap::getGeneralConfig()['applicationName']; ?></p>
        </div>
    </div>
</header>

<table class="table table-hover">
    <caption>Tickets</caption>
    <thead>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Age</th>
    <th scope="col">Event</th>
    <th scope="col">Date</th>
    <th scope="col">Checked in</th>
    <th scope="col">Action</th>
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
            <td><?php echo $ticket['type'] ?></td>
            <td><?php echo $ticket['date'] ?></td>
            <td><?php echo $ticket['checkin'] == 0 ? 'No' : 'Yes' ?></td>
            <td>
                <?php echo $ticket['checkin'] == 0
                    ? (!file_exists("output/$ticketId.pdf"))
                        //TODO: Misschien moet dit een POST zijn. Nice to have: icon ipv link
                        ? sprintf('<a href="generate_pdf.php?id=%s">Generate PDF</a>', $ticketId)
                        : sprintf('<a href="output/%s.pdf" target="_blank">ticket</a>', $ticketId)
                    : '';
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>
