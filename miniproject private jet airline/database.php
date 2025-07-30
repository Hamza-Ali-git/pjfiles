<?php
$servername = "localhost";
$username = "root";  //database username
$password = "daddycar";      //database password
$dbname = "elite_wings_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
