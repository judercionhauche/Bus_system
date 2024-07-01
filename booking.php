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
	<body class="is-preload" >
		<!-- Wrapper -->
		<div id="wrapper" style="padding:1%">

			<!-- Header and Menu-->
			<?php 
				include "header.html";
				include "menu.html";
			?>
			

			<!-- Main -->
			<div id="main" style="padding-bottom: 0px;">
				<div class="inner">
					<h1 style="text-align: center; font-size: 30px;">Book Your Seat</h1>
				</div>
			</div>

			<div class="inner" style="
								background-color: #f9f9f9;border-color: #ccc;
								max-width: 100%;
								box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); 
								border-radius: 12px;
								margin:10%;
								margin-top:0px">
															
				<form method="post" action="#">
					<div class="fields">
						<div class="field half">
							<select>
								<option value="">-- Choose Title--</option>
								<option value="dr">Dr.</option>
								<option value="miss">Miss</option>
								<option value="mr">Mr.</option>
								<option value="mrs">Mrs.</option>
								<option value="ms">Ms.</option>
								<option value="other">Other</option>
								<option value="prof">Prof.</option>
								<option value="rev">Rev.</option>
							</select>
						</div>

						<div class="field half">
							<input type="text" name="field-2" id="field-2" placeholder="Name">
						</div>

						<div class="field full">
							<input type="text" name="field-2" id="field-2" placeholder="Staff ID">
						</div>

						<div class="field half">
							<input type="text" name="field-3" id="field-3" placeholder="Email">
						</div>

						<div class="field half">
							<input type="text" name="field-4" id="field-4" placeholder="Phone">
						</div>

						<div class="field full">
							<input type="text" name="field-2" id="field-2" placeholder="Departure Time">
						</div>

						<div class="field half">
							<select>
								<option value="">-- Choose Pickup Location--</option>
								<option value="dr"> Town 1</option>
								<option value="miss"> Town 2</option>
								<option value="mr"> Town 3</option>
								<option value="mrs"> Town 4</option>
								<option value="ms"> Town 5</option>
								<option value="other">Town 6</option>
								<option value="prof">Town 7</option>
								<option value="rev">Town 8</option>
							</select>
						</div>

						<div class="field half">
						<select>
								<option value="">-- Choose Dropoff Location--</option>
								<option value="dr"> Town 1</option>
								<option value="miss"> Town 2</option>
								<option value="mr"> Town 3</option>
								<option value="mrs"> Town 4</option>
								<option value="ms"> Town 5</option>
								<option value="other">Town 6</option>
								<option value="prof">Town 7</option>
								<option value="rev">Town 8</option>
							</select>
						</div>

						<div class="field full">
							<input type="text" name="field-2" id="field-2" placeholder="Number of Seats">
						</div>

						<div class="field full">
							<select>
								<option value="">-- Choose Payment Method--</option>
								<option value="">-- Choose Payment Method--</option>
								<option value="">-- Choose Payment Method--</option>
								<option value="">-- Choose Payment Method--</option>
							</select>
						</div>

						<div class="field" style="padding-left: 35%">
							<div>
								<input type="checkbox" id="checkbox-4"> 
								
								<label for="checkbox-4">
									I agree with the <a href="terms.html" target="_blank">Terms &amp; Conditions</a>
								</label>
							</div>
						</div>


						<div class="field half text-right" 		style="padding-left: 45%;">
							<ul class="actions">
								<li><a href="payment.php">
									<input type="submit" value="Proceed to Payment"  class="primary" style="background-color: #9E4244;"/></a>
								</li>
							</ul>
						</div>
					</div>
				</form>		
			</div>

			<footer>
				<?php include "footer.html"?>
			</footer>
		</div>	

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
	
</html>							

