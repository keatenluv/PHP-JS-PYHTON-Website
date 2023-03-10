<?php

$servername = "localhost:3300";
$usernamedb = "root";
$password = "Kjll1800^";
$dbname = "phpTest";

// Create connection
$conn = new mysqli($servername, $usernamedb, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>