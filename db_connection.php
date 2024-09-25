<?php
$servername = "localhost"; // Assuming MySQL server is on the same host
$username = "root"; // Default username for XAMPP MySQL
$password = ""; // Blank password for XAMPP MySQL root user
$dbname = "register"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

