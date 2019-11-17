<?php

function OpenCon() {
 $dbhost = "db";
 $dbuser = "root";
 $dbpass = "mysql";
 $db = "inholland";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn) {
 $conn -> close();
 }

?>