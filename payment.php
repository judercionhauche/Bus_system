<?php
session_start();

// Debugging: Check all session variables
echo '<pre>' . print_r($_SESSION, true) . '</pre>';

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
    $userId = $_SESSION['user_id'];
    $firstName = $_SESSION['first_name'];
    $lastName = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $tripId = $_SESSION['trip_id'];
    $tripDate = $_SESSION['trip_date'];
    $departureTime = $_SESSION['departure_time'];
    $route = $_SESSION['route'];
    $busName = $_SESSION['bus_name'];
    $driver = $_SESSION['driver'];
    $bookingId = $_SESSION['booking_id'];
} else {
    // Handle invalid request
    header('Location: error_page.php'); // Redirect to an error page or handle appropriately
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <h1>Processing Payment</h1>
    <p>User ID: <?= htmlspecialchars($userId, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Name: <?= htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Trip ID: <?= htmlspecialchars($tripId, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Trip Date: <?= htmlspecialchars($tripDate, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Departure Time: <?= htmlspecialchars($departureTime, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Route: <?= htmlspecialchars($route, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Bus Name: <?= htmlspecialchars($busName, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Driver: <?= htmlspecialchars($driver, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Booking ID: <?= htmlspecialchars($bookingId, ENT_QUOTES, 'UTF-8') ?></p>

    <!-- Include payment form or payment processing logic here -->
</body>
</html>
