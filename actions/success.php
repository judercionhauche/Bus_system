<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../config/connection.php'; 

if (isset($_GET['ref'])) {
    $reference = $_GET['ref'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_06b949231274ff999daf09f43ce5df0d65c96dcf", // Use your secret key here
            "Cache-Control: no-cache",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        // Handle cURL error
        echo "cURL Error #: " . $err;
        exit;
    } else {
        // Verify transaction status
        $response_data = json_decode($response, true);
        if ($response_data['status'] && $response_data['data']['status'] == 'success') {
            session_start();
            // Process form data from the URL
            if (isset($_SESSION['user_id']) && isset($_GET['trip_id']) && isset($_GET['number_of_seats'])) {
                $user_id = $_SESSION['user_id'];
                $trip_id = $_GET['trip_id'];
                $number_of_seats = $_GET['number_of_seats'];
                $booking_date = date("Y-m-d H:i:s"); 
                $invoice = mt_rand();

                // Insert booking
                $sql = "INSERT INTO booking (trip_id, user_id, booking_date, invoice_number, number_of_seats) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $connection->prepare($sql)) {
                    $stmt->bind_param("iissi", $trip_id, $user_id, $booking_date, $invoice, $number_of_seats);
                    if ($stmt->execute()) {
                        $booking_id = $stmt->insert_id; 

                        // Insert payment details only if booking is successfully inserted
                        $payment_amount = $number_of_seats * 35; // Assuming price per seat is 35 GHS
                        $payment_date = date("Y-m-d H:i:s");

                        $payment_sql = "INSERT INTO payment (booking_id, user_id, payment_date, amount) VALUES (?, ?, ?, ?)";
                        if ($payment_stmt = $connection->prepare($payment_sql)) {
                            $payment = $response_data['data']['amount'] / 100; // Convert back to currency unit
                            $payment_stmt->bind_param("iisd", $booking_id, $user_id, $payment_date, $payment_amount);
                            if ($payment_stmt->execute()) {

                                // Get the bus_id from the trips table
                                $bus_id_sql = "SELECT bus_id FROM trips WHERE trip_id = ?";
                                if ($bus_id_stmt = $connection->prepare($bus_id_sql)) {
                                    $bus_id_stmt->bind_param("i", $trip_id);
                                    $bus_id_stmt->execute();
                                    $bus_id_stmt->bind_result($bus_id);
                                    $bus_id_stmt->fetch();
                                    $bus_id_stmt->close();

                                    // Update the number of available seats in the buses table
                                    $update_seats_sql = "UPDATE buses SET capacity = capacity - ? WHERE bus_id = ?";
                                    if ($update_seats_stmt = $connection->prepare($update_seats_sql)) {
                                        $update_seats_stmt->bind_param("ii", $number_of_seats, $bus_id);
                                        if ($update_seats_stmt->execute()) {
                                            // Redirect to trip-details.php after successful booking and payment
                                            header("Location: ../trip-details.php");
                                            exit();
                                        } else {
                                            echo "Error updating bus capacity: " . $connection->error;
                                        }
                                    }
                                } else {
                                    echo "Error fetching bus ID: " . $connection->error;
                                }
                            } else {
                                echo "Error inserting payment details: " . $connection->error;
                            }
                        }
                    } else {
                        echo "Error inserting booking: " . $connection->error;
                    }
                }
            } else {
                echo "<script>
                        alert('Required session data is not available.');
                        window.location.href = '../index.php'; // Redirect to home or other relevant page
                      </script>";
            }
        } else {
            echo "<script>
                    alert('The payment could not be verified. Please try again.');
                    window.location.href = '../index.php'; // Redirect to home or other relevant page
                  </script>";
        }
    }
} else {
    echo "<script>
            alert('No payment reference provided.');
            window.location.href = '../index.php'; // Redirect to home or other relevant page
          </script>";
}
?>
