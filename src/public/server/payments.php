<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache"/>

    <title>Payment history</title>
</head>

<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Payment</h1>
      <p>Payment history</p>
    </div>
  </div>

 <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
          <th scope="col">id</th>
          <th scope="col">status</th>
          <th scope="col">description</th>
          <th scope="col">timestamp</th>
      </tr>
    </thead>
     <tbody>

     <?php

     $pdo = bootstrap::getPDO();
     $stmt = $pdo->query("select * from payment");
     $result = $stmt->fetchAll();

     if ($result->rowCount == 0) {

         foreach ($result as $payment) {

             ?>
             <tr>
                 <td>
                     <?php echo $payment['id']; ?>
                 </td>
                 <td>
                     <?php echo $payment['status']; ?>
                 </td>
                 <td>
                     <?php echo $payment['description']; ?>
                 </td>
                 <td>
                     <?php echo $payment['timestamp']; ?>
                 </td>
             </tr>
             <?php
         }
        }
        ?>

   </tbody>
   </table>

   <a href="http://jacksguitarshop.com">Go back to shop</a>

</body>
</html>
