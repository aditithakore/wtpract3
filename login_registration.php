<?php
session_start();
require('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        // Handle login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT id, username, password FROM users WHERE username = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                header('Location: homepage.php');
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    } elseif (isset($_POST['register'])) {
        // Handle registration
        $username = $_POST['register-username'];
        $password = $_POST['register-password'];

        // Hash the password using password_hash before storing it in the database.
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES (?, ?)";

        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ss", $username, $hashedPassword); // Bind the hashed password.
            if ($stmt->execute()) {
                header('Location: index.html');
                exit();
            } else {
                echo "Registration failed. Please try again.";
            }

            $stmt->close();
        } else {
            echo "Query preparation error: " . $conn->error;
        }
    }
}
?>
