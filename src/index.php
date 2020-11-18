<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-control" content="no-cache"/>

    <script>
        function my_alert() {
        alert('OK Boomer');
        }

        function myConfirm() {
            const reply = confirm('Do you want to quit while you are ahead');
            const quitDiv = document.getElementById('quit');
            quitDiv.innerHTML = "The boolean value of this confirmation dialog is: " + reply;
        }
        function myPrompt() {
            const answer = prompt('What is your favorite food?');
            const foodDiv = document.getElementById('food');
            foodDiv.innerHTML = 'Favorite food: ' + answer;
        }
    </script>
  </head>
  <body>
    <header>
    <h1 class="display4">Javascript events</h1>
     <button type="submit" class="btn btn-primary btn-lg" onClick="my_alert()">Alert</button>
     <button type="submit" class="btn btn-secondary btn-lg" onClick="myConfirm()">Confirm</button>
     <button type="submit" class="btn btn-success btn-lg" onClick="myPrompt()">Prompt</button>
    </header>

    <div id="container">
      <div id="food" class="left">Placeholder text food</div>
      <div id="quit" class="right">Placeholder text quit</div>
    </div>  
  </body>
</html>    