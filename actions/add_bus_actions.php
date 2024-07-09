
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "../config/connection.php";
require '../Functions/functions.php'; 
require '../Functions/session.php'; 

// include 'connection.php'; // Include the file with your database connection details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_name = $_POST['bus_name']; 
    $bus_no = $_POST['bus_no']; 
    $status = $_POST['status']; 
    $capacity = $_POST['capacity']; 

    // Prepared statement to insert data
    $my_query = "INSERT INTO `buses` (bus_number,capacity,bus_name,bus_status) VALUES ('$bus_no','$capacity','$bus_name','$status')";
    $result = $connection->query($my_query);
    if ($result) {
        // Registration successful, redirect to login page
        $session->msg("s", "Bus Added Successfully!");
        header("Location: ../admin/bus.php");
        exit;
    } else {
        // Display error on the register page
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


// Close the database connection
$connection->close();

?> 