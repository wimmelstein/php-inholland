<?php
include_once 'Config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ERROR</title>
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
            <h1 class="display-4">Error</h1>
            <hr>
            <p><?php echo Config::getApplicationConfig()['applicationName']; ?></p>
        </div>
    </div>
</header>
<h1>Ticket was already checked in</h1>
</body>
</html>
