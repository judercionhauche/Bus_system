<?php
include 'config/connection.php';

/**
 * Process the booking form data and insert it into the database.
 */
 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $name = $_POST['name'];
    $staff_id = $_POST['staff_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $departure_time = $_POST['departure_time'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $number_of_seats = $_POST['number_of_seats'];
    $payment_method = $_POST['payment_method'];

    // Insert data into the database
    $sql = "INSERT INTO bookings (title, name, staff_id, email, phone, departure_time, pickup_location, dropoff_location, number_of_seats, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $connection->prepare($sql)) {
        $stmt->bind_param("sssssssssis", $title, $name, $staff_id, $email, $phone, $departure_time, $pickup_location, $dropoff_location, $number_of_seats, $payment_method, $terms);
        
        if ($stmt->execute()) {
            echo "Booking successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $connection->error;
    }

    $connection->close();
} else {
    echo "Invalid request.";
}
?>
