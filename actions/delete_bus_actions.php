<?php
session_start();
error_reporting(E_ALL);
require "../config/connection.php";
require '../Functions/functions.php';
require '../Functions/session.php';

header("Content-Type: application/json");

// Ensure the connection to the database is established
if ($connection->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $connection->connect_error]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_id =  intval($_POST['bus_id']);
    // Use prepared statement to delete bus record
    $stmt = $connection->prepare("DELETE FROM buses WHERE bus_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $bus_id);

        if ($stmt->execute()) {
            // Deletion successful
            $_SESSION['msg'] = "Bus Deleted Successfully!";
            echo json_encode(["success" => true, "message" => "Bus Deleted Successfully!"]);
            exit;
        } else {
            // Display error on the deletion page
            echo json_encode(["success" => false, "message" => "Error executing query"]);
        }

        $stmt->close();
    } else {
        // Display error preparing the statement
        echo json_encode(["success" => false, "message" => "Error Parsing Argumen "]);
        exit;
    }
}
// Close the database connection
$connection->close();
?>
