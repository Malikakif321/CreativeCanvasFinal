<?php
$host = "localhost"; // Change if using a remote database
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "creative_canvas"; // Your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Do NOT close connection here! Let other scripts use it.
?>
