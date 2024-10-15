<?php
$host = "localhost";
$orders = "root";
$pass = "";
$db = "rescue_bites";

// Create connection
$conn = new mysqli($host, $orders, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
