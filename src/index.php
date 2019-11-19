<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Canvas</title>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    </head>
    <body>
    <header>
    <div class="jumbotron  jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Signature</h1>
        <p>Signature Pad by <a href="https://github.com/szimek/signature_pad">szimek</a></p>
      </div>
    </div>

    </header>
    <section id="body">
        <canvas id="canvas"></canvas>
        <script src="js/canvas.js"></script>
        <div id="buttons">
            <button type="submit" class="btn btn-primary" onClick="saveImage()">Save</button>
            <button type="submit" class="btn btn-secondary" onClick="reset()">Reset</button>

    </section>    
    </body>
</html>