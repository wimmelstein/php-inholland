<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Cache-control" content="no-cache" />

  <script src="js/script.js"></script>
</head>

<body>
  <header>
    <h1 class="display4">Javascript events</h1>
    <button type="submit" class="btn btn-primary btn-lg" onClick="my_alert('boomer')">Alert</button>
    <button type="submit" class="btn btn-secondary btn-lg" onClick="myConfirm()">Confirm</button>
    <button type="submit" class="btn btn-success btn-lg" onClick="myPrompt()">Prompt</button>
    <button type="submit" class="btn btn-secondary btn-lg" onclick="displayGuitars()">Display them</button>
  </header>

  <div id="container">
    <div id="food" class="left">Placeholder text food</div>
    <div id="quit" class="right">Placeholder text quit</div>
  </div>

  <div id="guitars" class="left"></div>
</body>


</html>