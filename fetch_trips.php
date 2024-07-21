<?php
require '../config/connection.php';

header('Content-Type: application/json');

// Fetch all trips
$query = "
    SELECT 
        t.trip_id, 
        t.trip_date, 
        t.departure_time, 
        b.bus_name, 
        t.route, 
        b.capacity AS available_seats, 
        CONCAT(t.first_name, ' ', t.last_name) AS driver
    FROM 
        trips t
    JOIN 
        buses b ON t.bus_id = b.bus_id
";

$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$trips = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();

// Fetch unique dates
$queryDates = "SELECT DISTINCT trip_date FROM trips";
$stmtDates = $connection->prepare($queryDates);
$stmtDates->execute();
$resultDates = $stmtDates->get_result();
$dates = $resultDates->fetch_all(MYSQLI_ASSOC);
$stmtDates->close();

// Fetch unique times
$queryTimes = "SELECT DISTINCT departure_time FROM trips";
$stmtTimes = $connection->prepare($queryTimes);
$stmtTimes->execute();
$resultTimes = $stmtTimes->get_result();
$times = $resultTimes->fetch_all(MYSQLI_ASSOC);
$stmtTimes->close();

// Fetch unique routes
$queryRoutes = "SELECT DISTINCT route FROM trips";
$stmtRoutes = $connection->prepare($queryRoutes);
$stmtRoutes->execute();
$resultRoutes = $stmtRoutes->get_result();
$routes = $resultRoutes->fetch_all(MYSQLI_ASSOC);
$stmtRoutes->close();

$connection->close();

echo json_encode([
    'trips' => $trips,
    'dates' => $dates,
    'times' => $times,
    'routes' => $routes
]);
?>
