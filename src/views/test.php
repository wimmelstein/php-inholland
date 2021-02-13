<?php

use app\core\Application;

include_once(Application::$ROOT_DIR . '/components/Button.php');
include_once(Application::$ROOT_DIR . '/components/Form.php');

$button = new Button("submit", 'onclick="myfunction()"', "button btn_primary");
$form = new Form([
    "type" => "text",
    "class" => "form-control",
    "placeholder" => "name",
    "name" => "input"], $button);
$form->render();
