<?php
require '../config/connection.php';

// Define APPURL
define("APPURL", "http://localhost/bus_system/");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];

    // Validate and process the data as needed
    if ($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Check if email already exists
        $email_exists = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($email_exists);

        if ($result->num_rows > 0) {
            echo "User already exists";
            exit();
        }

        // SQL to insert the new user into the database
        $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number, role)
                VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$phone_number', '$role')";

        // Execute the insertion query
        if ($connection->query($sql) === TRUE) {
            header("Location: ../auth/login.php?signup=success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        // Close the connection
        $connection->close();
    } else {
        echo "Passwords do not match.";
    }
}
?>
