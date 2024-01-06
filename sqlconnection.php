<?php

$dbhost = "studentdb-maria.gl.umbc.edu";
$dbuser = "nsubba1";
$dbpassword = "nsubba1";
$dbname = "nsubba1";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Error - could not connect to MySQL: " . mysqli_connect_error());
}


?>