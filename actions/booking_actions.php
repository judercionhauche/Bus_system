<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../settings/connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting and sanitizing input data
    $title = $conn->real_escape_string($_POST['title']);
    $fname = $conn->real_escape_string($_POST['fname']);
    $lname = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $_POST['phone'];
    $departure_time = $conn->real_escape_string($_POST['departure-time']);
    $pickup= $conn->real_escape_string($_POST['pickup_location']);
    $dropoff = $conn->real_escape_string($_POST['dropoff_location']);

    $client_id = $_SESSION['client_id'];

//     // Assuming all variables are sanitized and safe to use in the query
    $myquery = "INSERT INTO booking (project_type, project_scope, budget, timeline, consultation_date, consultation_time, existing_furniture, specific_requests, client_id, filepaths) VALUES ('$projectType', '$projectScope', $budget, '$timeline', '$consultationDate', '$consultationTime', '$existingFurniture', '$specificRequests','$client_id','$filePaths')";
    if ($conn->query($myquery) === TRUE) {
            
        //Booking successful
        $sql = "SELECT * FROM booking ORDER BY booking_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
       $bookingId = mysqli_fetch_assoc($result)['booking_id'];
        header("Location: ../view/confirmationpage.php?bookingid=$bookingId");
        exit();
           
    } else {
        // Booking failed
        header("Location: ../view/booking/booking.php?error=Booking failed");
        exit();
    }
}
 else {
    // Redirect back to booking form if not a POST request
    header("Location: ../view/booking/booking.php");
    exit();
}

// // Close the database connection
// $conn->close();
?>
