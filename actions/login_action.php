<?php
session_start();
require '../config/connection.php';

define("APPURL", "http://localhost/bus_system/");

$errors = [];

// Check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Validate input
    if (empty($email) || empty($password)) {
        $errors[] = "Email and password are required.";
    }

    if (count($errors) == 0) {
        // Query to select user based on email
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify password
            if (password_verify($password, $row['password'])) {
                // Set session variables
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                
                // Redirect on successful login
                header("Location: ../index.php");
                exit();
            } else {
                $errors[] = "Incorrect password.";
            }
        } else {
            $errors[] = "User not does not exist.";
        }
    }

    // Store errors in session
    $_SESSION['login_errors'] = $errors;
    header("Location: ../auth/login.php");
    exit();
}

$connection->close();
?>
