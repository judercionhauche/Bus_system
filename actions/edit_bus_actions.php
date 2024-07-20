<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require '../config/connection.php';
require '../Functions/functions.php'; 
require '../Functions/session.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name']; 
    $bus_no = $_POST['bus_no']; 
    $status = $_POST['status']; 
    $capacity = $_POST['capacity']; 

    // Prepare and execute the SQL statement
    $stmt = $connection->prepare("UPDATE `buses` SET bus_number=?, capacity=?, bus_name=?, bus_status=? WHERE bus_id=?");
    $stmt->bind_param("ssssi", $bus_no, $capacity, $bus_name, $status, $bus_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Bus Updated Successfully!";
        header("Location: ../admin/bus.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$connection->close();
?>
