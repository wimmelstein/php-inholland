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
  <meta http-equiv="Cache-control" content="no-cache"/>

  <title>Document</title>
</head>
<body>
  <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">.htaccess</h1>
        <p>Demonstration of rewriting url path</p>
      </div>
    </div>
<table class="table table-hover">
  <thead>
    <tr>
      <td>Parameter</td>
    </tr>
</thead>  
<tbody>
<?php
  #remove the directory path we don't want
  $request  = $_SERVER['REQUEST_URI'];
   #split the path by '/'
  $params     = explode('/', $request);
  foreach ($params as $p) {
    echo "<tr><td>". $p . "</td></tr>";
  }
?>
</tbody>
</table>

  
</body>
</html>
