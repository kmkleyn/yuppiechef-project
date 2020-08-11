<!-- This file creates the connection with the Yuppiechef Database. -->

<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "yuppiechef";

// Create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

?>
 