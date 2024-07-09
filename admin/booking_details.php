<?php
include '../config/connection.php'; 

// Fetch booking details with payment status completed
$sql = "SELECT 
            b.booking_id, 
            b.booking_date,
            b.status AS booking_status,
            t.route, 
            t.departure_time, 
            t.arrival_time, 
            u.first_name, 
            u.last_name, 
            u.email, 
            u.phone_number,
            p.amount, 
            p.payment_date, 
            p.payment_method, 
            p.status AS payment_status
        FROM 
            bookings b
        JOIN 
            trips t ON b.trip_id = t.trip_id
        JOIN 
            users u ON b.user_id = u.user_id
        JOIN 
            payments p ON b.booking_id = p.booking_id
        WHERE 
            p.status = 'completed'";

$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Details</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header and Menu-->
        <?php 
            include "header.html";
            include "menu.html";
        ?>
        
        <!-- Main Content -->
        <div id="main">
            <div class="inner">
                <h1>Booking Details</h1>
                <?php if ($result->num_rows > 0): ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Booking Date</th>
                                <th>Booking Status</th>
                                <th>Route</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Amount (GHS)</th>
                                <th>Payment Date</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['booking_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['booking_date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['booking_status']); ?></td>
                                    <td><?php echo htmlspecialchars($row['route']); ?></td>
                                    <td><?php echo htmlspecialchars($row['departure_time']); ?></td>
                                    <td><?php echo htmlspecialchars($row['arrival_time']); ?></td>
                                    <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                    <td><?php echo htmlspecialchars($row['amount']); ?></td>
                                    <td><?php echo htmlspecialchars($row['payment_date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                                    <td><?php echo htmlspecialchars($row['payment_status']); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No bookings found.</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Footer -->
        <?php include 'footer.html'?>
    </div>    

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>

<?php
$connection->close();
?>
