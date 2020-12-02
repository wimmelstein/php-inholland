<?php 

$file = fopen("log.txt", "a");
fwrite($file, "Hello world\n");
fclose($file);
?>