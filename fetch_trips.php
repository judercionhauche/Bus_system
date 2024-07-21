<?php
require './config/connection.php';

// Fetch all trips
$getTrips = $connection->prepare("SELECT 
        t.trip_id, 
        b.bus_name, 
        t.first_name, 
        t.last_name, 
        t.trip_date, 
        t.departure_time, 
        t.route, 
        b.capacity - IFNULL((SELECT COUNT(*) FROM bookings bk WHERE bk.trip_id = t.trip_id), 0) AS available_seats
    FROM 
        trips t
    JOIN 
        buses b ON t.bus_id = b.bus_id
");
$getTrips->execute();
$busTrips = $getTrips->get_result();
$allTrips = $busTrips->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($allTrips);

$connection->close();
?>
