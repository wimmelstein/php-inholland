<?php

require('db.php');

?>
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

  <title>Payment confirmation</title>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Payment</h1>
      <p>Demonstration of Mollie Payment</p>
    </div>
  </div>

 <p>Thank you for shopping at Otter ICT. Have a nice day!</p>

 <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">status</th>
        <th scope="col">timestamp</th>
      </tr>
    </thead>
    <tbody>

<?php 

    $query = ("select * from payments");
    $conn = OpenCon();
    $result = $conn->query($query);

    CloseCon($conn);
    if ($result->num_rows > 0) {

        while($row = mysqli_fetch_assoc($result)) {

         ?>
            <tr>
                <td>
                <?php echo $row['id']; ?>
                </td>
                <td>
                <?php echo $row['status']; ?>
                </td>
                <td>
                <?php echo $row['payment_date']; ?>
                </td>
            </tr>
        <?php 
            } 
        }
        ?>

   </tbody>
   </table>

</body>
</html>
