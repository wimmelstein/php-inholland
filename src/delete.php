<?php

    $basedir = 'workdir/';
    $filename = $_GET['name'];

    unlink($basedir . $filename);

    header('Location: /index.php');

?>