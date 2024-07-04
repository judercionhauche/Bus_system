<!DOCTYPE HTML>
<html>
	<head>
		<title>ASHESI BUS SYSTEM</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper" >
		<?php 
		include "header.php";
		include "menu.php";
		?>

			<!-- Main -->
			<div id="main">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/ashesi-admin.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/ashesi-admin-2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/ashesi-admin-3.jpg" alt="Third slide">
					</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
					</a>
				</div>

				<br>
				<br>

				<div class="inner">
					<!-- About Us -->
					<header id="inner">
						<h1> The Ashesi Busing System</h1>
						<p>
							The Ashesi Busing System is always there for you. No need to wonder how to get to campus safely and comfortably. The Ashesi Busing System is here to serve you and reduce difficulties in getting a ride
						</p>
					</header>

					<br>

					<h2 class="h2">BUSES</h2>

					<!-- Buses -->
					<section class="tiles">
						<article class="style1">
							<span class="image">
								<img src="images/product-1-720x480.jpg" alt="" />
							</span>
							<a href="bus-details.html">
								<h2>Lorem ipsum dolor sit amet, consectetur</h2>
							</a>
						</article>

						<article class="style2">
							<span class="image">
								<img src="images/product-2-720x480.jpg" alt="" />
							</span>
							<a href="bus-details.html">
								<h2>Lorem ipsum dolor sit amet, consectetur</h2>
							</a>
						</article>

						<article class="style3">
							<span class="image">
								<img src="images/product-2-720x480.jpg" alt="" />
							</span>
							<a href="bus-details.html">
								<h2>Lorem ipsum dolor sit amet, consectetur</h2>
							</a>
						</article>
					</section>

					<br>
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

	</body>
</html>