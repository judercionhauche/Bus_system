<?php

require '../../config/connection.php';  

if(isset($_POST['submit'])) {
    // Get the date and time from the form
    $input_date = $_POST['trip_date'];
    $input_time = $_POST['departure_time'];
    
    // Format the date for MySQL (YYYY-MM-DD)
    $trip_date = date('Y-m-d', strtotime($input_date));
    
    // Format the time for MySQL (HH:MM:OO)
    $departure_time = date('H:i:00', strtotime($input_time));
    
    
    // Get other form data
    $route = $_POST['route'];
    $bus = $_POST['bus'];
    $driver = $_POST['driver'];


    $stmt = $connection->prepare("INSERT INTO trips (trip_date, departure_time, route, bus_id, driver_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $trip_date, $departure_time, $route, $bus, $driver);
    
    if($stmt->execute()) {
        echo "<script>alert('Trip added successfully'); window.location.href='../bus_schedule.php';</script>";
    } else {
        echo "<script>alert('Error adding trip'); window.location.href='../bus_schedule.php';</script>";
    }
    
    $stmt->close();
}
?>