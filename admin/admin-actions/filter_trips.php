<?php
require '../../config/connection.php';

header('Content-Type: application/json');

$response = ['success' => false, 'trips' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trip_date = $_POST['trip_date'] ?? '';
    $departure_time = $_POST['departure_time'] ?? '';
    $route = $_POST['route'] ?? '';

    $query = "SELECT 
                t.trip_id, 
                b.bus_name, 
                t.first_name, 
                t.last_name, 
                t.trip_date, 
                t.departure_time, 
                t.route, 
                b.capacity AS available_seats
              FROM 
                trips t
              JOIN 
                buses b ON t.bus_id = b.bus_id
              WHERE 
                1=1";
    
    if (!empty($trip_date)) {
        $query .= " AND t.trip_date = ?";
    }
    if (!empty($departure_time)) {
        $query .= " AND t.departure_time = ?";
    }
    if (!empty($route)) {
        $query .= " AND t.route = ?";
    }

    $stmt = $connection->prepare($query);

    if (!empty($trip_date) && !empty($departure_time) && !empty($route)) {
        $stmt->bind_param("sss", $trip_date, $departure_time, $route);
    } elseif (!empty($trip_date) && !empty($departure_time)) {
        $stmt->bind_param("ss", $trip_date, $departure_time);
    } elseif (!empty($trip_date) && !empty($route)) {
        $stmt->bind_param("ss", $trip_date, $route);
    } elseif (!empty($departure_time) && !empty($route)) {
        $stmt->bind_param("ss", $departure_time, $route);
    } elseif (!empty($trip_date)) {
        $stmt->bind_param("s", $trip_date);
    } elseif (!empty($departure_time)) {
        $stmt->bind_param("s", $departure_time);
    } elseif (!empty($route)) {
        $stmt->bind_param("s", $route);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $response['trips'][] = $row;
    }

    $response['success'] = true;
    $stmt->close();
}

$connection->close();
echo json_encode($response);
?>
