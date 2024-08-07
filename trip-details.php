<?php

session_start();
require 'config/connection.php';

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM booking WHERE user_id = ? ORDER BY booking_date DESC LIMIT 1";
	if ($stmt = $connection->prepare($sql)) {
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$booking = $result->fetch_assoc();
		$stmt->close();
	} else {
		echo "Error: " . $connection->error;
	}
} else {
	echo "User is not logged in.";
	exit;
}
$connection->close();

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>ASHESI BUS SYSTEM</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header and Menu-->
		<?php
		include "header.php";
		include "menu.php";
		?>

		<!-- Main -->
		
		<div id="main">
			<div class="inner">
				<h1>Booking Details</h1>
				<div class="container">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="card">
								<div class="card-header">
									Confirmed Trip Details
								</div>
								<div class="card-body">
									<p><strong>Invoice:</strong> <?php echo $booking['invoice_number']; ?></p>
									<p><strong>Date:</strong> <?php echo $booking['booking_date']; ?></p>
									<p><strong>Seats</strong> <?php echo $booking['number_of_seats']; ?></p>
									<button onclick="window.print()">Print Details</button>
									<button onclick="saveBookingDetails()">Save Details</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<?php include 'footer.php' ?>
		</div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/main.js"></script>
</body>


</html>