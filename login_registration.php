<?php
session_start();
require('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['password']) { 
                $_SESSION['user_id'] = $row['id'];
                header('Location: homepage.php');
                exit();
            } else {
                header('Location: errorpage.php');
                exit();
            }
        } else {
            header('Location: errorpage.php');
            exit();
        }
        $stmt->close();
    } elseif (isset($_POST['register'])) {
        $username = $_POST['register-username'];
        $password = $_POST['register-password'];

        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ss", $username, $password);
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
