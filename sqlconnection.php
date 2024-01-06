<?php

$dbhost = "";
$dbuser = "";
$dbpassword = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Error - could not connect to MySQL: " . mysqli_connect_error());
}


?>