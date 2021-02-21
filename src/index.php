<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/classes.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/css/bootstrap.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/user.js"></script>

    <title>Users REST API</title>
</head>

<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">User API</h1>
      <p>Demonstration of REST API for users</p>
    </div>
  </div>

  <form method="post" id="new-user" class="inline">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="First name" name="first_name" required autofocus>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="age" name="age">
      </div>
      <button type="submit" class="btn btn-secondary" onclick="addUser()">Add</button>
    </div>
  </form>



  <table id="example" class="table table-hover" style="width:100%">

    <thead>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Age</th>
        <th>
      </tr>
    </thead>

    <tbody>
      <?php
      $users = json_decode(file_get_contents('http://localhost/users'));
      foreach ($users as $u) {
        echo '<tr>';
        $user = cast($u, 'User');

        ?>
        <td><?php echo $user->getId() ?></td>
        <td><?php echo $user->getFirstName() ?></td>
        <td><?php echo $user->getLastName() ?></td>
        <td><?php echo $user->getAge() ?></td>
        <td align="right">
          <form>
            <button type="submit" onclick="deleteUser(<?php echo $user->getId() ?>)" class="btn btn-secondary">Delete</button>
          </form>
        </td>
      <?php
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>

</body>
</html>
