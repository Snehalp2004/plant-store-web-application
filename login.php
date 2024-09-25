<?php
include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT id, password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $token = bin2hex(random_bytes(16));
        $user_id = $row['id'];
        $update_token_sql = "UPDATE users SET token='$token' WHERE id='$user_id'";
        if ($conn->query($update_token_sql) === TRUE) {
            echo json_encode(array("token" => $token));
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
