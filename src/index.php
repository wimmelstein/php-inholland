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

  <title>Users REST API</title>
</head>

<body>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Payment</h1>
      <p>Demonstration of Mollie Payment</p>
    </div>
  </div>
  <!-- 
  <form>
    <div class="form-check mb-2 mr-sm-2">
      <input type="text" name="amount" id="am ount" placeholder="amount">
      <input type="text" name="description" id="desciption" placeholder="description">
    </div>
    <button type="button" class="btn btn-secondary">Make payment</button>
  </form> -->

  <form class="form-inline" method="post" action="pay.php">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Description" id="description" name="description">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-secondary">Make payment</button>
      </div>


    </div>
  </form>
</body>

</html>