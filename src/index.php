<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="js/script.js"></script>

  <title>File Manager</title>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">File manager</h1>
      <p>PHP File manager</p>
    </div>
  </div>

  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">name</th>
        <th scope="col">type</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $dir = 'workdir';
      $files1 = scandir($dir);
      $files2 = scandir($dir, 1); // sorted descending

      foreach ($files1 as $filename) {
      ?>
        <tr>
          <td><?php
              echo $filename
              ?>
          </td>
          <td><?php
              echo is_dir($filename)
                ? 'directory</td><td></td>'
                : 'regular file</td><td><button class="btn btn-link" onclick="deleteFile(this.id)" id="'
                . $filename
                . '">delete</button></td>';
              ?>
        </tr>

      <?php
      }
      ?>
    </tbody>
  </table>

  <form name="upload" method="post" action="upload.php" enctype="multipart/form-data">
    <div class="form-row">
      <div class="col">
        <input type="file" class="form-control-file" name="fileToUpload"  id="fileToUpload">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Upload</button>
      </div>
  </form>


    <?php

    // Print error messages to the screen
    $params = array();
    parse_str($_SERVER['QUERY_STRING'], $params);
    if (count($params) > 0) {
      ?> 
      <div class="messages-error">
      <?php echo join("", $params); ?>
      </div>
      <?php
    } else {
      echo "";
    }
    
    ?>
  </div>


</body>

</html>