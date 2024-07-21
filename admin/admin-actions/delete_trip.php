<?php
require '../../config/connection.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Invalid request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Validate required fields
        if (empty($_POST['trip_id'])) {
            throw new Exception('Trip ID is required.');
        }

        // Get and sanitize form data
        $trip_id = intval($_POST['trip_id']);

        // Delete the trip
        $delete_query = "DELETE FROM trips WHERE trip_id = ?";
        $stmt = $connection->prepare($delete_query);
        $stmt->bind_param("i", $trip_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = 'Trip deleted successfully';
        } else {
            throw new Exception('Error deleting trip: ' . $connection->error);
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
