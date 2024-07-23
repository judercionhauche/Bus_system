<?php
session_start();
require '../config/connection.php';


define("APPURL", "http://localhost/bus_system/");

$errors = []; // Initialize errors array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];

    // Role mapping
    $role_mapping = [
        'staff' => 3,
        'driver' => 2,
        'logistics' => 1
    ];

    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($phone_number) || empty($role)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (is_numeric($email)) {
        $errors[] = "Email cannot be numeric.";
    } elseif (is_numeric($first_name) || is_numeric($last_name)) {
        $errors[] = "Your name should not be numbers only.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@(ashesi\.edu\.gh|gmail\.com)$/", $email)) {
        $errors[] = "Email must end with @ashesi.edu.gh or @gmail.com.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    } elseif (!is_numeric($phone_number)) {
        $errors[] = "Your phone number should contain only numbers.";
    } elseif (!array_key_exists($role, $role_mapping)) {
        $errors[] = "Invalid role selected.";
    }

    if (count($errors) == 0) {
        // No validation errors, proceed with signup process
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role_value = $role_mapping[$role];

        // Use prepared statements to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "This email has already been used to sign up.";
        } else {
            // Insert user into database
            $stmt = $connection->prepare("INSERT INTO users (first_name, last_name, email, password, phone_number, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $first_name, $last_name, $email, $hashed_password, $phone_number, $role_value);

            if ($stmt->execute()) {
                $_SESSION['signup_success'] = true;
                header("Location: ../auth/login.php");
                exit();
            } else {
                $errors[] = "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    // If there are errors, store them in session and redirect
    if (count($errors) > 0) {
        $_SESSION['signup_errors'] = $errors;
        $_SESSION['signup_data'] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'role' => $role
        ];
        header("Location: ../auth/login.php");
        exit();
    }
}

$connection->close();
?>
