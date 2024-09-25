<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'signin') {
        // Sign In
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
    } elseif (isset($_POST['action']) && $_POST['action'] == 'signup') {
        // Sign Up
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
