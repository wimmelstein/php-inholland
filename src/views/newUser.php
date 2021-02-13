<?php

use app\core\Application;

include_once(Application::$ROOT_DIR . '/components/Jumbotron.php');
echo new Jumbotron("Users", 'Add new User');
?>

<form method="post" action="/users">
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
        <button type="submit" class="btn btn-secondary">Add</button>
    </div>
</form>
