<?php
require '../../config/connection.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate required fields
        $required_fields = ['trip_id', 'trip_date', 'departure_time', 'route', 'bus', 'first_name', 'last_name'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                throw new Exception(ucfirst($field) . ' is required.');
            }
        }

        // Get and sanitize form data
        $trip_id = intval($_POST['trip_id']);
        $trip_date = date('Y-m-d', strtotime($_POST['trip_date']));
        $departure_time = date('H:i:00', strtotime($_POST['departure_time']));
        $route = htmlspecialchars($_POST['route'], ENT_QUOTES, 'UTF-8');
        $bus_id = htmlspecialchars($_POST['bus'], ENT_QUOTES, 'UTF-8');
        $first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES, 'UTF-8');
        $last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES, 'UTF-8');

        // Update the trip
        $update_query = "
            UPDATE trips
            SET trip_date = ?, departure_time = ?, route = ?, bus_id = ?, first_name = ?, last_name = ?
            WHERE trip_id = ?";
        $stmt = $connection->prepare($update_query);
        $stmt->bind_param("ssssssi", $trip_date, $departure_time, $route, $bus_id, $first_name, $last_name, $trip_id);

        if ($stmt->execute()) {
            // Fetch the updated trip details
            $trip_query = "
                SELECT 
                    t.trip_id, 
                    t.trip_date, 
                    t.departure_time, 
                    t.route, 
                    t.bus_id, 
                    t.first_name, 
                    t.last_name,
                    b.bus_name, 
                    b.capacity AS available_seats
                FROM 
                    trips t
                JOIN 
                    buses b ON t.bus_id = b.bus_id
                WHERE 
                    t.trip_id = ?";
            $stmt = $connection->prepare($trip_query);
            $stmt->bind_param("i", $trip_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $response['success'] = true;
                $response['message'] = 'Trip updated successfully';
                $response['trip'] = $row;
            }
            $stmt->close();
        } else {
            throw new Exception('Error updating trip: ' . $connection->error);
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }
} else {
    $response['message'] = 'Invalid request method';
}

$connection->close();
echo json_encode($response);
?>
