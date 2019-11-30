<?php require_once('classes.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Cache-control" content="no-cache" />

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    function deleteUser(id) {
      $.ajax({
        type: "DELETE",
        url: "http://localhost/users/" + id,
        success: function(msg) {
          alert("Data Deleted: " + msg);
        }
      });

    }
  </script>

  <title>Document</title>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">User API</h1>
      <p>Demonstration of REST API for users</p>
    </div>
  </div>

  <table id="example" class="table table-hover" style="width:100%">

    <thead>
      <tr>
        <th>ID</th>
        <th>Naam</th>
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
        <td><?php echo $user->getUserName() ?></td>
        <td><?php echo $user->getAge() ?></td>
        <td>
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