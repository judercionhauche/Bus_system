<?php
require './config/connection.php';

header('Content-Type: application/json');

$response = ['success' => false, 'trips' => [], 'trip' => null];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['trip_id'])) {
        $trip_id = intval($_POST['trip_id']);
        $query = "SELECT 
                    t.trip_id, 
                    b.bus_name, 
                    t.first_name, 
                    t.last_name, 
                    t.trip_date, 
                    t.departure_time, 
                    t.route, 
                    t.bus_id,
                    b.capacity AS available_seats
                  FROM 
                    trips t
                  JOIN 
                    buses b ON t.bus_id = b.bus_id
                  WHERE 
                    t.trip_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i", $trip_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $response['success'] = true;
            $response['trip'] = $row;
        }

        $stmt->close();
    } else {
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
        
        $params = [];
        $types = '';

        if (!empty($trip_date)) {
            $query .= " AND t.trip_date = ?";
            $params[] = $trip_date;
            $types .= 's';
        }
        if (!empty($departure_time)) {
            $query .= " AND t.departure_time = ?";
            $params[] = $departure_time;
            $types .= 's';
        }
        if (!empty($route)) {
            $query .= " AND t.route = ?";
            $params[] = $route;
            $types .= 's';
        }

        $stmt = $connection->prepare($query);

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $response['trips'][] = $row;
        }

        $response['success'] = true;
        $stmt->close();
    }
}

$connection->close();
echo json_encode($response);
?>
