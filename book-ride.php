<?php
session_start();
require './config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tripId = $_POST['trip_id'];

    // Assuming user details are stored in session during login
    $userId = $_SESSION['user_id'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $email = $_SESSION['email'];

    // Fetch trip details
    $stmt = $connection->prepare("SELECT t.trip_date, t.departure_time, t.route, b.bus_name, CONCAT(t.first_name, ' ', t.last_name) as driver 
                                  FROM trips t 
                                  JOIN buses b ON t.bus_id = b.bus_id 
                                  WHERE t.trip_id = ?");
    $stmt->bind_param('i', $tripId);
    $stmt->execute();
    $result = $stmt->get_result();
    $tripDetails = $result->fetch_assoc();

    // Check if the bus has available seats
    $stmt = $connection->prepare("SELECT b.capacity - IFNULL((SELECT COUNT(*) FROM bookings bk WHERE bk.trip_id = t.trip_id), 0) AS available_seats 
                                  FROM trips t 
                                  JOIN buses b ON t.bus_id = b.bus_id 
                                  WHERE t.trip_id = ?");
    $stmt->bind_param('i', $tripId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['available_seats'] > 0) {
        // Decrease bus capacity by making a booking
        $bookingDate = date('Y-m-d H:i:s');
        $insertStmt = $connection->prepare("INSERT INTO bookings (trip_id, user_id, booking_date) VALUES (?, ?, ?)");
        $insertStmt->bind_param('iis', $tripId, $userId, $bookingDate);
        $insertStmt->execute();

        // Get the last inserted booking_id
        $bookingId = $insertStmt->insert_id;

        // Store trip details in session
        $_SESSION['trip_id'] = $tripId;
        $_SESSION['trip_date'] = $tripDetails['trip_date'];
        $_SESSION['departure_time'] = $tripDetails['departure_time'];
        $_SESSION['route'] = $tripDetails['route'];
        $_SESSION['bus_name'] = $tripDetails['bus_name'];
        $_SESSION['driver'] = $tripDetails['driver'];
        $_SESSION['booking_id'] = $bookingId;

        // Redirect to payment page
        header("Location: payment.php");
        exit();
    } else {
        // Redirect back with an error message
        $_SESSION['error_message'] = "The bus is filled.";
        header("Location: bus-schedule.php");
        exit();
    }
}

$connection->close();
?>
