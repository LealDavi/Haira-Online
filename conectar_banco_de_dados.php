<?php

$servername  = 'localhost';
$dbname  = 'mydb';
$username  = 'student';
$password  = 'student';


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>