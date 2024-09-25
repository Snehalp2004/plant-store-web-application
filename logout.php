<?php
include 'db_connection.php';

$token = $_POST['token'];

$sql = "UPDATE users SET token=NULL WHERE token='$token'";

if ($conn->query($sql) === TRUE) {
    echo "Logout successful!";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
