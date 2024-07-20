<?php
require '../../config/connection.php';

header('Content-Type: application/json');
//./admin/admin-actions/driver_action.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Prepare the SQL statement to fetch user info
    $emailSql = $connection->prepare("SELECT first_name, last_name, phone_number FROM users WHERE email = ? AND role = 2");
    $emailSql->bind_param("s", $email);
    $emailSql->execute();
    $emailSql->store_result();
    $emailSql->bind_result($first_name, $last_name, $phone_number);
    $emailSql->fetch();

    if ($emailSql->num_rows > 0) {
        echo json_encode(['success' => true, 'first_name' => $first_name, 'last_name' => $last_name, 'phone_number' => $phone_number]);
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found or is not a driver.']);
    }

    $emailSql->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
