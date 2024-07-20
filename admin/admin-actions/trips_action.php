<?php
require '../../config/connection.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate required fields
        $required_fields = ['trip_date', 'departure_time', 'route', 'bus', 'first_name', 'last_name'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception(ucfirst($field) . ' is required.');
            }
        }

        // Get and sanitize form data
        $trip_date = date('Y-m-d', strtotime($_POST['trip_date']));
        $departure_time = date('H:i:00', strtotime($_POST['departure_time']));
        $route = htmlspecialchars($_POST['route'], ENT_QUOTES, 'UTF-8');
        $bus_id = htmlspecialchars($_POST['bus'], ENT_QUOTES, 'UTF-8');
        $first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8');
        $last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES, 'UTF-8');

        // Check if the bus ID exists in the buses table
        $bus_check_query = "SELECT COUNT(*) FROM buses WHERE bus_id = ?";
        $stmt = $connection->prepare($bus_check_query);
        $stmt->bind_param("s", $bus_id);
        $stmt->execute();
        $stmt->bind_result($bus_exists);
        $stmt->fetch();
        $stmt->close();

        if (!$bus_exists) {
            throw new Exception('Selected bus does not exist.');
        }

        // Check if the same driver is already assigned to any route at the same date and time
        $driver_conflict_check_query = "
            SELECT COUNT(*) 
            FROM trips 
            WHERE trip_date = ? AND departure_time = ? 
              AND first_name = ? AND last_name = ?";
        $stmt = $connection->prepare($driver_conflict_check_query);
        $stmt->bind_param("ssss", $trip_date, $departure_time, $first_name, $last_name);
        $stmt->execute();
        $stmt->bind_result($driver_conflict_exists);
        $stmt->fetch();
        $stmt->close();

        if ($driver_conflict_exists) {
            throw new Exception('The same driver is already assigned to a route at the same date and time.');
        }

        // Check if another driver is assigned to the same route at the same date and time
        $route_conflict_check_query = "
            SELECT COUNT(*) 
            FROM trips 
            WHERE trip_date = ? AND departure_time = ? AND route = ? 
              AND (first_name != ? OR last_name != ?)";
        $stmt = $connection->prepare($route_conflict_check_query);
        $stmt->bind_param("sssss", $trip_date, $departure_time, $route, $first_name, $last_name);
        $stmt->execute();
        $stmt->bind_result($route_conflict_exists);
        $stmt->fetch();
        $stmt->close();

        if ($route_conflict_exists) {
            throw new Exception('Another driver is already assigned to this route at the same date and time.');
        }

        // Prepare and execute the insert query
        $insert_query = "
            INSERT INTO trips (trip_date, departure_time, route, bus_id, first_name, last_name) 
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insert_query);
        $stmt->bind_param("ssssss", $trip_date, $departure_time, $route, $bus_id, $first_name, $last_name);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Trip added successfully';
        } else {
            if ($connection->errno == 1062) {
                throw new Exception('A trip with the same date, time, route, and driver already exists.');
            } else {
                throw new Exception('Error adding trip: ' . $connection->error);
            }
        }

        $stmt->close();
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }
} else {
    $response['message'] = 'Invalid request method';
}

$connection->close();
echo json_encode($response);
?>
