<?php

$servername = "127.0.0.1";
$username = "root";
$userpassword = "root";
$dbname = "produsen_sepeda";
$dbport = 8889;

$mysqli = mysqli_connect($servername, $username, $userpassword, $dbname, $dbport);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
