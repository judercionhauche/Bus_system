<?php
require '../../config/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];

    // Check if the user exists and has the role of driver
    $stmt = $connection->prepare("SELECT user_id FROM users WHERE email = ? AND role = 2");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        // Check if the driver already exists
        $checkDriver = $connection->prepare("SELECT * FROM drivers WHERE user_id = ?");
        $checkDriver->bind_param("i", $user_id);
        $checkDriver->execute();
        $checkResult = $checkDriver->get_result();

        if ($checkResult->num_rows == 0) {
            // Prepare the SQL statement to insert into the drivers table
            $driverSql = $connection->prepare("INSERT INTO drivers (user_id, driver_name, email, phone_number) VALUES (?, ?, ?, ?)");
            $driver_name = $first_name . ' ' . $last_name;
            $driverSql->bind_param("isss", $user_id, $driver_name, $email, $phone);

            // Execute the query
            if ($driverSql->execute()) {
                echo "<script>alert('Driver added successfully'); window.location.href='../drivers.php';</script>";
            } else {
                echo "<script>alert('Error adding driver: " . $driverSql->error . "'); window.history.back();</script>";
            }

            $driverSql->close();
        }
        // If the driver already exists, do nothing
        $checkDriver->close();
    } else {
        echo "<script>alert('User not found or is not a driver'); window.history.back();</script>";
    }

    $stmt->close();
}
?>
