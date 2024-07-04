<!DOCTYPE HTML>
<html>
	<head>
		<title>ASHESI BUS SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
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
						<h1> Booking Details</h1>


						<div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    Confirmed Trip Details
                                </div>
                                <div class="card-body">
                                    <p><strong>Date:</strong> </p>
                                    <p><strong>Time:</strong>  </p>
                                    <p><strong>Route:</strong> </p>
                                    <p><strong>Bus Number:</strong> </p>
                                    <p><strong>Driver:</strong> </p>
                                    
                                    <button onclick="window.print()">Print Details</button>
                                    <button onclick="saveBookingDetails()">Save Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- Footer -->
				<?php include 'footer.php'?>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
            </script>

	</body>
</html>