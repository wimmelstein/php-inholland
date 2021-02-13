<?php

use app\core\Application;

include_once(Application::$ROOT_DIR . '/components/Jumbotron.php');
echo new Jumbotron("Home", "Inholland PHP2 Example API");

?>