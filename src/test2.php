<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

$result = getAllUsers();
echo json_encode($result);

?>
