<?php

// require '../config/connection.php';  

if(isset($_POST['submit'])) {
    // Get the data from the driver form
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    
    $stmt = $connection->prepare("INSERT INTO drivers (user_id, driver_name, email) SELECT user_id, CONCAT($first_name, ' ', $last_name) AS driver_name, email 
    FROM users WHERE role = 2 VALUES (?, ?, ?)");
    $stmt->bind_param("sssss", $user_id, $driver_name, $email);
    
    if($stmt->execute()) {
        echo "<script>alert('Added successfully'); window.location.href='../bus_schedule.php';</script>";
    } else {
        echo "<script>alert('Error adding driver'); window.location.href='../bus_schedule.php';</script>";
    }
    
    $stmt->close();
}


?>